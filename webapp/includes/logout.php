<?php
session_start();
if (!empty($_SESSION['loggedin'])){
    $_SESSION = array();
    echo 'logged';
}