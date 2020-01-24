<?php
// Author: Emirhan Gocturk
// Date: 3 November 2019
include 'dbConfig.php';

// Array to store data collected from database
$dataPoints = array();
try{
    // Creating a new connection.
    $link = new \PDO(   'mysql:host=localhost;dbname=' . $DB_NAME . ';charset=utf8mb4',
        $DB_USERNAME, //'root',
        $DB_PASSWORD, //'',
        array(
            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_PERSISTENT => false
        )
    );

    // Prepare, execute and fetch the result
    $handle = $link->prepare('select date_added, temperature from measurements order by id desc');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);

    // Place data into assoc array
    foreach($result as $row){
        array_push($dataPoints, array("x"=> $row->date_added, "y"=> $row->temperature));
    }
    $link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}

?>