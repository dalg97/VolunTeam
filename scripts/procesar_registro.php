<?php
session_start();
require_once 'db.php';

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $direccion = trim($_POST['direccion'] ?? '');
    $edad = intval($_POST['edad'] ?? 0);
    $correo = filter_var(trim($_POST['correo'] ?? ''), FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';
    $intereses = trim($_POST['intereses'] ?? '');
    $experiencia = trim($_POST['experiencia'] ?? '');

    if (!$nombre || !$correo || !$password) {
        $errors[] = 'Nombre, correo y contraseña son obligatorios.';
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare('SELECT id_usuario FROM usuario WHERE correo = :correo LIMIT 1');
        $stmt->execute([':correo' => $correo]);
        if ($stmt->fetch()) {
            $errors[] = 'El correo ya está registrado.';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = 'INSERT INTO usuario (nombre_usuario, direccion_usuario, edad, correo, passwd, intereses, experiencia)
                    VALUES (:nombre, :direccion, :edad, :correo, :password, :intereses, :experiencia)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nombre' => $nombre,
                ':direccion' => $direccion,
                ':edad' => $edad,
                ':correo' => $correo,
                ':password' => $hash,
                ':intereses' => $intereses,
                ':experiencia' => $experiencia
            ]);
            $_SESSION['success'] = 'Registro completado. Puedes iniciar sesión.';
            header('Location: login.php');
            exit;
        }
    }
}