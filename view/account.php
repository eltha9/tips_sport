<?php

if(!empty($_POST)){
    $db_log = parse_ini_file("../config.ini");
    $db_log = (object)$db_log;

    require '../controller/database.php';
    $user =[
        "mail"=> trim($_POST['mail']),
        "psw"=> $_POST['psw']
    ];

    $salt = 'hbuo4654684azerfaf';

    $user['psw'] = hash('sha512', $salt.$user['psw']);
       
    $check_is_in = $pdo->query('SELECT * FROM users WHERE mail = \''.$user['mail'].'\' AND hash_psw =\''.$user['psw'].'\'')->fetch();
    // echo $user['psw'];


    if($check_is_in != false){ // login good
        session_start();
        $_SESSION['user'] = $check_is_in->hash_user;

        if($check_is_in->sexe == null){
            header('Location: ../info.php');
        }else if($check_is_in->sexe != null){
            header('Location: ../home.php');
        }

    }else if($check_is_in == false){//login false
        header('Location: ../index.php');
        
    }


}

?>