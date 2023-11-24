<?php
// Incluir el archivo de conexión
require("../config/conexion.php");

// Ejecutar el script SQL que crea las tablas
$crear_tablas_sql = file_get_contents("../store/crear_tablas.sql");

try {
    $db->exec($crear_tablas_sql);
    echo "Tablas creadas correctamente.\n";
} catch (PDOException $e) {
    die("Error al crear las tablas: " . $e->getMessage());
}

// Directorio donde se encuentran los archivos CSV
$dir = "/home/grupo1/Entrega3/CSV/DataImpares/DataSeparada";

// Obtener todos los archivos CSV en el directorio
$files = glob($dir . "/*.csv");

// Procesar cada archivo CSV
foreach ($files as $file) {
    // Obtener el nombre de la tabla de los nombres de los archivos
    $table = basename($file, ".csv"); // Esto asume que el nombre de la tabla es el mismo que el nombre del archivo sin la extensión .csv

    // Abrir el archivo CSV
    if (($handle = fopen($file, "r")) !== FALSE) {
        // Leer la primera fila del archivo CSV (encabezados)
        $columns = fgetcsv($handle, 1000, ",");

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            // Crear la consulta SQL
            $data = array_map(function($value) { 
                $search = array("√©", "√≥", "√≠", "√°");
                $replace = array("é", "ó", "í", "á");
                $value = str_replace($search, $replace, $value);
                return str_replace("'", "''", $value); 
            }, $data);
            $values = "'" . implode("', '", $data) . "'";
            $sql = "INSERT INTO $table (".implode(", ", $columns).") VALUES ($values)";

            // Ejecutar la consulta
            try {
                $db->exec($sql);
                echo "Datos insertados correctamente en la tabla $table\n";
            } catch(PDOException $e) {
                echo "Error al insertar datos en la tabla $table: " . $e->getMessage() . "\n";
            }
        }
        fclose($handle); // Cerrar el archivo CSV
    }
}

// Cerrar conexión
$db = null;
?>
