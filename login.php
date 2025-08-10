<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

  <header>
    <h1><i class="fas fa-hands-helping"></i>VolunTeam</h1>
  </header>

  <main>
    <section class="seccion">
      <h2><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</h2>

      <div class="card perfil-card">
        <form action="procesar_login.php" method="POST">
          <label for="correo">Correo electrónico:</label><br>
          <input type="email" id="correo" name="correo" required><br>

          <label for="passwd">Contraseña:</label><br>
          <input type="password" id="passwd" name="passwd" required><br><br>

          <button type="submit" class="btn">Entrar</button>
        </form>
        <p>¿No tienes cuenta? <a href="registro.php">Regístrate</a></p>
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 VolunTeam. Todos los derechos reservados.</p>
  </footer>

</body>
</html>