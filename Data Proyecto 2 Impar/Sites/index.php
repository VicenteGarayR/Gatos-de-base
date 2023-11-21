<!DOCTYPE html>
<html>

<head>
    <title> Entrega 3 </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class='encabezado'>
        <table align="center">
            <tr>
                <td width="25%">
                    <img src="logo.png" alt="Logo UC" width='50%' height="auto" style="background-color: white; border-radius: 30px; padding:0;">
                </td>
                <td width="50%">
                    <h1>Grupo 1</h1>
                    <h2>Benjamín Ruiz - Matías Pineda</h2>
                    <h2>IIC2413 - Bases de Datos</h2>
                    <p>Aquí podrás encontrar toda la información de películas y series.</p>
                </td>
                <td width="25%">
                    <img src="oruga.jpg" alt="Oruga Mamalona" width='30%' height="auto" style="border-radius: 20px;">
                </td>
            </tr>
        </table>
    </div>
    <div>
        <h2>Ver todas las películas gratuitas junto con sus proveedores:</h2>
        <form action="consultas/consulta_gratuitas.php" method="post">
        <input type="submit" value="Buscar">
        </form>

        <br>

        <h2>Ver series que tengan como mínimo cierta cantidad de temporadas:</h2>
        <form action="consultas/consulta_temporadas.php" method="post">
            Cantidad de temporadas:
            <input type="number" name="n_temporadas" min="0" pattern="[0-9]+" title="Por favor, ingrese solo números enteros" required>
            <input type="submit" value="Buscar">
        </form>

        <br>

        <h2>Ver todas las películas o series, junto con su proveedor, que contengan cierto título:</h2>
        <form action="consultas/consulta_titulo.php" method="post">
            Titulo:
            <input type="str" name="titulo" required>
            <input type="submit" value="Buscar">
        </form>

        <br>

        <h2>Ver todas las películas que pertenezcan a cierto género o subgénero:</h2>
        <form action="consultas/consulta_genero.php" method="post">
            Seleccinar un género:
            <select name="genero">
                <option value="Thriller">Thriller</option>
                <option value="Cyberpunk">Cyberpunk</option>
                <option value="Fantasía">Fantasía</option>
                <option value="Música">Música</option>
                <option value="Familiar">Familiar</option>
                <option value="Romance">Romance</option>
                <option value="Fantasía oscura">Fantasía oscura</option>
                <option value="Acción">Acción</option>
                <option value="Guerra">Guerra</option>
                <option value="Comedia">Comedia</option>
                <option value="Thriller sicológico">Thriller sicológico</option>
                <option value="Biopunk">Biopunk</option>
                <option value="Ciencia ficción">Ciencia ficción</option>
                <option value="Ciencia ficción apocalíptica">Ciencia ficción apocalíptica</option>
                <option value="Romance Planetario">Romance Planetario</option>
                <option value="Biografía">Biografía</option>
                <option value="Slasher">Slasher</option>
                <option value="Aventura">Aventura</option>
                <option value="Histórico">Histórico</option>
                <option value="Crimen">Crimen</option>
                <option value="Drama">Drama</option>
                <option value="Deporte">Deporte</option>
                <option value="Horror">Horror</option>
                <option value="Animación">Animación</option>
                <option value="Misterio">Misterio</option>
            </select>
            <input type="submit" value="Buscar">
        </form>

        <br>

        <h2>Ver todas las películas a las cuales tiene acceso cierto usuario:</h2>
        <form action="consultas/consulta_acceso_usuario.php" method="post">
            Usuario:
            <input type="text" name="usuario" required>
            <input type="submit" value="Buscar">
        </form>

        <br>

        <h2>Ver todos los capítulos que cierto usuario a visualizado en el último año: </h2>
        <form action="consultas/consulta_visualizacion_usuario.php" method="post">
            Usuario:
            <input type="text" name="usuario" required>
            <input type="submit" value="Buscar">
        </form>

        <br>

        <h2>Ver la cantidad total invertida por todos los usuarios en películas no incluidas en planes de subscripción:</h2>
        <form action="consultas/consulta_cantidad_invertida_usuario.php" method="post">
            <input type="submit" value="Buscar">
        </form>

        <br>

        <h2>Test Poblar Tablas:</h2>
        <form action="consultas/conexion_test.php" method="post">
            <input type="submit" value="Poblar">

        <br>
        <br>
    </div>
</body>

</html>