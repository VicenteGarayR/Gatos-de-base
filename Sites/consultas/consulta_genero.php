<?php include('../templates/header.html');   ?>
<head>
  <title>Consulta de películas por género o subgénero</title>
  <link rel="stylesheet" href="style.css">
</head>
<body align="center">

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $genre = $_POST["genero"];
  $query_peli = "WITH sub_generos_peliculas AS (
    SELECT peliculas.titulo_peli, sub_generos.genero, COALESCE(sub_generos.subgenero, 'No Presenta') AS subgenero
    FROM peliculas
    LEFT JOIN sub_generos ON peliculas.genero = sub_generos.genero)

    SELECT DISTINCT peliculas.titulo_peli, peliculas.genero, sub_generos_peliculas.subgenero
    FROM peliculas
    JOIN sub_generos_peliculas ON peliculas.titulo_peli = sub_generos_peliculas.titulo_peli
    WHERE peliculas.genero = '$genre' OR sub_generos_peliculas.subgenero = '$genre';";
  $result = $db -> prepare($query_peli);
  $result -> execute();
  $pelis = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table align="center" class="styled-table"> <!-- Agrega la clase styled-table para aplicar el estilo CSS -->
    <thead>
      <tr>
       <th>TITULO_PELICULA</th>
        <th>GENERO</th>
        <th>SUBGENERO</th>
    </thead>
    <tbody>
      <?php
      foreach ($pelis as $peli) {
        echo "<tr><td>$peli[0]</td> <td>$peli[1]</td> <td>$peli[2]</td></tr>";
      }
      ?>
    </tbody>
  </table>

<?php include('../templates/footer.html'); ?>
