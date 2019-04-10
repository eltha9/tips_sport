<?php

$db_log = parse_ini_file("../config.ini");
$db_log = (object)$db_log;
require '../controller/database.php';

$row = 1;
if (($handle = fopen("../data/exercice.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        
        // echo '<pre>';
        // var_dump($data);
        // echo '</pre>';
        if($num == 14){
            // echo '<pre>';
            // var_dump($data);
            // echo '</pre>';
            // echo $data[1].'</br>';       
            // echo $data[3].'</br>';       
            // echo $data[6].'</br>';       
            // echo $data[9].'</br>';       
            // echo $data[11].'</br>';       
            // echo $data[13].'</br>'; 
            if($row>1){
                $plop = $pdo->prepare('INSERT INTO exercice (name, description, tips, muscles, program, image_link) VALUES (:name, :description, :tips, :muscles, :program, :image_link)');

                $plop->bindValue('name',$data[1]);
                $plop->bindValue('description',$data[3]);
                $plop->bindValue('tips',$data[6]);
                $plop->bindValue('muscles',$data[9]);
                $plop->bindValue('program',$data[11]);
                $plop->bindValue('image_link',$data[13]);

                $plop->execute();
                var_dump($plop);
            }
        }
        $row++;
        
    }
    fclose($handle);
}