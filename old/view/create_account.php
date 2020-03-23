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
    if($check_is_in != false){ // login false
        header('Location: index.php');
    }else if($check_is_in == false){ //user exist login good

        $salt = 'hbuo4654684azerfaf';

        $user['psw'] = hash('sha512', $salt.$user['psw']);
        $user_hash = hash('whirlpool', $user['name'].$user['psw']);

        $set_user = $pdo->prepare('INSERT INTO users (name, mail, hash_psw, hash_user) VALUES (:name, :mail, :hash_psw, :hash_user)');

        $set_user->bindValue('name',$user['name']);
        $set_user->bindValue('mail',$user['mail']);
        $set_user->bindValue('hash_psw',$user['psw']);
        $set_user->bindValue('hash_user',$user_hash);

        $set_user->execute();
        // send welcome mail to user
        session_start();
        $_SESSION['user']= $user_hash;
        header('Location: ../program.php');

    }


}
