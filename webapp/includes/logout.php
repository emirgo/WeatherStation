<?php
// Author: Emirhan Gocturk
// Date: 3 November 2019
// Ends session
session_start();
if (!empty($_SESSION['loggedin'])){
    $_SESSION = array();
}