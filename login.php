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
    <h1><i class="fas fa-hands-helping"></i> VolunTeam</h1>
    <nav>
      <a href="home.html"><i class="fas fa-home"></i> Inicio</a>
      <a href="voluntariado.php"><i class="fas fa-hand-holding-heart"></i> Voluntariado</a>
      <a href="impacto.html"><i class="fas fa-seedling"></i> Impacto</a>
      <a href="recursos.html"><i class="fas fa-folder-open"></i> Recursos</a>
      <a href="sobre-nosotros.html"><i class="fas fa-envelope"></i> Sobre Nosotros</a>
    </nav>
    <a href="perfil.php" class="fa-solid fa-user-circle" title="Mi perfil"
       style="position: absolute; top: 1.2rem; right: 1.5rem; font-size: 1.4rem; color: white;"></a>
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
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 VolunTeam. Todos los derechos reservados.</p>
  </footer>

</body>
</html>