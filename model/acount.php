<?php
// $program
// $set_program
if(!empty($_POST)){
    require './controller/program.php';
    $user_data = $pdo->query('SELECT * FROM users WHERE hash_user=\''.$_SESSION['user'].'\'')->fetch();
}else if(empty($_POST)){
    
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

$user_progra_exrecice


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TipSport</title>
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/home.css">
</head>
 <body>
<div class="sidebar">
    <div class="content-sidebar">
        <h1>TipSport</h1>
        <ul>
            <div class="top-content">
                <li><a class='testjs' href='#sec1'>Mes statistiques</a></li>
                <li><a href='#sec2'>Mes exercices</a></li>
                <li><a href='#sec3'>Planning</a></li>
                <li><a class='testjs4' href='#sec4'>Carte</a></li>
            </div>
            <div class="bottom-content">
                <li><a href="exercices.php">Tout les exercices</a></li>
                <li><a href="./view/logout.php">Déconnection</a></li>
            </div>
        </ul>
    </div>
</div>
<div class="big-container">
    <h1 data-text="Section 1" id="sec1">Mon programme</h1>
    <div class="container-statistic">
        <h3>Mes statistiques</h3>
        <span><a href="program.php" style="text-decoration: none;">Change</a></span>
    </div>
    <div class="array-statistic">
        <div class="size">
            <h5>taille</h5>
            <span><?= $user_data->height?> cm</span>
        </div>
        <div class="weight">
            <h5>poids</h5>
            <span><?= $user_data->weight?> kg</span>
        </div>
        <div class="age">
            <h5>âge</h5>
            <span><?= $user_data->bearth_date?> ans</span>
        </div>
        <div class="goal">
            <h5>objectif</h5>
            <span><?= $user_data->objectif?></span>
        </div>
    </div>
    <div class="container-exercize" data-text="Section 2" id="sec2">
        <h3>Mes exercices</h3>
        <p>Selon vos statistiques, voici les exercices, nombre de répétition, séries et poids qui vous aideront le plus à atteindre votre objectif. Lisez les descriptions
         et nos conseils pour vous assurer que vos entraînements seront efficaces et sans danger. 
        </p>
    </div>
    <div class="first-exercize">
        <div class="left-content">
            <img src="images/squat-picture.jpg" alt="">
        </div>
        <div class="right-content">
            <h3>Squats</h3>
            <p>
                Debout, jambes écartées de la largeur des épaules, pointes de pieds légèrement écartées vers l’extérieur (à 10h10), 
                bras tendus devant vous (parallèles au sol), fléchir les jambes en poussant les fesses vers l’arrière jusqu’à avoir les cuisses parallèles au sol. Pousser ensuite sur 
                vos jambes afin de revenir à la position initiale, sans toutefois verrouiller les genoux (garder les jambes légèrement fléchies).
            </p>
            <span><img src="images/arrow-right.svg" alt="">En savoir plus</span>
        </div>
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
    </div>
    

    <div class="container-planning" data-text="Section 3" id="sec3">
        <h3>Planning</h3>
        <div class="planning"></div>
    </div>

    <div class="container-map" data-text="Section 4" id="sec4">
        <h3>Carte</h3>
        <div id="map" class="map"></div>
    </div>
</div>
    
<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxO8x-NVuG-PsoRYu444MyVWaz9soiqX0&callback=initMap" sync defer></script>
<script  src="scripts/app.js"></script>
</body>
</html>