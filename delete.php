<?php
include("conexion.php");

$clave = $_GET["clave"];

$conexion->query("DELETE FROM productos WHERE clave = $clave");

header("Location: index.php");
?>
