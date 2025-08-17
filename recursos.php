<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>VolunTeam - Recursos</title>
  <link rel="stylesheet" href="styles.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body>

  <header>
    <h1><i class="fas fa-hands-helping"></i> VolunTeam</h1>
    <nav>
      <a href="home.php"><i class="fas fa-home"></i> Inicio</a>
      <a href="voluntariado.php"><i class="fas fa-hand-holding-heart"></i> Voluntariado</a>
      <a href="impacto.html"><i class="fas fa-seedling"></i> Impacto</a>
      <a href="recursos.php"><i class="fas fa-folder-open"></i> Recursos</a>
      <a href="sobre-nosotros.php"><i class="fas fa-envelope"></i> Sobre Nosotros</a>
    </nav>
    <div style="position: absolute; top: 1.2rem; right: 1.5rem; color: white;">
      <a href="perfil.php" style="color: inherit; text-decoration: none; margin-right: 0.5rem; display: inline-flex; align-items: center; gap: 0.3rem;"><i class="fa-solid fa-user"></i> <?= htmlspecialchars($_SESSION['user_name']) ?></span>
      <a href="logout.php" class="btn" style="background:transparent; border:1px solid #fff; color:#fff; padding:0.2rem 0.5rem; border-radius:6px; text-decoration:none;">Salir</a>
    </div>

  </header>

  <main>
    <section class="seccion">
      <h2><i class="fas fa-folder-open"></i> Recursos para Voluntarios</h2>
      <p>En esta sección puedes encontrar herramientas útiles para prepararte antes, durante y después de tus actividades como voluntari@:</p>
      <ul>
        <li>📄 <a href="pdf/guia_primeros_auxilios.pdf" target="_blank">Guía de primeros auxilios básica</a></li>
      <li>📝 <a href="pdf/manual_etica.pdf" target="_blank">Manual de ética y conducta voluntaria</a></li>
      <li>🧾 <a href="pdf/formato_inscripcion.pdf" target="_blank">Formatos para inscripción a eventos</a></li>
      <li>📚 <a href="pdf/material_educativo.pdf" target="_blank">Material educativo descargable (niños, adultos mayores, medio ambiente)</a></li>
      <li>🔗 <a href="https://edutin.com/curso-de-liderazgo" target="_blank">Enlaces a cursos gratuitos de liderazgo y comunicación</a></li>
      </ul>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 VolunTeam. Todos los derechos reservados.</p>
  </footer>

</body>
</html>