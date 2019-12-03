<?php include('templates/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col" style="margin-top: 15%;">
            <center> <img src="./img/logo.png" alt="" width="150px;">
                <p style="color: white;">Premium member login</p>
            </center>
            <form action="includes/login.php" method="post">
                <input type="username" name="username" placeholder="username" class="form-control input">
                <input type="password" name="password" placeholder="password" class="form-control input">
                <button class="btn btn-warning">Login</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>

<?php include('templates/footer.php'); ?>

