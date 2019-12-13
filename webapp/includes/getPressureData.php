<?php
include 'dbConfig.php';
// Author: Emirhan Gocturk
// Date: 5 December 2019
// Description: Gets pressure data from database and puts it into charts

// Data array that we return for front end to display
$dataPoints3 = array();
try {
    // Creating a new connection.
    $link = new \PDO('mysql:host=localhost;dbname=weatherstation;charset=utf8mb4',
        $DB_USERNAME, //'root',
        $DB_PASSWORD, //'',
        array(
            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_PERSISTENT => false
        )
    );

    // Prepare, execute and fetch the result
    $handle = $link->prepare('select id, pressure from measurement order by id desc limit 20160');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);

    // Place data into assoc array
    foreach ($result as $row) {
        array_push($dataPoints3, array("x" => $row->id, "y" => $row->pressure));
    }
    $link = null;
} catch (\PDOException $ex) {
    print($ex->getMessage());
}

