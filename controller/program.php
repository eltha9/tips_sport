<?php

$program= [
    "sexe"=> $_POST['sexe'],
    "bearth_date"=> strtotime($_POST['age']),
    "weight"=> $_POST['poids'],
    "height"=> $_POST['taille'],
    "health"=> $_POST['health'],
    "time_out"=> $_POST['time'],
    "day_week"=> $_POST['day'],
    "objectif"=> $_POST['objectif'],
    "body_target"=> $_POST['muscles'],
];
