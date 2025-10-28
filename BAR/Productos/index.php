<?php
include_once "../conexion.php";
$result = $conexion->query("
SELECT p.codigo_producto, p.nombre, p.precio, p.marca, p.presentacion, p.descripcion, t.nombre AS tipo
FROM productos p
LEFT JOIN tipos_productos t ON p.id_tipo = t.id
");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Productos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/estilos.css">
</head>
<body class="fondo-productos">
<div class="container mt-4">
<h2>Productos</h2>
<a href="crear.php" class="btn btn-bar mb-3">Nuevo Producto</a>
<a href="../dashboard.php" class="btn btn-gold mb-3">Volver</a>
<table class="table table-bordered table-striped">
<tr>
  <th>Codigo_Producto</th><th>Nombre</th><th>Precio</th><th>Marca</th><th>Presentacion</th><th>Descripcion</th><th>Tipo</th><th>Acciones</th>
</tr>
<?php while($fila = $result->fetch_assoc()){ ?>
<tr>
  <td><?= $fila['codigo_producto'] ?></td>
  <td><?= $fila['nombre'] ?></td>
  <td>$<?= $fila['precio'] ?></td>
  <td><?= $fila['marca'] ?? '' ?></td>
  <td><?= $fila['presentacion'] ?? '' ?></td>
  <td><?= $fila['descripcion'] ?? '' ?></td>
  <td><?= $fila['tipo'] ?></td>
  <td>
    <a href="editar.php?id=<?= $fila['codigo_producto'] ?>" class="btn btn-gold mb-3">Editar</a>
    <a href="eliminar.php?id=<?= $fila['codigo_producto'] ?>" class="btn btn-bar mb-3" onclick="return confirm('Desea Eliminar este Producto?')">Eliminar</a>
  </td>
</tr>
<?php } ?>

</table>
</div>
</body>
</html>
