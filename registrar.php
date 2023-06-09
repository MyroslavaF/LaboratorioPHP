<?php

require "usuario.php";

registrar();

function registrar(){


    if (
        isset($_POST["registrarUsuario"]) ){
 
        $usuario = new Usuario(
            $_POST["username"],
            $_POST["primerApellido"],
            $_POST["segundoApellido"],
            $_POST["email"],
            $_POST["login"],
            $_POST["password"]
        );


        $conexion = new mysqli('localhost', 'root', '', 'laboratorio', 3306);
        
        if ($conexion->connect_error) {
            die("Error en la conexión: " . $conexion->connect_error);
        }

        $consulta = "SELECT COUNT(*) FROM user WHERE email = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('s', $usuario->email);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count > 0) {
            echo "El correo electrónico ya está registrado en la base de datos.";
               
            
        } else {

        $consulta = "INSERT INTO user (name, first_surname, second_surname, email, login, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($consulta);

        $stmt->bind_param(
            'ssssss',
            $usuario->username,
            $usuario->primerApellido,
            $usuario->segundoApellido,
            $usuario->email,
            $usuario->login,
            $usuario->password
        );

        if ($stmt->execute()) {
            echo "Registro completado con éxito";
            echo '<form action="consulta.php" method="POST">
        <input type="submit" value="Consulta">
      </form>';
        } else {
            echo "Error al registrar el usuario: " . $stmt->error;
        }
        $stmt->close();
    }
        $conexion->close();
    
}
}


?>
