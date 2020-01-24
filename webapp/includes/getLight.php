<?php
// Author: Emirhan Gocturk
// Date: 3 November 2019
include 'dbConfig.php';
// Author: Emirhan Gocturk
// Date: 5 December 2019
// Description: Gets pressure data from database and puts it into charts

// Data array that we return for front end to display
$dataPoints4 = array();
try {
    // Creating a new connection.
    $link = new \PDO('mysql:host=localhost;dbname=' . $DB_NAME . ';charset=utf8mb4',
        $DB_USERNAME, //'root',
        $DB_PASSWORD, //'',
        array(
            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_PERSISTENT => false
        )
    );

    // Prepare, execute and fetch the result
    $handle = $link->prepare('select date_added, light from measurements order by id desc');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);

    // Place data into assoc array
    foreach ($result as $row) {
        array_push($dataPoints4, array("x" => $row->date_added, "y" => $row->light));
    }
    $link = null;
} catch (\PDOException $ex) {
    print($ex->getMessage());
}

