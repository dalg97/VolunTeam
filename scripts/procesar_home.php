<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
$conexion = new mysqli("localhost", "volunt_user", "jdu2352h", "volunteam");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
$sql = "SELECT * FROM evento WHERE destacado=TRUE";
$resultado = $conexion->query($sql);
