<?php 


function ip_location($ip){
    $data = to_get('https://ipvigilante.com/'.$ip);

    $data = json_decode($data);

    return $data;
}

function places($place){
    $key='AIzaSyDxO8x-NVuG-PsoRYu444MyVWaz9soiqX0';

    $query = http_build_query([
        'location' => $place,
        'radius' => 2000,
        'query'=> 'salle de sport ',
        'inputtype' => 'textquery',
        'language' => 'fr',
        'key' => $key,
    ]);
    $url = 'https://maps.googleapis.com/maps/api/place/textsearch/json?'.$query;

    $returned_data =[];
    
    $data = to_get($url);
    $data = json_decode($data);

    foreach($data->results as $result){ //dispaly the first 20 salle
        $temp_data = [
            "name"=>$result->name,
            "location"=>[
                "lat"=>$result->geometry->location->lat,
                "lng"=>$result->geometry->location->lng,
            ],
        ];
        array_push($returned_data, $temp_data );
    }
    $nb_salle = 0; // maximum salle display
    while(isset($data->next_page_token) && $nb_salle<6){ //display all the allse
        $query_next = http_build_query([
            'pagetoken' => $data->next_page_token ,
            'key' => $key,
        ]);
        $next_url = 'https://maps.googleapis.com/maps/api/place/textsearch/json?'.$query;
        $data=to_get($next_url);
        $data = json_decode($data);
        foreach($data->results as $result){
            $temp_data = [
                "name"=>$result->name,
                "location"=>[
                    "lat"=>$result->geometry->location->lat,
                    "lng"=>$result->geometry->location->lng,
                ],
            ];
            array_push($returned_data, $temp_data );
        }
        $nb_salle++;
    }

    return $returned_data;
}
