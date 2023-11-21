<?php include('../templates/header.html');   ?>
<head>
  <title>Películas que tiene acceso cierto usuario</title>
  <link rel="stylesheet" href="style.css">
</head>
<body align="center">

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $usuario = $_POST["usuario"];
  $query = "SELECT DISTINCT visualizaciones_pelis.peli_id, peliculas.titulo_peli 
   FROM usuarios_usernames 
   JOIN visualizaciones_pelis ON usuarios_usernames.id = visualizaciones_pelis.usuario_id 
   JOIN pago_subs ON pago_subs.usuario_id = usuarios_usernames.id 
   JOIN subs_activas ON subs_activas.id = pago_subs.sub_id 
   JOIN peliculas ON peliculas.peli_id = visualizaciones_pelis.peli_id
   WHERE usuarios_usernames.username = '$usuario';";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

<table align="center" class="styled-table"> <!-- Agrega la clase styled-table para aplicar el estilo CSS -->
    <thead>
      <tr>
        <th>PELI_ID</th>
        <th>TITULO_PELICULA</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($dataCollected as $p) {
        echo "<tr> <td>$p[0]</td> <td>$p[1]</td></tr>";
      }
      ?>
    </tbody>
  </table>

<?php include('../templates/footer.html'); ?>
