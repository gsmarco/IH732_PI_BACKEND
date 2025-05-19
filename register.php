<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require 'conexion.php'; 

$data = json_decode(file_get_contents("php://input")); 

$correo = $data->email; 
$password = $data->password; 

try {
    $sql = "INSERT INTO usuarios (email, password) VALUES ('$correo', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Usuario registrado con éxito"]);
    } else {
        // En caso de otros errores que no lancen excepción
        echo json_encode(["status" => "error", "message" => "Error: " . $conn->error]);
    }
} catch (mysqli_sql_exception $e) {
    if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
        echo json_encode(["status" => "error", "message" => "Este correo ya está registrado."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error del servidor: " . $e->getMessage()]);
    }
}
?>
