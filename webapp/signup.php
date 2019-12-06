<?php
// Author: Emirhan Gocturk
// Date: 2 December 2019
// Description: Signup page used to display the UI for user to put in data

include('templates/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md"></div>
        <div class="col-md" style="margin-top: 15%;">
            <center> <img src="./img/logo.png" alt="" width="150px;">
                <p style="color: white;">Become a premium member</p>
            </center>
            <form action="includes/register.php" method="post">
                <input type="username" name="username" placeholder="username" class="form-control input" required>
                <input type="email" name="email" placeholder="your@email.com" class="form-control input" required>
                <input type="password" name="password" placeholder="password" class="form-control input" required>
                <input type="password" name="passwordVerify" placeholder="password" class="form-control input" required>
                <button class="btn btn-warning" name="signupSubmit">Signup</button>
            </form>
            <br>
            <p style="color:white;">Already a member? <a href="index.php">Login.</a></p>
        </div>
        <div class="col-md"></div>
    </div>
</div>

<?php include('templates/footer.php'); ?>

