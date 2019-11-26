


<!--autor: Ismael Heras-->


<!--ejercicio2
 Inicializar y mostrar una variable heredoc.-->


<!doctype html>
<html lang="esz">
    <head>
        <meta charset="UTF-8">
        <title>ejercicio2</title>
          <style>
            h1, h2{
                text-align: center;
                 background: burlywood;
                color: black;
                font-size: 40px;
            }
            .volver{
                font-size: 50px;
                text-align: center;
                display: block;
            }
        </style>
    </head>
    <body>
        <a class="volver" href="../index.php">Volver</a>
        <?php
        //iniciar variable
        $nombre = "Ismael Heras Salvador";

        //echo con heredoc para mostrar por pantalla.
        echo <<<heredoc
         <h1>Mi nombre es $nombre con heredoc 
             y estoy estudiando daw2 en la asignatura de DWES de heraclio y
                 esta es la forma de hacerlo</h1>               
heredoc;
        ?>
    </body>
</html>
