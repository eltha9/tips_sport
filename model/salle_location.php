<?php
require '../controller/curl.php';
require '../controller/location.php';
$user_ip = $_SERVER['REMOTE_ADDR'];

if(!empty($_GET) && !empty($_GET['lat']) && !empty($_GET['lat'])){
    $lat = floatval($_GET['lat']);
    $lng = floatval($_GET['lng']);
    echo json_encode(places($lat.','.$lng));
}else if(empty($_GET)){
    $place=ip_location($user_ip);
    $data = places($place->data->latitude.','.$place->data->longitude);
    $global_data = [
        "result"=> [],
        "localisation"=>[]
    ];
    $data_loc= [
        "lat" =>floatval($place->data->latitude),
        "lng" =>floatval($place->data->longitude),
    ];
    array_push($global_data['localisation'], $data_loc);
    array_push($global_data['result'], $data);
    echo json_encode($global_data);
}


