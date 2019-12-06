<?php
// Author: Emirhan Gocturk
// Date: 3 December 2019
// If login is set via the form
if (isset($_POST['loginSubmit'])){
    // Database handler
    require 'dbh.php';
    // Store username and password in a variable
    $mailuid = $_POST['username'];
    $password = $_POST['password'];
    if (empty($mailuid) || empty($password)) {
        // Error handling of empty variables
        header("Location: ../index.php?error=emptyFields");
        exit();
    } else {
        // Checking if username is equal to username or email
        $sql = "SELECT * FROM users WHERE uid = ? OR email = ?;";
        $stmt = mysqli_stmt_init($conn); // prepare statement
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            // SQL eror because can't prepare the statement
            header("Location: ../index.php?error=sqlError");
            exit();
        } else {
            // Bind parameters into $sql
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt); // Execute
            $result = mysqli_stmt_get_result($stmt); // Store results in $result
            if ($row = mysqli_fetch_assoc($result)) {
                // After creating the assoc array verify password if it is correct
                $passCheck = password_verify($password, $row['pwd']);
                if (!$passCheck) {
                    // If pwd is wrong return with error
                    header("Location: ../index.php?error=wrongPassword");
                    exit();
                } else if ($passCheck == true) {
                    // Login
                    session_start(); // Start session to store details
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['username'] = $row['uid'];
                    $_SESSION['sound'] = true; // To play intro sound
                    $_SESSION['loggedin'] = true;
                    header("Location: ../center.php"); // Redirect to center
                    exit();
                } else {
                    // Pwd is wrong, handle error
                    header("Location ../index.php?error=wrongPassword");
                    exit();
                }
            } else {
                // No such user, handle error
                header("Location: ../index.php?error=noUser");
                exit();
            }
        }
    }
} else {
    echo 'UNAUTHORIZED';
}