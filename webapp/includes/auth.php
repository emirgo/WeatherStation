<?php
// Start session so that auth checks can be done
session_start();
if (!$_SESSION['loggedin']){
    header("Location: ./index.php");
}