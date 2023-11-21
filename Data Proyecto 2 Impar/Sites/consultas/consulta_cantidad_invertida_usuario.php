<?php include('../templates/header.html');   ?>
<head>
  <title>Cantidad total invertida por todos los usuarios en películas no incluidas en planes de subscripción</title>
  <link rel="stylesheet" href="style.css">
</head>
<body align="center">

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $usuario = $_POST["usuario"];
  $query = "SELECT usuarios_usernames.username, 
   SUM(pagos_totales.plata) 
   FROM (SELECT visualizaciones_pelis.usuario_id, COUNT(*)*MAX(proveedor_pelis_extras.precio) AS plata  
   FROM visualizaciones_pelis 
   JOIN proveedor_pelis_extras ON proveedor_pelis_extras.peli_extra_id = visualizaciones_pelis.peli_id 
   JOIN pago_pelis ON pago_pelis.peli_id = visualizaciones_pelis.peli_id AND pago_pelis.pro_id = proveedor_pelis_extras.id  
   GROUP BY visualizaciones_pelis.usuario_id, visualizaciones_pelis.peli_id, pago_pelis.pro_id 
   ORDER BY visualizaciones_pelis.usuario_id, visualizaciones_pelis.peli_id) as pagos_totales 
   JOIN usuarios_usernames ON usuarios_usernames.id = usuario_id 
   GROUP BY usuarios_usernames.username;";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

<table align="center" class="styled-table"> <!-- Agrega la clase styled-table para aplicar el estilo CSS -->
    <thead>
    <tr>
      <th>USUARIO</th>
      <th>DINERO_INVERTIDO</th>
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
