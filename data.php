<?php
/**
 * Created by PhpStorm.
 * User: nabaz
 * Date: 13-12-2017
 * Time: 21:43
 */
if ($_POST["Username"]!= "admin" || $_POST["Password"]!= "1234"){

    ?>
    Username or password is incorrect try again
    <button onclick="window.history.back()">Try again</button>
    <?php
    exit();
}

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "explorecalifornia";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$select = "SELECT tourName, description, price, keywords, packageDescription, packageGraphic from tours LEFT JOIN packages ON tours.packageId = packages.packageId
LEFT JOIN packages ON tours.packageId = packages.packageId";

$result = $conn->prepare($select);
$result->execute();
$result = $result->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html>
<head>
    <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous">
    </script>
    <script src="sortable.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<h1>virker det?</h1>
<body>

<table class="table sortable" id="tours">
    <thead>

    <tr>
        <th>Tur navn</th>
        <th>Beskrivelse</th>
        <th>Pris</th>
        <th>Keywords</th>
        <th>Kort</th>
        <th>Data</th>
        <th>Billeder</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($result as $row) :?>
        <tr>
            <td><?= $row['tourName'] ?></td>
            <td><?= $row['description'] ?></td>
            <td><?= $row['price'] ?></td>
            <td><?= $row['keywords'] ?></td>
            <td><?= $row['graphic'] ?></td>
            <td><?= $row['packageDescription'] ?></td>
            <td><?= $row['packageGraphic'] ?></td>
        </tr>

    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
