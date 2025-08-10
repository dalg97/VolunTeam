<?php
  $conexion = new mysqli("localhost", "volunt_user", "jdu2352h", "volunteam");
  if ($conexion->connect_error) {
      die("Conexión fallida: " . $conexion->connect_error);
  }

  $nombre_usuario = $_POST['nombre_usuario'];
  $direccion = $_POST['direccion_usuario'];
  $edad = $_POST['edad'];
  $correo = $_POST['correo'];
  $passwd = $_POST['passwd']; // sin hash, por ahora
  $intereses = $_POST['intereses'];
  $experiencia = $_POST['experiencia'];


  $sql = "INSERT INTO usuario (nombre_usuario, direccion_usuario, edad, correo, passwd, intereses, experiencia)
          VALUES ('$nombre_usuario', '$direccion', $edad, '$correo', '$passwd', '$intereses', '$experiencia')";

  $registro_exitoso = false;
  if ($conexion->query($sql) === TRUE) {
      $registro_exitoso = true;
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body>

  <header>
    <h1><i class="fas fa-hands-helping"></i> VolunTeam</h1>
  </header>

  <main>
    <section class="seccion">
      <h2><i class="fas fa-user-check"></i> Registro de usuario</h2>

      <div class="card perfil-card" style="text-align: center;">
        <?php if ($registro_exitoso): ?>
          <p style="font-size: 1.1rem; color: green;">✅ Usuario registrado con éxito.</p>
        <?php else: ?>
          <p style="font-size: 1.1rem; color: red;"> Ocurrió un error: <?php echo $conexion->error; ?></p>
        <?php endif; ?>
        <a href="login.php" class="btn">Volver al inicio</a>
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 VolunTeam. Todos los derechos reservados.</p>
  </footer>

</body>
</html>