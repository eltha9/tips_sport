<?php

if(!empty($_POST)){
    $db_log = parse_ini_file("../config.ini");
    $db_log = (object)$db_log;

    require '../controller/database.php';
    $user =[
        "name"=> trim($_POST['name']),
        "mail"=> trim($_POST['mail']),
        "psw"=> $_POST['psw']
    ];

    $check_is_in = $pdo->query('SELECT mail FROM users WHERE mail = \''.$user['mail'].'\'')->fetch();
    var_dump($check_is_in);
    if($check_is_in != false){
        echo 'error user already exist';
    }else if($check_is_in == false){

        $salt = 'hbuo4654684azerfaf';

        $user['psw'] = hash('sha512', $salt.$user['psw']);
        $user_hash = hash('whirlpool', $user['name'].$user['psw']);

        $set_user = $pdo->prepare('INSERT INTO users (name, mail, hash_psw, hash_user) VALUES (:name, :mail, :hash_psw, :hash_user)');

        $set_user->bindValue('name',$user['name']);
        $set_user->bindValue('mail',$user['mail']);
        $set_user->bindValue('hash_psw',$user['psw']);
        $set_user->bindValue('hash_user',$user_hash);

        $set_user->execute();
        echo 'done';
        // send welcome mail to user 


    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    account created
    <form action="" method="get">
        <label>
            date de naissance
            <input type="date" name="bearth">
        </label>
        <label>
            <p>sexe</p>
            homme
            <input type="radio" name="sexe" value="homme">
            femme
            <input type="radio" name="sexe" value="femme">
        </label>
        <label>
            taille
            <input type="number" name="height" placeholder="170">
        </label>
        <label>
            poids
            <input type="number" name="weight" placeholder="50">
        </label>
        <label>
            <p>santé</p>
            asme
            <input type="checkbox" name="health" value="asme">
            articulation
            <input type="checkbox" name="health" value="articulation">
            muscles
            <input type="checkbox" name="health" value="muscles">
        </label>
        <label>
            <p>objectif</p>
            masse
            <input type="radio" name="objectif" value="masse">
            cardio
            <input type="radio" name="objectif" value="cardio">
            poids
            <input type="radio" name="objectif" value="poids">
        </label>
        <label>
            <p>partie du corps cible</p>
            bras
            <input type="checkbox" name="muscles" value="bras">
            jambes
            <input type="checkbox" name="muscles" value="jambes">
            abdos
            <input type="checkbox" name="muscles" value="abdos">
            dos
            <input type="checkbox" name="muscles" value="dos">
            pectoraux
            <input type="checkbox" name="muscles" value="pectoraux">
            all
            <input type="checkbox" name="muscles" value="all">
        </label>
        <label>
            <p>temps</p>
            < 30min
            <input type="radio" name="temps" value="30">
            30-1h30
            <input type="radio" name="temps" value="60">
            1h30-3h
            <input type="radio" name="temps" value="120">
        </label>
        <label>
            <p>jours</p>
            lundi
            <input type="checkbox" name="day" value="monday">
            mardi
            <input type="checkbox" name="day" value="tuesday">
            mercredi
            <input type="checkbox" name="day" value="wensday">
            jeudi
            <input type="checkbox" name="day" value="thursday">
            vendredi
            <input type="checkbox" name="day" value="friday">
            samedi
            <input type="checkbox" name="day" value="saturday">
            dimanche
            <input type="checkbox" name="day" value="sunday">
        </label>

        <input type="submit">
    </form>
</body>
</html>