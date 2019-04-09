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

/*
    PRIVATE FUNCTION
*/
// concatenate function
function concatenate($tab, $separate = '\''){
    $temp = '';
    $i =0;
    foreach ($tab as $key => $value) {

        if($i<count($tab)-1){
            $temp = $temp.'\''.$value.'\' , ';    
        }else{
            $temp = $temp.'\''.$value.'\'';
        }
        $i++;

    }
    return $temp;
}
function concatenate_keys($tab){
    $temp = '';
    $i =0;
    foreach ($tab as $key => $value) {

        if($i<count($tab)-1){
            $temp = $temp.'`'.$value.'` , ';    
        }else{
            $temp = $temp.'`'.$value.'`';
        }
        $i++;

    }
    return $temp;
}


/*
    USEFULL FUNCTION
*/

//select into the db
function fetch($pdo, $table,$selection, $condition = NULL ){
    if($condition != NULL){
        $query = $pdo->query('SELECT '.$selection.' FROM '.$table.' WHERE '.$condition)->fetchAll();
        echo 'option';
    }else{
        $query = $pdo->query('SELECT '.$selection.' FROM '.$table)->fetchAll();
        echo 'no option';
    }

    return $query; 
}

//add into db
function add($pdo, $table, $keys){ // $keys is an associatif table with the keys and values of them
    $k = concatenate_keys(array_keys($keys)); //db keys
    $v = concatenate($keys); //db values corresponding to the keys
    $exec = $pdo->exec('INSERT INTO '.$table.' ('. $k .') VALUES ('. $v .')');

    return $exec;
}


//remove from db
function remove($pdo, $table, $target){ // target is a string with the condition to reach the target

    $exec= $pdo->exec('DELETE FROM '.$table.' WHERE '.$target);

    return $exec;
}


//update a db 
function update($pdo, $table, $target ,$keys){ // $taget a srting |$keys is an associatif table with heys and values
    $tab_keys = array_keys($keys);
    $values ='';

    for($i= 0; $i<count($tab_keys); $i++){
        if( $i<count($tab_keys)-1){
            $values = $values.'`'.$tab_keys[$i].'`= \''.$keys[$tab_keys[$i]].'\', ';
        }else{
            $values = $values.'`'.$tab_keys[$i].'`= \''.$keys[$tab_keys[$i]].'\'';
        }
    }

    $exec = $pdo->exec('UPDATE '.$table.' SET '.$values.' WHERE '.$target);

    return $exec;
}

?>