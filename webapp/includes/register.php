<?php
// Author: Emirhan Gocturk
// Date: 3 November 2019
// Description: Register user into the database after several layers of checks

if (isset($_POST['signupSubmit'])) {
    require('dbh.php'); // Database handler

    // Store post vars into sensible variables for ease of use
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordVerify = $_POST['passwordVerify'];

    if (empty($username) || empty(email) || empty(password) || empty($passwordVerify)) {
        // If any of them is empty handle the error
        header('Location: ../signup.php?error=emptyFields&username='.$username.'email='.$email);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        // If email is valid after filtering or not
        header('Location: ../signup.php?error=emptyFields');
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Filter email from SQL injections
        header('Location: ../signup.php?error=emptyFields&email='.$email);
        exit();
    } else if ($password !== $passwordVerify) {
        // Check if passwords match
        header('Location: ../signup.php?error=passwordMismatch&username='.$username.'email='.$email);
        exit();
    } else {
        // Prepare connection and init sql query
        $sql = "SELECT uid FROM users WHERE uid = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            // Prepare sql statement
            header('Location: ../signup.php?error=sqlError1');
            exit();
        } else {
            // Bind username to sql query, execute and store result
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt); // Check num of rows from result

            if ($resultCheck > 0) {
                // If there are any users with same username, return error
                header('Location: ../signup.php?error=usernameTaken&email='.$email);
            } else {
                // Prepare sql query and init statement with a connection
                $sql = "INSERT INTO users (uid, email, pwd) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    // Prepare statement and query
                    header('Location: ../signup.php?error=sqlError2');
                    exit();
                } else {
                    // Hash password given by user
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    // Bind parameters into sql query
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt); // Execute query
                    header('Location: ../signup.php?signup=success');
                    exit();
                }
            }
        }
    }
    // Close statement and SQL connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo 'NONONO';
}