<?php require_once 'scripts/procesar_login.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>VolunTeam - Iniciar sesión</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header>
    <h1><i class="fas fa-hands-helping"></i> VolunTeam</h1>
  </header>

  <main>
    <section class="seccion login-card">
      <h2>Iniciar sesión</h2>

      <?php if ($error): ?>
        <div class="error"><p><?= htmlspecialchars($error) ?></p></div>
      <?php endif; ?>

      <form action="login.php" method="post" class="form-login">
        <label for="correo">Correo</label>
        <input type="email" name="correo" id="correo" required>

        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>

        <button type="submit" class="btn">Entrar</button>
      </form>

      <p>¿No tienes cuenta? <a href="register.php">Regístrate</a></p>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 VolunTeam. Todos los derechos reservados.</p>
  </footer>
</body>
</html>