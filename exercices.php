<?php





session_start();
$db_log = parse_ini_file("config.ini");
$db_log = (object)$db_log;

require './controller/database.php';

$data = $pdo->query('SELECT array_to_json(muscles) as muscle, array_to_json(program) as prog, name, description, tips, image_link FROM exercice')->fetchAll();

// echo '<pre>';
// var_dump($data);
// echo '</pre>';

$cardio = [];
$poids = [];
$masse = [];

foreach($data as $res){
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
function print_array($tab){
    $text= ' ';
    $lenght = count($tab);
    foreach($tab as $key=>$txt){
        if($key == $lenght-1){
            $text = $text.$txt;

        }else{
            $text = $text.$txt.', ';

        }
    }
    return $text;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TipSport</title>
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/exercices.css">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
</head>
<body>
<div class="sidebar">
    <div class="content-sidebar">
        <h1>TipSport</h1>
        <ul>
            <div class="top-content">
                <li><a class='testjs' href='home.php#sec1'>Mes statistiques</a></li>
                <li><a href='home.php#sec2'>Mes exercices</a></li>
                <li><a href='home.php#sec3'>Planning</a></li>
                <li><a class='testjs4' href='home.php#sec4'>Carte</a></li>
            </div>
            <div class="bottom-content">
                <li><a href="exercices.php">Tous les exercices</a></li>
                <li><a href="./view/logout.php">Déconnection</a></li>
            </div>
        </ul>
    </div>
</div>
<div class="big-container">
    <h1>Tous les exercices</h1>
    <div class="title-exercice">
        <h2><a class='weight-button-js active-button'>Prise de masse</a></h2>
        <h2 class='cardio-button-js inactive-button'>Cardio</h2>
        <h2 class='weightloss-button-js inactive-button'>Perte de poids</h2>
    </div>
    <div class="container-weight-gain weightgainarticle active"> <!--Masse-->
        <?php foreach($masse as $item): ?>
        <div class="exercice-template">
            <div class="right-content">
                <div class="container-picture">
                    <img src="<?= $item->image_link?>" alt=""> <!-- image de l'exercice-->
                </div>
                <div class="array-weight-repetition">
                    <div class="repetition-array">
                        <h5>Nombre de répétitions</h5>
                        <span>x 15</span>
                    </div>
                    <div class="weight-array">
                        <h5>Poids idéal</h5>
                        <span>12 kg</span>
                    </div>
                    <div class="muscle-array">
                        <h5>Muscles ciblés</h5>
                        <span><?= print_array($item->muscle)?></span> <!-- image de l'exercice-->
                    </div>
                </div>
            </div>
            <div class="left-content">
                <div class="container-content-exercice">
                    <h3><?= $item->name?></h3> <!--nome de l'exercice -->
                    <h5>Description : </h5>
                    <p><?= $item->description?></p> <!--description de l'exercice -->
                    <h5>Conseils : </h5>
                    <p><?= $item->tips?></p> <!--tips de l'exercice -->
                </div>
            </div>
        </div>
        <?php endforeach ?>
        
    </div>


    <div class="container-weight-gain cardioarticle inactive"> <!-- CARDIO-->
        <?php foreach($cardio as $item): ?>
            <div class="exercice-template">
                <div class="right-content">
                    <div class="container-picture">
                        <img src="<?= $item->image_link?>" alt=""> <!-- image de l'exercice-->
                    </div>
                    <div class="array-weight-repetition">
                        <div class="repetition-array">
                            <h5>Nombre de répétitions</h5>
                            <span>x 15</span>
                        </div>
                        <div class="weight-array">
                            <h5>Poids idéal</h5>
                            <span>12 kg</span>
                        </div>
                        <div class="muscle-array">
                            <h5>Muscles ciblés</h5>
                            <span><?= print_array($item->muscle)?></span> <!-- image de l'exercice-->
                        </div>
                    </div>
                </div>
                <div class="left-content">
                    <div class="container-content-exercice">
                        <h3><?= $item->name?></h3> <!--nome de l'exercice -->
                        <h5>Description : </h5>
                        <p><?= $item->description?></p> <!--description de l'exercice -->
                        <h5>Conseils : </h5>
                        <p><?= $item->tips?></p> <!--tips de l'exercice -->
                    </div>
                </div>
            </div>
            <?php endforeach ?>
    </div>



    <div class="container-weight-gain weightlossarticle inactive"> <!-- perte de poids-->
        <?php foreach($poids as $item): ?>
            <div class="exercice-template">
                <div class="right-content">
                    <div class="container-picture">
                        <img src="<?= $item->image_link?>" alt=""> <!-- image de l'exercice-->
                    </div>
                    <div class="array-weight-repetition">
                        <div class="repetition-array">
                            <h5>Nombre de répétitions</h5>
                            <span>x 15</span>
                        </div>
                        <div class="weight-array">
                            <h5>Poids idéal</h5>
                            <span>12 kg</span>
                        </div>
                        <div class="muscle-array">
                            <h5>Muscles ciblés</h5>
                            <span><?= print_array($item->muscle)?></span> <!-- image de l'exercice-->
                        </div>
                    </div>
                </div>
                <div class="left-content">
                    <div class="container-content-exercice">
                        <h3><?= $item->name?></h3> <!--nome de l'exercice -->
                        <h5>Description : </h5>
                        <p><?= $item->description?></p> <!--description de l'exercice -->
                        <h5>Conseils : </h5>
                        <p><?= $item->tips?></p> <!--tips de l'exercice -->
                    </div>
                </div>
            </div>
            <?php endforeach ?>
    </div>
</div>
    <script src="scripts/exercices.js"></script>
</body>
</html>