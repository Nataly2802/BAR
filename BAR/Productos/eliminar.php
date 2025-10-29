<?php
namespace BAR\Productos;

use App\Conexion;

$conexionObj = new Conexion();
$conexion = $conexionObj->conexion;

if (!empty($_GET['id'])) {
    $codigo = $_GET['id'];
    $stmt = $conexion->prepare("DELETE FROM productos WHERE codigo_producto = ?");
    $stmt->bind_param("s", $codigo);
    $stmt->execute();
    $stmt->close();
}

header("Location: index.php");
exit;
?>
