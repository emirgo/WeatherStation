<?php
if (isset($_POST['loginSubmit'])){
    require 'dbh.php';
    $mailuid = $_POST['username'];
    $password = $_POST['password'];
    echo 'good';
    if (empty($mailuid) || empty($password)) {
        header("Location: ../index.php?error=emptyFields");
        echo 'good1';
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE uid = ? OR email = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlError");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify($password, $row['pwd']);
                if (!$passCheck) {
                    header("Location: ../index.php?error=wrongPassword");
                    exit();
                } else if ($passCheck == true) {
                    // Login
                    session_start();
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['username'] = $row['uid'];
                    $_SESSION['sound'] = true;
                    header("Location: ../center.php");
                    exit();
                } else {
                    header("Location ../index.php?error=wrongPassword");
                    exit();
                }
            } else {
                header("Location: ../index.php?error=noUser");
                exit();
            }
        }
    }
} else {
    echo 'UNAUTHORIZED';
}