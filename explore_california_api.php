<?php
/**
 * Created by PhpStorm.
 * User: nabaz
 * Date: 14-12-2017
 * Time: 10:35
 */

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "explorecalifornia";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$select = "SELECT tourName, description, price, keywords, packageDescription, packageGraphic  from tours
  LEFT JOIN packages ON tours.packageId = packages.packageId
LEFT JOIN packages ON tours.packageId = packages.packageId";

$result = $conn->prepare($select);
$result->execute();
$result = $result->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);