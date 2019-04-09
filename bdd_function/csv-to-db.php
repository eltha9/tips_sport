<?php

$db_log = parse_ini_file("../config.ini");
$db_log = (object)$db_log;
require '../controller/database.php';

$row = 1;
$temp=0;
if (($handle = fopen("../data/exercice.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        // echo $data[1].'</br>';       
        // echo $data[3].'</br>';       
        // echo $data[6].'</br>';       
        // echo $data[9].'</br>';       
        // echo $data[11].'</br>';       
        // echo $data[13].'</br>'; 
        // if($temp>1){
        //     $plop = $pdo->prepare('INSERT INTO exercice (name, description, tips, muscles, program, image_link) VALUES (:name, :description, :tips, :muscles, :program, :image_link)');

        //     $plop->binValue('name',$data[1]);
        //     $plop->binValue('description',$data[3]);
        //     $plop->binValue('tips',$data[6]);
        //     $plop->binValue('muscles',$data[9]);
        //     $plop->binValue('program',$data[11]);
        //     $plop->binValue('image_link',$data[13]);
        // }
        $temp ++;
        
    }
    fclose($handle);
}