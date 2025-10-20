<?php
include("../conexion.php");
$id = $_GET["id"];
$tipo = $conexion->query("SELECT * FROM tipos_productos WHERE id=$id")->fetch_assoc();

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $nombre = $_POST["nombre"];
  $conexion->query("UPDATE tipos_productos SET nombre='$nombre' WHERE id=$id");
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Tipo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/estilos.css">
</head>
<body class="fondo-crear">
<div class="container mt-5">
<h3>Editar Tipo de Producto</h3>
<form method="POST">
  <div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control" value="<?= $tipo['nombre'] ?>" required>
  </div>
  <button class="btn btn-bar">Actualizar</button>
<a href="index.php" class="btn btn-gold">Volver</a>
</form>
</div>
</body>
</html>
