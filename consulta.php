<?php

$conexion = new mysqli('localhost', 'root', '', 'laboratorio', 3306);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

$consulta = "SELECT * FROM user";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
    
} else {
    echo "No se encontraron usuarios";
}


$conexion->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <title>Laboratorio Formulario</title>
</head>

<body>


    <table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Primer Apellido</th>
        <th>Segundo Apellido</th>
        <th>Email</th>
        <th>Login</th>
    </tr>
    <?php while ($fila = $resultado->fetch_assoc()) : ?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['name']; ?></td>
            <td><?php echo $fila['first_surname']; ?></td>
            <td><?php echo $fila['second_surname']; ?></td>
            <td><?php echo $fila['email']; ?></td>
            <td><?php echo $fila['login']; ?></td>
        </tr>
    <?php endwhile; ?>
</table>
        

   
</body>

</html>

