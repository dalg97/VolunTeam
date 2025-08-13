<?php require_once 'scripts/procesar_registro.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>VolunTeam - Registro</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header>
    <h1><i class="fas fa-hands-helping"></i> VolunTeam</h1>
  </header>
  <main>
    <section class="seccion login-card">
      <h2>Crear cuenta</h2>
      <?php if (!empty($errors)): ?>
        <div class="error">
          <?php foreach ($errors as $e): ?><p><?= htmlspecialchars($e) ?></p><?php endforeach; ?>
        </div>
      <?php endif; ?>
      <form method="post" action="registro.php" class="form-registro">
        <label>Nombre</label>
        <input type="text" name="nombre" required>

        <label>Dirección</label>
        <input type="text" name="direccion">

        <label>Edad</label>
        <input type="number" name="edad" min="1">

        <label>Correo</label>
        <input type="email" name="correo" required>

        <label>Contraseña</label>
        <input type="password" name="password" required>

        <label>Intereses</label>
        <input type="text" name="intereses">

        <label>Experiencia</label>
        <textarea name="experiencia"></textarea>
        <button type="submit" class="btn">Registrar</button>
      </form>
      <p>¿Ya tienes cuenta? <a href="login.php">Iniciar sesión</a></p>
    </section>
  </main>
  <footer>
    <p>&copy; 2025 VolunTeam. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
