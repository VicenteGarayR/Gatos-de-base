<?php
include('../templates/header.html');

// Conectar a la base de datos
require("../config/conexion.php");

$command = "python3 Data Proyecto 2 Impar/scripts/clean.py";

// Ejecutar el comando y obtener la salida
$data = exec($command, $outputArray, $returnValue);

// Dividir la cadena en partes usando la coma como delimitador
$dataRows = explode("\n", $data);

// Imprimir la tabla
echo '<table align="center" class="styled-table">';
echo '<thead><tr><th>Nombre</th><th>Apellido</th><th>Edad</th></tr></thead>';
foreach ($dataRows as $row) {
    // Dividir cada fila en partes usando la coma como delimitador
    $rowData = explode(",", $row);
    $nombre = trim($rowData[0]);
    $apellidos = trim($rowData[1]);
    $edad = trim($rowData[2]);

    // Imprimir cada fila de la tabla
    echo "<tr><td>$nombre</td><td>$apellidos</td><td>$edad</td></tr>";
}
echo '</table>';

$usuario = $_POST["usuario"];

// Resto del código...

include('../templates/footer.html');
?>
