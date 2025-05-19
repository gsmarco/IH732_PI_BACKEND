<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require 'conexion.php';

$sql = "SELECT * FROM peliculas ORDER BY id DESC";
$result = $conn->query($sql);

$peliculas = [];

while ($row = $result->fetch_assoc()) {
    $peliculas[] = $row;
}

header('Content-Type: application/json');
echo json_encode($peliculas);
