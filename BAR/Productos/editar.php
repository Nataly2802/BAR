<?php

require_once "../conexion.php";
use App\Conexion;

$conexionObj = new Conexion();
$conexion = $conexionObj->conexion;

$codigo = $_GET['id'];
$stmt = $conexion->prepare("SELECT * FROM productos WHERE codigo_producto = ?");
$stmt->bind_param("s", $codigo);
$stmt->execute();
$result = $stmt->get_result();
$producto = $result->fetch_assoc();
$stmt->close();

$tipos = $conexion->query("SELECT * FROM tipos_productos");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo_nuevo = $_POST['codigo_producto'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $marca = $_POST['marca'];
    $presentacion = $_POST['presentacion'];
    $descripcion = $_POST['descripcion'];
    $id_tipo = $_POST['id_tipo'];

    $stmt = $conexion->prepare("
        UPDATE productos
        SET codigo_producto=?, nombre=?, precio=?, marca=?, presentacion=?, descripcion=?, id_tipo=?
        WHERE codigo_producto=?
    ");

    if ($stmt) {
        $stmt->bind_param("ssdsssii", $codigo_nuevo, $nombre, $precio, $marca, $presentacion, $descripcion, $id_tipo, $codigo);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Producto</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/estilos.css">
</head>
<body class="fondo-crear">
<div class="container mt-4">
<h2>Editar Producto</h2>
<form method="POST" class="card p-4 shadow-sm">
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for='nombre' class="form-label">Nombre</label>
      <input id='nombre' type="text" name="nombre" class="form-control" value="<?= $producto['nombre'] ?>" required>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4 mb-3">
      <label for='precio' class="form-label">Precio</label>
      <input id='precio' type="number" step="0.01" name="precio" class="form-control" value="<?= $producto['precio'] ?>" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for='marca' class="form-label">Marca</label>
      <input id='marca' type="text" name="marca" class="form-control" value="<?= $producto['marca'] ?>">
    </div>
    <div class="col-md-4 mb-3">
      <label for='presentacion' class="form-label">Presentación</label>
      <input id='presentacion' type="text" name="presentacion" class="form-control" value="<?= $producto['presentacion'] ?>">
    </div>
  </div>

  <div class="mb-3">
    <label for='descripcion' class="form-label">Descripción</label>
    <textarea id='descripcion' name="descripcion" class="form-control" rows="3"><?= $producto['descripcion'] ?></textarea>
  </div>

  <div class="mb-3">
    <label for='tipo_de_producto' class="form-label">Tipo de Producto</label>
    <select id='tipo_de_producto' name="id_tipo" class="form-select" required>
      <?php while($t = $tipos->fetch_assoc()){ ?>
        <option value="<?= $t['id'] ?>" <?= ($t['id'] == $producto['id_tipo']) ? 'selected' : '' ?>>
          <?= $t['nombre'] ?>
        </option>
      <?php } ?>
    </select>
  </div>

  <button class="btn btn-bar">Actualizar</button>
  <a href="index.php" class="btn btn-gold">Volver</a>
</form>
</div>
</body>
</html>
