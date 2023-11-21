<?php include('../templates/header.html');   ?>
<head>
  <title>Consulta de series por número de temporadas</title>
  <link rel="stylesheet" href="style.css">
</head>
<body align="center">
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $num_temporada = $_POST["n_temporadas"];

 	$query = "SELECT DISTINCT series.titulo_serie
   FROM capitulos
   JOIN series ON series.serie_id = capitulos.serie_id
   WHERE capitulos.temporada_numero >= $num_temporada;";
   
	$result = $db -> prepare($query);
	$result -> execute();
	$series = $result -> fetchAll();
  ?>

  <table align="center" class="styled-table"> <!-- Agrega la clase styled-table para aplicar el estilo CSS -->
    <thead>
      <tr>
       <th>TITULO_SERIE</th>
      </tr>
    </thead>
    <tbody>
      <?php
	    foreach ($series as $serie) {
  		  echo "<tr><td>$serie[0]</td><td>$serie[1]</td></tr>";
	    }
      ?>
    </tbody>
  </table>

<?php include('../templates/footer.html'); ?>
