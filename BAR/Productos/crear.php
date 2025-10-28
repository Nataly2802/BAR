<?php
include_once "../conexion.php";
$tipos = $conexion->query("SELECT * FROM tipos_productos");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo_producto'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $marca = $_POST['marca'];
    $presentacion = $_POST['presentacion'];
    $descripcion = $_POST['descripcion'];
    $id_tipo = $_POST['id_tipo'];

    $sql = "INSERT INTO productos (codigo_producto, nombre, precio, marca, presentacion, descripcion, id_tipo)
            VALUES ('$codigo', '$nombre', '$precio', '$marca', '$presentacion', '$descripcion', '$id_tipo')";
    $conexion->query($sql);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Nuevo Producto</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/estilos.css">
</head>
<body class="fondo-crear">
<div class="container mt-4">
<h2>Agregar Producto</h2>
<form method="POST" class="card p-4 shadow-sm">
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for='nombre' class="form-label">Nombre</label>
      <input id='nombre' type="text" name="nombre" class="form-control" required>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4 mb-3">
      <label for='precio' class="form-label">Precio</label>
      <input id='precio' type="number" step="0.01" name="precio" class="form-control" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for='marca' class="form-label">Marca</label>
      <input id='marca' type="text" name="marca" class="form-control">
    </div>
    <div class="col-md-4 mb-3">
      <label for='presentacion' class="form-label">Presentación</label>
      <input id='presentacion' type="text" name="presentacion" class="form-control">
    </div>
  </div>

  <div class="mb-3">
    <label class="form-label">Descripción</label>
    <textarea name="descripcion" class="form-control" rows="3"></textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">Tipo de Producto</label>
    <select name="id_tipo" class="form-select" required>
      <option value="">Seleccione un tipo</option>
      <?php while($t = $tipos->fetch_assoc()){ ?>
        <option value="<?= $t['id'] ?>"><?= $t['nombre'] ?></option>
      <?php } ?>
    </select>
  </div>

  <button type="submit" class="btn btn-bar">Guardar</button>
<a href="index.php" class="btn btn-gold">Cancelar</a>

</form>
</div>
</body>
</html>
