<?php
include('../templates/header.html');

$nombre = "Ejemplo";
$apellido = "Ejemplo";
$edad = 25;

$usuario = $_POST["usuario"];

// Conectar a la base de datos
require("../config/conexion.php");

// Ejemplo de inserción de datos en la tabla "x"
$query_insert = "INSERT INTO test (nombre, apellido, edad) VALUES ('$nombre', '$apellido', $edad)";
$result_insert = $db->prepare($query_insert);

if ($result_insert->execute()) {
    echo "<p>Datos insertados correctamente en la tabla test.</p>";
} else {
    echo "<p>Error al insertar datos: " . $db->errorInfo()[2] . "</p>";
}

// Mostrar los resultados en una tabla
echo '<table align="center" class="styled-table">';
echo '<thead><tr><th>Resultado de la consulta SELECT</th></tr></thead>';
foreach ($dataCollected as $row) {
    echo '<tr><td>' . $row['peli_id'] . ' - ' . $row['titulo_peli'] . '</td></tr>';
}
echo '</table>';

include('../templates/footer.html');
?>
