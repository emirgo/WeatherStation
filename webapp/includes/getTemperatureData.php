<?php

$dataPoints = array();
try{
    // Creating a new connection.
    $link = new \PDO(   'mysql:host=localhost;dbname=weatherstation;charset=utf8mb4',
        'root', //'root',
        '', //'',
        array(
            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_PERSISTENT => false
        )
    );

    // Prepare, execute and fetch the result
    $handle = $link->prepare('select id, temperature from measurement order by id desc limit 20160');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);

    // Place data into assoc array
    foreach($result as $row){
        array_push($dataPoints, array("x"=> $row->id, "y"=> $row->temperature));
    }
    $link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}

?>