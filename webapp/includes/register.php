<?php

if (isset($_POST['signupSubmit'])) {
    require('dbh.php');

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordVerify = $_POST['passwordVerify'];

    if (empty($username) || empty(email) || empty(password) || empty($passwordVerify)) {
        header('Location: ../signup.php?error=emptyFields&username='.$username.'email='.$email);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header('Location: ../signup.php?error=emptyFields');
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ../signup.php?error=emptyFields&email='.$email);
        exit();
    } else if ($password !== $passwordVerify) {
        header('Location: ../signup.php?error=passwordMismatch&username='.$username.'email='.$email);
        exit();
    } else {
        $sql = "SELECT uid FROM users WHERE uid = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../signup.php?error=sqlError1');
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0) {
                header('Location: ../signup.php?error=usernameTaken&email='.$email);
            } else {
                $sql = "INSERT INTO users (uid, email, pwd) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header('Location: ../signup.php?error=sqlError2');
                    exit();
                } else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header('Location: ../signup.php?signup=success');
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo 'NONONO';
}