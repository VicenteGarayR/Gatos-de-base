<?php include('../templates/header.html');   ?>
<head>
  <title>Películas gratuitas</title>
  <link rel="stylesheet" href="style.css">
</head>
<body align="center">
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se construye la consulta como un string
 	$query = "SELECT peliculas.titulo_peli, proveedor_costos.proveedor 
  FROM proveedor_pelis 
  JOIN peliculas 
  ON proveedor_pelis.peli_id = peliculas.peli_id 
  JOIN proveedor_costos 
  ON proveedor_costos.id = proveedor_pelis.id 
  WHERE (peliculas.peli_id, proveedor_pelis.id) 
  NOT IN (SELECT peli_extra_id, id FROM proveedor_pelis_extras);";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$gratuitas = $result -> fetchAll();
  ?>

  <table align="center" class="styled-table"> <!-- Agrega la clase styled-table para aplicar el estilo CSS -->
    <thead>
      <tr>
       <th>TITULO_PELI</th>
       <th>PROVEEDOR</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($gratuitas as $gratis) {
          echo "<tr><td>$gratis[0]</td><td>$gratis[1]</td><td>$gratis[2]</td></tr>";
      }
      ?>
    </tbody>
  </table>

<?php include('../templates/footer.html'); ?>
