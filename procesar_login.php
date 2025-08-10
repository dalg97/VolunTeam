<?php
    session_start();
    $conexion = new mysqli("localhost", "volunt_user", "jdu2352h", "volunteam");
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
    $correo = trim($_POST['correo']);
    $passwd = $_POST['passwd'];

    $sql = "SELECT * FROM usuario WHERE correo = '$correo'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows === 1) {
        
        $usuario = $resultado->fetch_assoc();
        if ($passwd === $usuario['passwd']) {

            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
            $_SESSION['correo'] = $usuario['correo'];
            header("Location: home.php");
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
?>