
<!--
autor: Ismael Heras


Hola Mundo
 Hola mundo y phpinfo().
-->


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Lato|Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="estilos.css">
        <style>
            h1{
                text-align: center;
                background: burlywood;
                color: black;
                font-size: 36px;
            }
             .volver{
                font-size: 40px;
                text-align: center;
                display: block;
            }
        </style>
        <title>Hola Mundo</title>
    </head>
    <body>
<a class="volver" href="../../index.php">Volver</a>
        <?php
        // muestra el codigo de la ruta especificada.
        highlight_file("../codigoPHP/holaMundo.php")
        ?>

    </body>
</html>


