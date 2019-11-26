

<!-- autor: Ismael Heras-->


<!-- ejercicio8
 Mostrar la dirección IP del equipo desde el que estás accediendo.-->

<!doctype html>
<html lang="esz">
    <head>
        <meta charset="UTF-8">
        <title>ejercicio8</title>
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
        <a class="volver" href="../index.php">Volver</a>
        <?php
        echo '<h1>'. "Dirección IP del equipo desde el que estás accediendo" .'</h1>';
         echo '<h2>' . $_SERVER['REMOTE_ADDR'] .'</h2>'
        ?>
    </body>
</html>

