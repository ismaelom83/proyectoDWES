
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
        <a class="volver" href="../index.php">Volver</a>
        <?php
        echo '<h1>'. "Path donde se encuentra el fichero que se está ejecutando" .'</h1>';
         echo '<h2>'.getcwd().'<h2>'; //muestar el path donde se encuentra el fichero
        ?>
    </body>
</html>

