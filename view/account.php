<?php

if(!empty($_GET)){
    $db_log = parse_ini_file("../config.ini");
    $db_log = (object)$db_log;

    require '../controller/database.php';
    $user =[
        "mail"=> trim($_GET['mail']),
        "psw"=> $_GET['psw']
    ];

    $salt = 'hbuo4654684azerfaf';

     $user['psw'] = hash('sha512', $salt.$user['psw']);
       
    $check_is_in = $pdo->query('SELECT name FROM users WHERE mail = \''.$user['mail'].'\' AND hash_psw =\''.$user['psw'].'\'')->fetch();
    


    if($check_is_in != false){
        echo $check_is_in->name;

    }else if($check_is_in == false){
        echo 'error connection';
        
    }


}

?>