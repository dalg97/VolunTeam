<?php require_once "scripts/procesar_perfil.php"; ?>
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
      <a href="home.php"><i class="fas fa-home"></i> Inicio</a>
      <a href="voluntariado.php"><i class="fas fa-hand-holding-heart"></i> Voluntariado</a>
      <a href="perfil.php" class="active"><i class="fas fa-user-circle"></i> Perfil</a>
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
      <h2>Mi Perfil</h2>
      <div class="card perfil-card">
        <div class="perfil-header">
          <img src="img/perfil.jpeg" alt="perfil" class="avatar"/>
          <h3><?= htmlspecialchars($_SESSION['user_name']) ?></h3>
  
        </div>
        <div class="perfil-detalles">
          <p><strong>Correo:</strong> <?= htmlspecialchars($_SESSION['user_email']) ?></p>
          <p><strong>Dirección:</strong> <?= htmlspecialchars($_SESSION['user_address']) ?></p>
          <p><strong>Edad:</strong> <?= htmlspecialchars($_SESSION['user_age']) ?></p>
          <p><strong>Intereses:</strong> <?= htmlspecialchars($_SESSION['user_interests']) ?></p>
        </div>
      </div>
      <section class="seccion">
        <h2>Eventos registrados</h2>
        <?php if (count($eventos) === 0): ?>
          <p>No estás registrado en ningún evento.</p>
        <?php else: ?>
          <ul class="lista-eventos">
            <?php foreach ($eventos as $evento): ?>
              <li>
                <h3><?= htmlspecialchars($evento['nombre_evento']) ?></h3>
                <p><strong>Fecha:</strong> <?= date("d/m/Y", strtotime($evento['fecha_evento'])) ?></p>
                <p><strong>Hora:</strong> <?= date("g:i a", strtotime($evento['hora_evento'])) ?></p>
                <p><strong>Lugar:</strong> <?= htmlspecialchars($evento['lugar_evento']) ?></p>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </section>

    </section>
  </main>
  <footer>
    <p>&copy; 2025 VolunTeam. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
