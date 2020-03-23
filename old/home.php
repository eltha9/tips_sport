<?php
session_start();

if(isset($_SESSION['user'])){
    $db_log = parse_ini_file("config.ini");
    $db_log = (object)$db_log;
    
    require './controller/database.php';

    require './model/acount.php';
    
}else{
    header('Location: index.php');
}





