<?php

/*
    DATABASE SETUP
*/
try{
    $pdo = new PDO('pgsql:dbname='.$db_log->db_name.';host='.$db_log->host.';port='.$db_log->port.'', $db_log->user, $db_log->psw);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    var_dump($e->getMessage());
    die('error in db');
}
