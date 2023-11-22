<?php

include('../templates/header.html');
require("../config/conexion.php");

echo '<body> <h1> Result Login </h1> <br>';

$user = $_POST['user'];
$password = $_POST['password'];

echo "1User: $user <br>";
echo "1Password: $password <br>";

$query = "SELECT verificar ('$user', '$password') AS var;";
$result = $db -> prepare($query);
$result -> execute();

echo "2User: $user <br>";
echo "2Password: $password <br>";

$verificacion = $result->fetch(PDO::FETCH_ASSOC);


include('../templates/footer.html');

?>
