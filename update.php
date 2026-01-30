<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="update.css">
</head>
<body>
    <?php
include("conexion.php");

$clave = $_GET["clave"];

$resultado = $conexion->query(
    "SELECT * FROM productos WHERE clave = $clave"
);

$producto = $resultado->fetch_assoc();
?>

<h2>Editar Producto</h2>

<form method="POST">
    Nombre:
    <input type="text" name="nombre"
           value="<?php echo $producto["nombre"]; ?>" required><br><br>

    Precio:
    <input type="number" step="0.01" name="precio"
           value="<?php echo $producto["precio"]; ?>" required><br><br>

    Existencias:
    <input type="number" name="existencias"
           value="<?php echo $producto["existencias"]; ?>" required><br><br>

    Fecha de caducidad:
    <input type="date" name="fecha_caducidad"
           value="<?php echo $producto["fecha_caducidad"]; ?>"><br><br>

    Descripción:<br>
    <textarea name="descripcion" required><?php
        echo $producto["descripcion"];
    ?></textarea><br><br>

    <input type="submit" name="actualizar" value="Actualizar">
</form>

<a href="index.php">Volver</a>

<?php
if (isset($_POST["actualizar"])) {
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $existencias = $_POST["existencias"];
    $fecha = $_POST["fecha_caducidad"] ?: null;
    $descripcion = $_POST["descripcion"];

    $sql = "UPDATE productos SET
        nombre = '$nombre',
        precio = $precio,
        existencias = $existencias,
        fecha_caducidad = " . ($fecha ? "'$fecha'" : "NULL") . ",
        descripcion = '$descripcion'
        WHERE clave = $clave";

    $conexion->query($sql);

    echo "<p>Producto actualizado correctamente</p>";
}
?>

</body>
</html>