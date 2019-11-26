

<!-- autor: Ismael Heras-->


<!-- ejercicio6
 Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 días-->


<!doctype html>
<html lang="esz">
    <head>
        <meta charset="UTF-8">
        <title>ejercicio6</title>
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
        
        echo "<h1>la fecha y el día de la semana de dentro de 60 días</h1>";
        //creacion de la fecha actual
        $fechaHoy = date("d-m-Y");
        //creacion de una fecha dentro de 60 dias a partir de hoy.
        $nuevaFecha = date("d-m-Y", strtotime($fechaHoy . "+ 60 days"));
        
        //con datatime puedo sacar la fecha dentro de 60 dias pero no se como se sabe el dia de la semana que es 
//         $fechaHoy = new DateTime();
//        $fechaHoy -> format("d-m-Y");
//        //creacion de una fecha dentro de 60 dias a partir de hoy con add + 60 days.
//        $nuevaFecha = $fechaHoy -> add(new DateInterval('P60D'));

        //array con los dias de la semana.
        $dias = array("domingo", "lunes", "martes", "miercoles", "jueves", "viernes", "sabado");
       
        //lo utilizamos para saber que dia de la semana es la fecha dentro de 60 dias.
        $dia_semana = $dias[date("w", strtotime($nuevaFecha))];
        echo '<h2>' . "La fecha de hoy " . $fechaHoy . " mas 60 dias es: " . $nuevaFecha . " y el dia de la semana que es: " . $dia_semana . '</h2>';
        ?>
    </body>
</html>
