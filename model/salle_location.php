<?php

require '../controller/location.php';

$place=ip_location('78.31.41.54');


echo json_encode(places($place->data->latitude.','.$place->data->longitude));