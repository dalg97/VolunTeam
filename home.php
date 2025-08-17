<?php require_once "scripts/procesar_home.php"; ?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>VolunTeam - Inicio</title>
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
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
  
  <div id="mensaje-registro" class="mensaje-registro"></div>

  <main>
    <section class="bienvenida">
      <h2><i class="fas fa-hand-holding-heart"></i> Bienvenido a VolunTeam</h2>
      <p>Conectamos tu deseo de ayudar con oportunidades reales cerca de ti.</p>
      <a href="voluntariado.php" class="btn">Unirse a eventos</a>
    </section>
	<div id="modal-detalle" class="modal">
      <div class="modal-contenido">
        <button id="cerrar-modal">&times;</button>
        <div id="contenido-detalle"></div>
      </div>
    </div>

    <section class="seccion">
      <h2><i class="fas fa-star"></i> Eventos Destacados</h2>
      <div class="voluntariado-grid">
	  <?php while ($evento = $resultado->fetch_assoc()): ?>
          <div class="card-voluntariado">
            <img src="<?= htmlspecialchars($evento['imagen_evento']) ?>" alt="<?= htmlspecialchars($evento['nombre_evento']) ?>" loading="lazy" />
            <div class="info">
              <h3><?= htmlspecialchars($evento['nombre_evento']) ?></h3>
              <p><?= htmlspecialchars($evento['descripcion_evento']) ?></p>
              <div class="details">
                <p><strong>Fecha:</strong> <?= date("d/m/Y", strtotime($evento['fecha_evento'])) ?></p>
                <p><strong>Hora:</strong> <?= date("g:i a", strtotime($evento['hora_evento'])) ?></p>
                <p><strong>Lugar:</strong> <?= htmlspecialchars($evento['lugar_evento']) ?></p>
                <p class="cupos"><strong>Cupos disponibles:</strong> <?= intval($evento['cupos']) ?></p>
                <a href="#" class="btn btn-registrar" data-evento="<?= intval($evento['id_evento']) ?>">Registrarse</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>

      </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 VolunTeam. Todos los derechos reservados.</p>
  </footer>

	<script src="scripts/home.js"></script>
</body>
</html>
