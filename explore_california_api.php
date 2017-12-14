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

//A RESTful API is an application program interface (API) that uses HTTP requests to GET, PUT, POST and DELETE data.

//A RESTful API -- also referred to as a RESTful web service -- is based on representational state transfer (REST) technology,
// an architectural style and approach to communications often used in web services development.

//