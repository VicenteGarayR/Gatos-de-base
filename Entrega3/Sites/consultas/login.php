<?php
session_start();
include('../templates/header.html');
require("../config/conexion.php");

$user = $_POST['user'];
$password = $_POST['password'];

try {
    $query = "SELECT username FROM usuarios INNER JOIN informacion_usuarios as info ON usuarios.id = info.id WHERE usuarios.username = '$user' AND info.password = '$password';";
    $result = $db -> query($query);
    // Ejecutamos la query
    $result = $db -> prepare($query);
    $result -> execute();
    $result = $result -> fetchAll();
    if (count($result) == 0) {
        echo "<br>Usuario o contraseña incorrectos<br>";
        echo "<br><a href='../index.php'>Volver a intentar</a><br>";
    } else {
        // En caso de que el usuario exista, se crea una sesión con su nombre y se le redirige a la página con las consultas
        echo "<br>Inicio de sesión exitoso<br>";
        $_SESSION['user'] = $user;
        header("Location: mi_perfil.php");
        
    }
} catch (PDOException $e) {
    echo 'Error de la base de datos: ' . $e->getMessage();
}
?>
