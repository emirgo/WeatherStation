<?php
// Database handler
$SERVER_NAME = 'localhost';
$DB_USERNAME = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'weatherstation';

$conn = mysqli_connect($SERVER_NAME, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

if (!$conn) {
    die('Connection failure: ' . mysqli_connect_error());
}