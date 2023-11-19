<?php include('../templates/header.html'); ?>
<head>
  <title>Consulta de visualizaciones de un usuario</title>
  <link rel="stylesheet" href="style.css">
</head>
<body align="center">

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $usuario = $_POST["usuario"];
  $query = "SELECT series.titulo_serie, capitulos.titulo
  FROM capitulos
  JOIN visualizaciones_series ON visualizaciones_series.capitulo_id = capitulos.capitulo_id
  JOIN usuarios_usernames ON usuarios_usernames.id = visualizaciones_series.usuario_id
  JOIN series ON series.serie_id = capitulos.serie_id
  WHERE usuarios_usernames.username = '$usuario' 
  AND visualizaciones_series.fecha > '2021-01-01';";
  $result = $db->prepare($query);
  $result->execute();
  $dataCollected = $result->fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table align="center" class="styled-table"> <!-- Agrega la clase styled-table para aplicar el estilo CSS -->
    <thead>
      <tr>
        <th>TITULO_SERIE</th>
        <th>TITULO_CAPITULO</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($dataCollected as $p) {
        echo "<tr><td>{$p[0]}</td><td>{$p[1]}</td></tr>";
      }
      ?>
    </tbody>
  </table>

<?php include('../templates/footer.html'); ?>
