<?php
use App\Conexion;

$conexionObj = new Conexion();
$conexion = $conexionObj->conexion;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];

    $stmt = $conexion->prepare("INSERT INTO tipos_productos (nombre) VALUES (?)");
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Nuevo Tipo de Producto</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/estilos.css">
</head>
<body class="fondo-crear">
<div class="container mt-5">
<h3>Nuevo Tipo de Producto</h3>
<form method="POST">
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre:</label>
    <input id="nombre" type="text" name="nombre" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-bar">Guardar</button>
  <a href="index.php" class="btn btn-gold">Volver</a>
</form>
</div>
</body>
</html>
