

<!--autor: Ismael Heras-->

<!--ejercicio5
 Inicializar y mostrar una variable que tiene una marca de tiempo (timestamp).-->

<!doctype html>
<html lang="esz">
    <head>
        <meta charset="UTF-8">
        <title>ejercicio5</title>
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
        
//        echo "'<h1>Marca de tiempo timestamp</h1>'";
//        //funcion para optener timestamp
//        $fecha = date_create();
//         echo  '<h2>'. date_timestamp_get($fecha).'</h2>';
       date_default_timezone_set("europe/madrid");
        
       //intanciacion de datatime
        $tiempo = new DateTime();
        
        
        //asignacion a la fecha de hoy un timestamp.
        echo '<h2>'."Timestamp: ".$tiempo->getTimestamp()."<br>".'</h2>';
        
        //mostrar la fecha de hoy con format con diferentes formatos.
        echo '<h2>'."La fecha del anterior timestamp con formato y-d-m: ". $tiempo->format("y-m-d").'</h2>';
        echo '<h2>'."La fecha del anterior timestamp con formato H:s:i: ". $tiempo->format("H:s:i").'</h2>';
        echo '<h2>'."La fecha del anterior timestamp con formato Y M D: ". $tiempo->format("Y-M-D").'</h2>';
        echo '<h2>'."La fecha del anterior timestamp con formato solo año: ". $tiempo->format(" Y ").'</h2>';
        echo '<h2>'."La fecha del anterior timestamp con formato numero de mes: ". $tiempo->format(" m ").'</h2>';
        ?>
    </body>
</html>


