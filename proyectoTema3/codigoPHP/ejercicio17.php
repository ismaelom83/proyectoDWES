<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 17</title>
         <style>
             *{
                 text-align: center;
                 font-size: 18px;
             }
            h1, h2{
                text-align: center;
                background: burlywood;
                color: black;
                font-size: 30px;
            }
            .h21{
                color: red;
            }
            .volver{
                font-size: 40px;
                text-align: center;
                display: block;
            }
        </style>
    </head>
    <body>
        <?php
        /**
          @author: Ismael Heras Salvador
          @since: 13/10/2019
          
         */
        $fila = 1; //damos valor a la variable de las filas
        while ($fila <= 20) {
            $asiento = 1; //damos valor a la variable de los asientos
            while ($asiento <= 15) { //si se cumple las condicciones del bucle asignamos NULL
                $teatro[$fila][$asiento] = null;
                $asiento++; //sumamos 1 al asiento
            }
            $fila++; //sumamos 1 a la fila
        }

        //damos valor y una posicion dentro del array bidimensional
        $teatro[2][5] = "Ismael";
        $teatro[5][6] = "Jose";
        $teatro[5][9] = "Pepe";
        $teatro[6][3] = "Juan";
        $teatro[1][3] = "Marta";
        $teatro[2][3] = "Sandra";
        $teatro[4][7] = "Grabiela";

        echo "<h2>Mostramos los asientos ocupados con FOREACH</h2>";
        foreach ($teatro as $fila => $posicion) { //recorremos el array de las filas con foreach
            foreach ($posicion as $asiento => $nombre) { //recorremos el array de los asientos con foreach
                if ($teatro[$fila][$asiento] != null) { //si la fila y el asiento no son NULL mostramos quien se ha sentado 
                    echo "<h2>"."Fila: " . $fila . " Asiento: " . $asiento . " Nombre: " . $nombre . "<br>"."</h2>"; //mensaje de salida
                }
            }
        }

        echo "<h3>Asientos Disponibles</h3>";
        for ($fila = 1; $fila <= 20; $fila++) {
            echo '<u>'."En la fila " . $fila . " estan libres los asientos ".'</u>';
            for ($asiento = 1; $asiento <= 15; $asiento++) {
                if (is_null($teatro[$fila][$asiento])) {
                    echo '<b>'.$asiento .'</b>'." ";
                }
            }
            echo "<br>";
        }
        ?>
    </body>

