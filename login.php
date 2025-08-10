<?php
// login.php
session_start();
require_once 'db.php';


if (isset($_SESSION['user_id'])) {
    header('Location: home.php');
    exit;
}

$error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = filter_var(trim($_POST['correo'] ?? ''), FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';

    if (!$correo || !$password) {
        $error = 'Correo o contraseña inválidos.';
    } else {
        $stmt = $pdo->prepare('SELECT id_usuario, nombre_usuario, correo, passwd FROM usuario WHERE correo = :correo LIMIT 1');
        $stmt->execute([':correo' => $correo]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['passwd'])) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id_usuario'];
            $_SESSION['user_name'] = $user['nombre_usuario'];
            $_SESSION['user_email'] = $user['correo'];
            header('Location: home.php');
            exit;
        } else {
            $error = 'Credenciales incorrectas.';
        }
    }
}
?>
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

      <?php if (!empty($_SESSION['success'])): ?>
        <div class="success"><p><?= htmlspecialchars($_SESSION['success']) ?></p></div>
        <?php unset($_SESSION['success']); ?>
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
