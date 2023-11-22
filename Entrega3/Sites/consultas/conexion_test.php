<?php
include('../templates/header.html');

// Conectar a la base de datos
require("../config/conexion.php");

// Utilizar sentencia preparada para evitar la inyección de SQL
$query = "\COPY test (nombre, apellido, edad) FROM 'scripts/datos_personas.csv' DELIMITER ',' CSV HEADER;";
$path = "../scripts/datos_personas.csv";
// Ejecutar la consulta
$result = $db->query($query);

// Puedes verificar el resultado de la ejecución si es necesario
if ($result) {
    echo "La consulta se ejecutó correctamente.";
} else {
    // Si ocurrió algún error
    $errorInfo = $db->errorInfo();
    echo "No se pudo insertar a la base de datos: " . $errorInfo[2];
}

echo "<br><br>El path es $path<br><br>";
include('../templates/footer.html');
?>
