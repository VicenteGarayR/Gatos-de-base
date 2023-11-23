<!DOCTYPE html>
<html lang="en">

<head>
    <title> Entrega 3 </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="main">
        <h1 class="title">Login</h1>
        <div class="form">
            <h2 class="subtitle">Ingresa tus datos</h2>
            <form action="consultas/login.php" method="post">
                <div class="form-element">
                    <label for="user">User:</label>
                    <input type="text" id="user" name="user" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <input type="submit" value="Submit">
            </form>

        </div>
    </div>

    <footer>
        <p>© Benjamín Ruiz - Matías Pineda - Benjamín Thareau - Vicente Garay IIC2413 - Bases de Datos</p>
    </footer>
</body>
</html>
