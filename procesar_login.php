<?php
    session_start();
    $conexion = new mysqli("localhost", "volunt_user", "jdu2352h", "volunteam");
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    if (isset($_SESSION['user_id'])) {
    header('Location: home.php');
    exit;
    }
    $error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = filter_var(trim($_POST['correo'] ?? ''), FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';

    if (!$correo || !$password) {
        $error = 'Correo o contraseña inválidos.';
    } else {
        $stmt = $pdo->prepare('SELECT id_usuario, nombre_usuario, correo, passwd FROM usuario WHERE correo = :correo LIMIT 1');
        $stmt->execute([':correo' => $correo]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['passwd'])) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id_usuario'];
            $_SESSION['user_name'] = $user['nombre_usuario'];
            $_SESSION['user_email'] = $user['correo'];
            header('Location: home.php');
            exit;
        } else {
            $error = 'Credenciales incorrectas.';
        }
    }
}
?>