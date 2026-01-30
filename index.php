<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h2>Lista de Productos</h2>
<a href="create.php">Agregar Producto</a><br><br>

<table border="1">
    <tr>
        <th>Clave</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Existencias</th>
        <th>Caducidad</th>
        <th>Descripción</th>
        <th>Acciones</th>
    </tr>

<?php
include("conexion.php");

$resultado = $conexion->query("SELECT * FROM lista");

while ($fila = $resultado->fetch_assoc()) {
?>
<tr>
    <td><?php echo $fila["clave"]; ?></td>
    <td><?php echo $fila["nombre"]; ?></td>
    <td>$<?php echo $fila["precio"]; ?></td>
    <td><?php echo $fila["existencias"]; ?></td>
    <td><?php echo $fila["fecha_caducidad"]; ?></td>
    <td><?php echo $fila["descripcion"]; ?></td>
    <td>
        <a href="update.php?clave=<?php echo $fila["clave"]; ?>">Editar</a>
        |
        <a href="delete.php?clave=<?php echo $fila["clave"]; ?>"
           onclick="return confirm('¿Eliminar producto?')">
           Eliminar
        </a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>