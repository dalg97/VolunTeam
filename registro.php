<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Usuario</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body>

  <main>
    <section class="seccion">
      <h2><i class="fas fa-user-plus"></i> Registrarse</h2>

      <div class="card perfil-card">
        <form action="procesar_registro.php" method="POST">
          <label>Nombre:</label><br>
          <input type="text" name="nombre_usuario" required><br>

          <label>Dirección:</label><br>
          <input type="text" name="direccion_usuario" required><br>

          <label>Edad:</label><br>
          <input type="number" name="edad" required><br>

          <label>Correo electrónico:</label><br>
          <input type="email" name="correo" required><br>

          <label>Contraseña:</label><br>
          <input type="password" name="passwd" required><br>

          <label>Intereses:</label><br>
          <input type="text" name="intereses"><br>

          <label>Experiencia:</label><br>
          <input type="text" name="experiencia"><br><br>

          <button type="submit" class="btn">Crear cuenta</button>
        </form>
      </div>
    </section>
  </main>

</body>
</html>