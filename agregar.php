<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require 'conexion.php';

$data = json_decode(file_get_contents("php://input"), true);

$sql = "INSERT INTO peliculas (titulo, anio, director, genero, sinopsis, imagen_url) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $data['titulo'], $data['anio'], $data['director'], $data['genero'], $data['sinopsis'], $data['imagen_url']);
$stmt->execute();

echo json_encode(["success" => true]);
