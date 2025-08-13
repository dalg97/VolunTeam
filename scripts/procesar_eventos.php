<?php
session_start();
$conexion = new mysqli("localhost", "volunt_user", "jdu2352h", "volunteam");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$sql = "SELECT * FROM evento WHERE destacado = FALSE";
$resultado = $conexion->query($sql);
?>