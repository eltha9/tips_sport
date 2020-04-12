<?php


// require('../components/home.html');


if( isset($_GET['page'])){
    $page = $_GET['page'];

}else{
    require('../components/home.html');

    die;
}

switch($page){
    case '':
    case 'home':
        require('../components/home.html');
    break;
    case 'dashboard':
        require('../components/dashboard.html');
    break;
    default:
        require('../components/home.html');
}

