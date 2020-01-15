<?php
// Author: Emirhan Gocturk
// Date: 3 November 2019
//Database handler
include 'dbConfig.php';

// Database handler
$conn = mysqli_connect($SERVER_NAME, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

if (!$conn) {
    die('Connection failure: ' . mysqli_connect_error());
}