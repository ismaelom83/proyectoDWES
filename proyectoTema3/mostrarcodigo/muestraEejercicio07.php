

<!-- autor: Ismael Heras-->


<!-- ejercicio7
 Mostrar el nombre del fichero que se está ejecutando.-->

<!doctype html>
<html lang="esz">
    <head>
        <meta charset="UTF-8">
        <title>ejercicio7</title>
        <style>
            h1, h2{
                text-align: center;
                background: burlywood;
                color: black;
                font-size: 40px;
            }
            .volver{
                font-size: 40px;
                text-align: center;
                display: block;
            }
        </style>
    </head>
    <body>
        <a class="volver" href="../../index.php">Volver</a>
        <?php
       // muestra el codigo de la ruta especificada.
        highlight_file("../codigoPHP/ejercicio07.php")
        ?>
    </body>
</html>

