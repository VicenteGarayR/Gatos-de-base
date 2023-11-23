<!DOCTYPE html>
<html>

<head>
    <title> Entrega 3 </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <h2>Query 1:</h2>
        <form action="consultas/conexion_test.php" method="post">
        <input type="submit" value="Buscar">
        </form>

        <br>

        <h2>Query 2:</h2>
        <form action="consultas/consulta_temporadas.php" method="post">
            Cantidad de temporadas:
            <input type="number" name="n_temporadas" min="0" pattern="[0-9]+" title="Por favor, ingrese solo números enteros" required>
            <input type="submit" value="Buscar">
        </form>

        <br>

        <h2>Query 3:</h2>
        <form action="consultas/consulta_titulo.php" method="post">
            Titulo:
            <input type="str" name="titulo" required>
            <input type="submit" value="Buscar">
        </form>

        <br>

        <h2>Query 4:</h2>
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

        <h2>Query 5:</h2>
        <form action="consultas/consulta_acceso_usuario.php" method="post">
            Usuario:
            <input type="text" name="usuario" required>
            <input type="submit" value="Buscar">
        </form>
        <br>
        <br>
    </div>
</body>

</html>