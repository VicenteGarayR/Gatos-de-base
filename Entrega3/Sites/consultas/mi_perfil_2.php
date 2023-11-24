<!DOCTYPE html>
<?php
include('../templates/header.html');
require("../config/conexion.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <link rel="stylesheet" href="query_style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
        }

        section {
            margin: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        td,
        th {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        td:first-child {
            font-weight: bold;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <header style="margin-left: 300px; margin-right: 300px;border-top-left-radius: 10px;border-top-right-radius: 10px;">
        <h1>Mi Perfil</h1>
    </header>

    <section class="div_data_user"
        style="margin-left: 300px; margin-right: 300px; border-top-right-radius: 0;border-top-left-radius: 0;">
        <section>
            <h2>Datos Personales</h2>
            <table>
                <tr>
                    <td>Nombre:</td>
                    <td>a</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>a</td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td>a</td>
                </tr>
                <tr>
                    <td>Edad:</td>
                    <td>a</td>
                </tr>
            </table>
        </section>

        <section>
            <h2>Estadísticas</h2>
            <table>
                <tr>
                    <td>Suscripciones a juegos activas:</td>
                </tr>
                <tr>
                    <td>Suscripciones a servicios de streaming activas:</td>
                </tr>
                <tr>
                    <td>Horas usadas viendo contenido:</td>
                </tr>
                <tr>
                    <td>Horas usadas jugando:</td>
                </tr>
                <tr>
                    <td>Consulta:</td>
                </tr>
            </table>
        </section>
    </section>

    <footer>
        © Benjamín Ruiz - Matías Pineda - Benjamín Thareau - Vicente Garay <br> IIC2413 - Bases de Datos
    </footer>
</body>

</html>