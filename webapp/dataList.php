<?php
include 'templates/header.php';
include 'includes/getListData.php';
?>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="center.php">Home</a>
            <a class="nav-item nav-link active" href="#">Data list</a>
        </div>
    </div>
    <div class="navbar-collapse collapse w-50 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <br>
    <br>
    <div class="row">
        <div class="col-sm">
            <h1>Data list</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Temperature</th>
                    <th scope="col">Humidity</th>
                    <th scope="col">Pressure</th>
                    <th scope="col">Date added</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($dataList as $row) {
                    echo " <tr>
                    <th scope=\"row\">" . $row['id'] . "</th>
                    <td>" . $row['temperature'] . "˚C</td>
                    <td>" . $row['humidity'] . "% RH</td>
                    <td>" . $row['pressure'] . " HPa</td>
                    <td>" . $row['date_added'] . "</td>
                </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include 'templates/footer.php';
?>
