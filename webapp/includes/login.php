<?php

if (isset($_POST['loginSubmit'])) {
    require 'dbh.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        // empty fields
    } else {
        $sql = "SELECT * FROM users WHERE uid = ? OR email = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            // SQL Error
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if () {

            }
        }
    }
}