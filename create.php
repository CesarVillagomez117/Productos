<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="create.css">
</head>
<body>
    <h2>Agregar Producto</h2>

<form method="POST">
    Nombre: <input type="text" name="nombre" required><br><br>
    Precio: <input type="number" step="0.01" name="precio" required><br><br>
    Existencias: <input type="number" name="existencias" required><br><br>
    Fecha de caducidad: <input type="date" name="fecha_caducidad"><br><br>
    Descripción:<br>
    <textarea name="descripcion" required></textarea><br><br>

    <input type="submit" name="guardar" value="Guardar">
</form>

<a href="index.php">Volver</a>

<?php
include("conexion.php");

if (isset($_POST["guardar"])) {
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $existencias = $_POST["existencias"];
    $fecha = $_POST["fecha_caducidad"] ?: null;
    $descripcion = $_POST["descripcion"];

    $sql = "INSERT INTO productos 
    (nombre, precio, existencias, fecha_caducidad, descripcion)
    VALUES (?, ?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sdiss", $nombre, $precio, $existencias, $fecha, $descripcion);
    $stmt->execute();

    echo "<p>Producto guardado correctamente</p>";
}
?>

</body>
</html>