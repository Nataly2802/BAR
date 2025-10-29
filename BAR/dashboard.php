<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>BAR NATALY</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body class="fondo-dashboard">
<nav class="navbar navbar-dark bg-dark mb-4">
  <div class="container-fluid"> 
    <a class="navbar-brand">BAR NATALY - Panel</a>
    <a href="cerrar_sesion.php" class="btn btn-gold mb-3">Cerrar sesión</a>
  </div>
</nav>
<div class="text-center mt-3 mb-4">
    <img alt="Icono de una copa de vino" src="IMG/wine.png" style="width: 150px; height: 180px;">
</div>
<div class="container">
  <div class="row text-center">
    <div class="col-md-6 mb-3">
      <div class="card shadow p-3">
        <h4>Tipos de Productos</h4>
        <p>Gestiona las categorías del bar</p>
        <a href="Tipo_productos/index.php" class="btn btn-bar mb-3">Ir al módulo</a>
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="card shadow p-3">
        <h4>Productos</h4>
        <p>Gestiona las bebidas y licores</p>
        <a href="Productos/index.php" class="btn btn-bar mb-3">Ir al módulo</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>
