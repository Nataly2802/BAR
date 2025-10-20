<?php
include("../conexion.php");
$codigo = $_GET['id'];
$conexion->query("DELETE FROM productos WHERE codigo_producto = '$codigo'");
header("Location: index.php");
?>
