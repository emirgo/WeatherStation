<?php
// Author: Emirhan Gocturk
// Date: 2 December 2019

include('templates/header.php');
include('includes/logout.php');

?>
<div class="container">
    <div class="row">
        <div class="col-md"></div>
        <div class="col-md" style="margin-top: 15%;">
            <center> <img src="./img/newLogo.jpeg" alt="" width="150px;">
                <p style="color: white;">Premium member login</p>
            </center>
            <form action="includes/login.php" method="post">
                <input type="username" name="username" placeholder="username" class="form-control input">
                <input type="password" name="password" placeholder="password" class="form-control input">
                <button class="btn btn-warning" name="loginSubmit">Login</button>
            </form>
            <br>
            <p style="color:white;">Not a member? <a href="signup.php">Signup!</a></p>
        </div>
        <div class="col-md"></div>
    </div>
</div>

<?php include('templates/footer.php'); ?>

