<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>VolunTeam - Sobre Nosotros</title>
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body>

  <header>
    <h1><i class="fas fa-hands-helping"></i> VolunTeam</h1>
    <nav>
      <a href="home.php"><i class="fas fa-home"></i> Inicio</a>
      <a href="voluntariado.php"><i class="fas fa-hand-holding-heart"></i> Voluntariado</a>
      <a href="impacto.php"><i class="fas fa-seedling"></i> Impacto</a>
      <a href="recursos.php"><i class="fas fa-folder-open"></i> Recursos</a>
      <a href="sobre-nosotros.php"><i class="fas fa-envelope"></i> Sobre Nosotros</a>
    </nav>

    <!-- Mostrar nombre de usuario y botón de salir -->
    <div style="position: absolute; top: 1.2rem; right: 1.5rem; color: white;">
      <?php if (isset($_SESSION['user_name'])): ?>
        <a href="perfil.php" style="color: inherit; text-decoration: none; margin-right: 0.5rem; display: inline-flex; align-items: center; gap: 0.3rem;">
          <i class="fa-solid fa-user"></i> <?= htmlspecialchars($_SESSION['user_name']) ?>
        </a>
        <a href="logout.php" class="btn" style="background:transparent; border:1px solid #fff; color:#fff; padding:0.2rem 0.5rem; border-radius:6px; text-decoration:none;">Salir</a>
      <?php else: ?>
        <a href="login.php" class="btn" style="background:transparent; border:1px solid #fff; color:#fff; padding:0.2rem 0.5rem; border-radius:6px; text-decoration:none;">Iniciar sesión</a>
      <?php endif; ?>
    </div>
  </header>

  <?php if (isset($_GET['status']) && $_GET['status'] === 'ok'): ?>
    <div style="background:#d4edda; color:#155724; padding:10px; margin:15px; border-radius:5px;">
        ¡Tu mensaje ha sido enviado correctamente!
    </div>
  <?php endif; ?>

  <main>
    <section class="seccion">
      <h2><i class="fas fa-users"></i> ¿Quiénes Somos?</h2>
      <p class="intro-text">
        Somos una plataforma que conecta personas solidarias con causas que realmente importan. VolunTeam nació para facilitar la participación ciudadana en actividades de alto impacto social,
        apoyando comunidades en Costa Rica junto con ONGs, escuelas, municipalidades y voluntarios independientes.
      </p>
    </section>

    <div class="info-grid">
      <div class="info-card">
        <h3><i class="fas fa-phone-alt"></i> Contacto</h3>
        <p><strong>Email:</strong> contacto@volunteam.org</p>
        <p><strong>Teléfono:</strong> +506 800-VOLUNTEAM</p>
        <ul>
          <li>Daniela Rojas – Dirección general</li>
          <li>Marco Jiménez – Logística</li>
          <li>Andrea Rivera – Comunicación</li>
        </ul>
      </div>

      <div class="info-card">
        <h3><i class="fas fa-hashtag"></i> Redes Sociales</h3>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook-square"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-linkedin"></i></a>
        </div>
        <p>Síguenos y entérate de nuestros próximos proyectos.</p>
      </div>
    </div>

    <section class="form-box">
      <h3><i class="fas fa-question-circle"></i> ¿Tienes dudas? Escríbenos</h3>
      <form action="scripts/procesar_contacto.php" method="POST">
        <label for="nombre">Nombre:</label><br />
        <input type="text" id="nombre" name="nombre" required /><br /><br />
        <label for="correo">Correo:</label><br />
        <input type="email" id="correo" name="correo" required /><br /><br />
        <label for="mensaje">Mensaje:</label><br />
        <textarea id="mensaje" name="mensaje" rows="5" required></textarea><br /><br />
        <button type="submit" class="btn">Enviar</button>
      </form>
    </section>

<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "volunt_user", "jdu2352h", "volunteam");

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$conexion->set_charset("utf8mb4");

// Consulta para obtener solo nombre y mensaje
$sql = "SELECT nombre_mensaje, mensaje FROM contacto ORDER BY id_mensaje DESC";
$resultado = $conexion->query($sql);
?>

<section class="comentarios-box">
  <h3><i class="fas fa-comments"></i> Comentarios Recibidos</h3>
  <table class="tabla-comentarios">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Mensaje</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $conexion = new mysqli("localhost", "volunt_user", "jdu2352h", "volunteam");
      if ($conexion->connect_error) {
          die("Error de conexión: " . $conexion->connect_error);
      }
      $conexion->set_charset("utf8mb4");
      $resultado = $conexion->query("SELECT nombre_mensaje, mensaje FROM contacto ORDER BY id_mensaje DESC");

      if ($resultado && $resultado->num_rows > 0) {
          while ($fila = $resultado->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . htmlspecialchars($fila['nombre_mensaje']) . "</td>";
              echo "<td>" . nl2br(htmlspecialchars($fila['mensaje'])) . "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='2'>No hay comentarios todavía.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</section>

<?php
$conexion->close();
?>

  </main>

  <footer>
    <p>&copy; 2025 VolunTeam. Todos los derechos reservados.</p>
  </footer>

</body>
</html>
