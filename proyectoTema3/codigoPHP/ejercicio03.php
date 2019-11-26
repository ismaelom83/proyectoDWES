
<!--autor: Ismael Heras-->


<!-- ejercicio3
 Mostrar en tu página index la fecha y hora actual formateada en castellano-->


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ejercicio3</title>
          <style>
            h1, h2{
                text-align: center;
                 background: graytext;
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
        //funcion para poner la hora en madrid
        date_default_timezone_set("Europe/Madrid");
        
        echo "<h1>Fecha y Hora de España</h1>";
        
        //almacenamos en una variable la instancicocion de datatime.
        $fechaNacional = new DateTime();
   
        //y le damos formato de fecha y hora castellano
        echo '<h2>'.$fechaNacional -> format("d-m-Y (H:i:s)").'</h2>'; 
        
        //muestra con echo en formato dia , mes año.
        //echo '<h2>'.date("d-m-Y (H:i:s)").'</h2>'; 
        ?>
    </body>
</html>

