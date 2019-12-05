<?php

$dataPoints2 = array();
//Best practice is to create a separate file for handling connection to database
try{
    // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   'mysql:host=localhost;dbname=weatherstation;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
        'root', //'root',
        '', //'',
        array(
            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_PERSISTENT => false
        )
    );

    $handle = $link->prepare('select id, humidity from measurement order by id desc limit 20160');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);

    foreach($result as $row){
        array_push($dataPoints2, array("x"=> $row->id, "y"=> $row->humidity));
    }
    $link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}

?>