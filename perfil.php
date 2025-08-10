<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    echo "⚠ Acceso no autorizado. Por favor inicia sesión.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>VolunTeam - Perfil</title>
  <link rel="stylesheet" href="styles.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
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
      <h2><i class="fas fa-user-circle"></i> Mi Perfil</h2>

      <div class="card perfil-card">
        <div class="perfil-header">
          <img src="img/foto-perfil.jpg" alt="foto-perfil" class="avatar"/>
          <h3><?php echo $_SESSION['nombre_usuario']; ?></h3>
          <p class="ubicacion"><i class="fas fa-map-marker-alt"></i> <?php echo $_SESSION['direccion_usuario'] ?? 'Ubicación no disponible'; ?></p>
        </div>
        <div class="perfil-detalles">
          <p><strong>Edad:</strong> <?php echo $_SESSION['edad'] ?? 'N/A'; ?> años</p>
          <p><strong>Correo:</strong> <?php echo $_SESSION['correo']; ?></p>
          <p><strong>Intereses:</strong> <?php echo $_SESSION['intereses'] ?? 'No especificado'; ?></p>
          <p><strong>Experiencia:</strong> <?php echo $_SESSION['experiencia'] ?? 'No especificado'; ?></p>
          <p><strong>Rol:</strong> <?php echo $_SESSION['rol']; ?></p>
          <a href="logout.php" class="btn">Cerrar sesión</a>
        </div>
      </div>

    </section>
  </main>

  <footer>
    <p>&copy; 2025 VolunTeam. Todos los derechos reservados.</p>
  </footer>

</body>
</html>