<?php
// Author: Emirhan Gocturk
// Date: 3 November 2019
include 'dbConfig.php';

// Array to store data
$dataList = array();
result;
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
    $handle = $link->prepare('select id, temperature, humidity, pressure, date_added from measurements order by id asc limit 20160');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);

    // Place data into assoc array
    foreach($result as $row){
        array_push($dataList, array("id" => $row->id, "temperature" => $row->temperature, "humidity" => $row->humidity, "pressure" => $row->pressure, "date_added" => $row->date_added));
    }
    $link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}

?>