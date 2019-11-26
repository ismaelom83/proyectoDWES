<!-- autor: Ismael Heras-->


<!-- ejercicio18
Recorrer el array anterior utilizando funciones para obtener el mismo resultado.
 -->

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ejercicio18</title>
        <style>
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
        <a class="volver" href="../index.php">Volver</a>
        <?php
      
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

       
       
//        echo "Muestra con print_r()".'<br>';
//         echo  '<br />';
//         //mostrar el array con la funcion print_r()
//    print_r($teatro);
//  echo  '<br />' .'<br />';
    echo "Muestra con var_dumb()".'<br>'.'<br>';
     '<br>' .'<br>';
      //mostrar el array con la funcion var_dumb()
    var_dump($teatro);
       
        ?>

    </body>
</html>
