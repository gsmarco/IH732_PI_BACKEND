<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require 'conexion.php'; 

$data = json_decode(file_get_contents("php://input")); 

$email = $data->email; 
$password = $data->password; 

$sql = "SELECT * FROM usuarios WHERE email = '$email'"; 
$result = $conn->query($sql); 

if ($result->num_rows > 0) { 
    $user = $result->fetch_assoc(); 
    if ($password = $user['password']) { 
        echo json_encode(["status" => "success", "message" => "Login exitoso"]); 
    } else { 
        echo json_encode(["status" => "error", "message" => "Contraseña incorrecta"]); 
    } 
} else { 
    echo json_encode(["status" => "error", "message" => "Usuario no encontrado"]); 
} 
?>
