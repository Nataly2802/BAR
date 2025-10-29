<?php
use App\Conexion;

$conexionObj = new Conexion();
$conexion = $conexionObj->conexion;

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit;
}

$id = $_GET["id"];
$stmt = $conexion->prepare("DELETE FROM tipos_productos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header("Location: index.php");
exit;
?>
