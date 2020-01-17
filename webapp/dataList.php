<?php
include('includes/auth.php');
include('templates/header.php');
include('templates/navbar.php');
include('includes/getListData.php');
?>
<div class="container">
    <br>
    <br>
    <div class="row">
        <div class="col-sm">
            <p># >> Represents data id stored in the database</p>
            <h1>Data list</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Temperature</th>
                    <th scope="col">Humidity</th>
                    <th scope="col">Pressure</th>
                    <th scope="col">Ambient Light</th>
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
                    <td>" . $row ['light'] . " % </td>
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
