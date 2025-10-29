<?php
use App\Conexion;

$conexionObj = new Conexion();
$conexion = $conexionObj->conexion;

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit;
}

$id = $_GET["id"];

$stmt = $conexion->prepare("SELECT * FROM tipos_productos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$tipo = $result->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];

    $stmt = $conexion->prepare("UPDATE tipos_productos SET nombre = ? WHERE id = ?");
    $stmt->bind_param("si", $nombre, $id);
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
<title>Editar Tipo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/estilos.css">
</head>
<body class="fondo-crear">
<div class="container mt-5">
<h3>Editar Tipo de Producto</h3>
<form method="POST">
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input id="nombre" type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($tipo['nombre']) ?>" required>
  </div>
  <button class="btn btn-bar">Actualizar</button>
  <a href="index.php" class="btn btn-gold">Volver</a>
</form>
</div>
</body>
</html>
