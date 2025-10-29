<?php
use App\Conexion;

$conexionObj = new Conexion();
$conexion = $conexionObj->conexion;

$result = $conexion->query("SELECT * FROM tipos_productos");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Tipos de Productos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/estilos.css">
</head>
<body class="fondo-tipos">
<div class="container mt-4">
<h2>Tipos de Productos</h2>
<a href="crear.php" class="btn btn-bar mb-3">Nuevo Tipo</a>
<a href="../dashboard.php" class="btn btn-gold mb-3">Volver</a>
<table class="table table-bordered table-striped">
<tr>
  <th>ID</th>
  <th>Nombre</th>
  <th>Acciones</th>
</tr>
<?php while($fila = $result->fetch_assoc()){ ?>
<tr>
  <td><?= $fila['id'] ?></td>
  <td><?= $fila['nombre'] ?></td>
  <td>
    <a href="editar.php?id=<?= $fila['id'] ?>" class="btn btn-gold mb-3">Editar</a>
    <a href="eliminar.php?id=<?= $fila['id'] ?>" class="btn btn-bar mb-3" onclick="return confirm('¿Desea Eliminar este Tipo de Producto?')">Eliminar</a>
  </td>
</tr>
<?php } ?>
</table>
</div>
</body>
</html>
