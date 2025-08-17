<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}

$conexion = new mysqli("localhost", "volunt_user", "jdu2352h", "volunteam");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$id_usuario = intval($_SESSION['user_id']);

$usuario_stmt = $conexion->prepare(
    "SELECT nombre_usuario, correo, direccion_usuario, edad, intereses 
     FROM usuario 
     WHERE id_usuario = ?"
);
$usuario_stmt->bind_param("i", $id_usuario);
$usuario_stmt->execute();
$usuario_result = $usuario_stmt->get_result();
$usuario = $usuario_result->fetch_assoc();

$_SESSION['user_name'] = $usuario['nombre_usuario'];
$_SESSION['user_email'] = $usuario['correo'];
$_SESSION['user_address'] = $usuario['direccion_usuario'] ?? '';
$_SESSION['user_age'] = $usuario['edad'] ?? '';
$_SESSION['user_interests'] = $usuario['intereses'] ?? '';


$sql = $conexion->prepare(
    "SELECT e.nombre_evento, e.fecha_evento, e.hora_evento, e.lugar_evento 
     FROM evento e 
     INNER JOIN usuario_evento ue ON e.id_evento = ue.id_evento 
     WHERE ue.id_usuario = ?"
);
$sql->bind_param("i", $id_usuario);
$sql->execute();
$result = $sql->get_result();

$eventos = [];
while ($row = $result->fetch_assoc()) {
    $eventos[] = $row;
}
$conexion->close();
