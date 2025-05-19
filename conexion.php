<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$host = "localhost";
$user = "root";
$pass = "Olga0322";
$db = "catalogo_peliculas";

// $host = "sql2008.infinityfree.com";
// $user = "if0_38714590";
// $pass = "Mibarrita123456";
// $db = "if0_38714590_catalogo_peliculas";


$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
