<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    if ($usuario === "admin" && $clave === "1234") {
        $_SESSION['usuario'] = $usuario;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login BAR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body class="fondo-login d-flex align-items-center justify-content-center vh-100">
<div class="card p-4 shadow-lg" style="width: 22rem;">
  <h3 class="text-center mb-3">Login BAR</h3>
  <form method="POST">
    <div class="mb-3">
      <label for="usuario" class="form-label">Usuario</label>
      <input id="usuario" type="text" class="form-control" name="usuario" required>
    </div>
    <div class="mb-3">
      <label for='contraseña' class="form-label">Contraseña</label>
      <input id='contraseña' type="password" class="form-control" name="clave" required>
    </div>
    <button type="submit" class="btn btn-bar w-100">Ingresar</button>
  </form>

  <?php if (isset($error)): ?>
    <div class="alert alert-danger mt-3"><?= $error ?></div>
  <?php endif; ?>
</div>

</body>
</html>
