<?php
use App\Conexion;

$conexionObj = new Conexion();
$conexion = $conexionObj->conexion;

if (isset($_GET['id'])) {
    $codigo = $_GET['id'];

    $stmt = $conexion->prepare("DELETE FROM productos WHERE codigo_producto = ?");
    $stmt->bind_param("s", $codigo);
    $stmt->execute();
    $stmt->close();
}

header("Location: index.php");
exit;
?>
