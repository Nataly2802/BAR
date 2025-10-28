<?php
include_once("../conexion.php");
$id = $_GET["id"];
$conexion->query("DELETE FROM tipos_productos WHERE id=$id");
header("Location: index.php");
?>
