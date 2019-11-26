

<!--autor: Ismael Heras-->


<!-- ejercicio4
 Mostrar en tu página index la fecha y hora actual en Oporto formateada en portugués.-->


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ejercicio4</title>
        <style>
            h1, h2{
                text-align: center;
                background: blue;
                color: beige;
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
        //funcion para poner la hora en lisboa
        date_default_timezone_set("Europe/LISBON");
        
        echo "<h1>Fecha y Hora de Oporto</h1>";
        
        //almacenamos en una variable la instancicocion de datatime.
        $fechaLisboa = new DateTime();
        
        //y le damos formato de fecha y hora castellano
        echo '<h2>'.$fechaLisboa -> format("d-m-Y (H:i:s)").'</h2>'; 
        
        //muestra con echo en formato dia , mes año.
//        echo '<h2>'.date("d-m-Y (H:i:s)").'</h2>';     
        ?>
    </body>
</html>

