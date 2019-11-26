
<!-- autor: Ismael Heras-->


<!-- ejercicio9
 Mostrar el path donde se encuentra el fichero que se está ejecutando.-->

<!doctype html>
<html lang="esz">
    <head>
        <meta charset="UTF-8">
        <title>ejercicio9</title>
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
        highlight_file("../codigoPHP/ejercicio09.php")
        ?>
    </body>
</html>

