<?php
session_start();
echo "🟢 Paso 1: sesión iniciada<br>";

$conexion = new mysqli("localhost", "volunt_user", "jdu2352h", "volunteam");
echo "🟢 Paso 2: conexión intentada<br>";

if ($conexion->connect_error) {
    die("❌ Conexión fallida: " . $conexion->connect_error);
}
echo "🟢 Paso 3: conexión exitosa<br>";

$correo = trim($_POST['correo']);
$passwd = $_POST['passwd'];
echo "🟢 Paso 4: datos recibidos<br>";

$sql = "SELECT * FROM usuario WHERE correo = '$correo'";
$resultado = $conexion->query($sql);
echo "🟢 Paso 5: consulta SQL ejecutada<br>";

if (!$resultado) {
    die("❌ Error en la consulta: " . $conexion->error);
}

if ($resultado->num_rows === 1) {
    echo "🟢 Paso 6: usuario encontrado<br>";

    $usuario = $resultado->fetch_assoc();
    echo "🟢 Paso 7: datos cargados<br>";

    if ($passwd === $usuario['passwd']) {
        echo "🟢 Paso 8: contraseña correcta<br>";

        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
        $_SESSION['correo'] = $usuario['correo'];
        $_SESSION['edad'] = $usuario['edad'];
        $_SESSION['direccion_usuario'] = $usuario['direccion_usuario'];
        $_SESSION['intereses'] = $usuario['intereses'];
        $_SESSION['experiencia'] = $usuario['experiencia'];
        $_SESSION['rol'] = $usuario['rol'];

        echo "🟢 Paso 9: sesión guardada<br>";

        header("Location: perfil.php");
        exit();
    } else {
        echo "❌ Contraseña incorrecta.";
    }
} else {
    echo "❌ Usuario no encontrado.";
}
?>