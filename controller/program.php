<?php
session_start();
$db_log = parse_ini_file("../config.ini");
$db_log = (object)$db_log;

require 'database.php';

$check = $pdo->prepare('SELECT * FROM user_program WHERE hash_user= :hash');
$check->bindValue('hash', $_SESSION['user']);
$final_check = $check->execute();
var_dump($final_check);
if($final_check != false){

    $del = $pdo->prepare('DELETE FROM user_program WHERE hash_user= :hash');
    $del->bindValue('hash',$_SESSION['user'] );
    $del->execute();
    echo 'deleted';
}


function to_pg_array($set) {
    settype($set, 'array'); // can be called with a scalar or array
    $result = array();
    foreach ($set as $t) {
        if (is_array($t)) {
            $result[] = to_pg_array($t);
        } else {
            $t = str_replace('"', '\\"', $t); // escape double quote
            if (! is_numeric($t)) // quote only non-numeric values
                $t = '"' . $t . '"';
            $result[] = $t;
        }
    }
    return '{' . implode(",", $result) . '}'; // format
}


function calcul_age($date){
    $date = strtotime($date);
    $year = intval(date('Y', $date));
    $current_year = intval(date('Y', time()));
    $date = $current_year-$year;

    return $date;
}


$program= [
    "sexe"=> $_POST['sexe'],
    "bearth_date"=> calcul_age($_POST['age']),
    "weight"=> $_POST['poids'],
    "height"=> $_POST['taille'],
    "health"=> to_pg_array($_POST['health']),
    "time_out"=> intval($_POST['time']),
    "day_week"=> to_pg_array($_POST['day']),
    "objectif"=> $_POST['objectif'],
    "body_target"=> to_pg_array($_POST['muscles']),
    "user"=> $_SESSION['user'],
];


$into_db = $pdo->prepare('UPDATE users SET sexe= :sexe, bearth_date= :bearth_date, height= :height, weight= :weight, health= :health, time_out= :time_out, day_week= :day_week, objectif= :objectif, body_target= :body_target WHERE hash_user = :user');

$into_db->execute($program);


// set program
$exercice_list = $pdo->query('SELECT id,array_to_json(muscles) as muscle, array_to_json(program) as prog, name, description, tips, image_link FROM exercice')->fetchAll();

$cardio = [];
$poids = [];
$masse = [];

foreach($exercice_list as $res){
    $res->prog=json_decode($res->prog);
    $res->muscle = json_decode($res->muscle);
    $res->name = trim($res->name);
    $res->image_link = trim($res->image_link);

    foreach($res->prog as $key =>$temp){
        $res->prog[$key] = trim(str_replace('\'', ' ',$temp));
    }
    foreach($res->muscle as $key =>$temp){
        $res->muscle[$key] = trim(str_replace('\'', ' ',$temp));
    }


    if( trim($res->prog[0]) == 'Prise de masse'){
        array_push($masse, $res);
    }else if(trim($res->prog[0]) == 'Cardio'){
        array_push($cardio, $res);
    }else if(trim($res->prog[0]) == 'Renforcement'){
        array_push($poids, $res);
    }
    
}

//trie en fonction de l'objectif
if( $program['objectif'] == 'Prise de masse'){
    $exercices_user = $masse;
}else if( $program['objectif'] == 'Cardio'){
    $exercices_user = $cardio;
}else if( $program['objectif'] == 'Renforcement'){
    $exercices_user = $poids;
}

//trie en fonction des muscles
$temp_exercice= [];
foreach($exercices_user as $exo){
    foreach($_POST['muscles'] as $progra){
        if($progra == $exo->muscle){
            array_push($temp_exercice, $exo);
        }
    }
}

$health_data = json_decode(file_get_contents('../data/health.json'));

//trie en fonction de la santé
if($program['health'][0] == 'Asme' && $program['health'][2] == 'Articulations' && $program['health'][3] == 'Muscles'){

}else{
    $health_issue =[];
    foreach($_POST['health'] as $issue){
        foreach($health_data->$issue->restriction->muscles as $muscle){
            foreach($temp_exercice as $key=>$exo){
                foreach($exo->muscle as $end){
                    if($muscle == $end){
                        unset($temp_exercice, $key);
                    }
                }
            }
        }
    }

    
}

// varriable pour la bdd
$set_program= [
    "hash_user" =>$_SESSION['user'],
    "program_time" => $program['time_out'],
    "program_star" => time(),
    "program_planning" =>[
        "lundi"=>[
            "exos"=>[],
            "duration"=>($program['time_out']*2/3),
        ],
        "mardi"=>[
            "exos"=>[],
            "duration"=>($program['time_out']*2/3),
        ],
        "mercredi"=>[
            "exos"=>[],
            "duration"=>($program['time_out']*1/3),
        ],
        "jeudi"=>[
            "exos"=>[],
            "duration"=>($program['time_out']*1/3),
        ],
        "vendredi"=>[
            "exos"=>[],
            "duration"=>($program['time_out']*1/3),
        ],
        "samedi"=>[
            "exos"=>[],
            "duration"=>$program['time_out'],
        ],
        "dimanche"=>[
            "exos"=>[],
            "duration"=>$program['time_out'],
        ],
    ],
];
//planification de la semain

// lundi    2/3
// mardi    2/3
// mercredi 1/3
// jeudi    1/3
// vendredi 1/3
// samedi   3/3
// dimanche 3/3
$nb_exercice = count($temp_exercice);
$i =0;


if($nb_exercice<4){
    while($nb_exercice<4){
        array_push($temp_exercice, $cardio[rand(0, count($cardio)-1)]);
        $nb_exercice = count($temp_exercice);
    }
}


foreach($_POST['day'] as $day){
    
    for($i=0; $i<4; $i++){
        array_push($set_program['program_planning'][$day]['exos'], $temp_exercice[rand(0,$nb_exercice-1)]->id);
    }
}

// duration
// foreach($set_program['program_planning'] as $day){
//     if(!empty($day['exos'])){
//         if()
//     }
// }

$set_program['program_planning'] = json_encode($set_program['program_planning']);
$send = $pdo->prepare('INSERT INTO user_program (hash_user, program_time, program_star, program_planning) VALUES (:hash_user, :program_time, :program_star, :program_planning)');

$send->execute($set_program);






