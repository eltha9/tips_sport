<?php
session_start();
echo $_SESSION['user'];
$db_log = parse_ini_file("../config.ini");
$db_log = (object)$db_log;

require 'database.php';



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
    echo $year.'</br>';
    echo $current_year.'</br>';

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
echo '<pre>';
var_dump($program);
echo '</pre>';

$into_db = $pdo->prepare('UPDATE users SET sexe= :sexe, bearth_date= :bearth_date, height= :height, weight= :weight, health= :health, time_out= :time_out, day_week= :day_week, objectif= :objectif, body_target= :body_target WHERE hash_user = :user');

$into_db->execute($program);


