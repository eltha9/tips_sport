<?php


// require('../pages/home.html');


if( isset($_GET['page'])){
    $page = $_GET['page'];

}else{
    require('../pages/home.html');

    die;
}

switch($page){
    case '':
    case 'home':
        require('../pages/home.html');
    break;
    case 'dashboard':
        require('../pages/dashboard.php');
    break;
    default:
        require('../pages/home.html');
}

