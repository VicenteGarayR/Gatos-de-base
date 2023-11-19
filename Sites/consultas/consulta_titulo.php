<?php include('../templates/header.html');   ?>
<head>
  <title>Consulta de proveedores de cierta película o serie</title>
  <link rel="stylesheet" href="style.css">
</head>
<body align="center">
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
	$titulo = $_POST["titulo"];
	$titulo = strtoupper($titulo);
 	$query = "SELECT peliculas.titulo_peli, proveedor_costos.proveedor 
	FROM peliculas 
	JOIN proveedor_pelis ON peliculas.peli_id = proveedor_pelis.peli_id 
	JOIN proveedor_costos ON proveedor_costos.id = proveedor_pelis.id 
	WHERE peliculas.titulo_peli LIKE '%$titulo%' 
	UNION ALL SELECT series.titulo_serie, proveedor_costos.proveedor 
	FROM series 
	JOIN proveedor_series ON series.serie_id = proveedor_series.serie_id 
	JOIN proveedor_costos ON proveedor_series.id = proveedor_costos.id 
	WHERE series.titulo_serie LIKE '%$titulo%';";
	$result = $db -> prepare($query);
	$result -> execute();
	$pelis = $result -> fetchAll();
  ?>
  
  <table align="center" class="styled-table"> <!-- Agrega la clase styled-table para aplicar el estilo CSS -->
    <thead>
     <tr>
      <th>TITULO_PELICULA/SERIE</th>
      <th>PROVEEDOR</th> 	
     </tr>
    </thead>
	<tbody>
     <?php
	 foreach ($pelis as $peli) {
  	 	echo "<tr> <td>$peli[0]</td> <td>$peli[1]</td> </tr>";
	 }
	 ?>
    </tbody>
  </table>

<?php include('../templates/footer.html'); ?>
