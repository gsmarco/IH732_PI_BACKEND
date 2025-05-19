<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require 'conexion.php';

$id = $_GET['id'];
$data = json_decode(file_get_contents("php://input"), true);

$sql = "UPDATE peliculas SET titulo=?, anio=?, director=?, genero=?, sinopsis=?, imagen_url=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssi", $data['titulo'], $data['anio'], $data['director'], $data['genero'], $data['sinopsis'], $data['imagen_url'], $id);
$stmt->execute();

echo json_encode(["success" => true]);
