<!-- autor: Ismael Heras-->


<!-- ejercicio16
  Recorrer el array anterior utilizando funciones para obtener el mismo resultado.-->

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ejercicio16</title>
        <style>
            h1, h2{
                text-align: center;
                background: burlywood;
                color: black;
                font-size: 40px;
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
        // array asociativo con los dias de la semana y el sueldo de cada dia.
        $salarioDia = ["Lunes" => 100,
            "Martes" => 120,
            "Miercoles" => 115,
            "Jueves" => 125,
            "Vieernes" => 200,
            "Sabado" => 180,
            "Domingo" => 50];

//        echo '<h2>' . "Sueldo de cada dia de la semana" . '</h2>';
//        
//           //con esta funcion nos devuelve los sueldos de los dias de la semana 
//           //con un salto de linea sin necesidad de usar un foreach.
//           print_r('<h2>'. join('<br>',  $diasSemana) . '</h2>') ;
//        
////          echo key($diasSemana );
//        // la funcion array_sum nos devuelve la suma de todos los sueldos de cada dia sin hacer foreach con contador.   
//        echo '<h2 class="h21">' . "El sueldo total de los dias de la semana es: " . array_sum($diasSemana) . " €" . '</h2>';
        $sueldoSemana = 0; //variable para acumular los sueldos de toda la semana.
        reset($salarioDia);

        while (!is_null(key($salarioDia))) {//se recorre el array con el while hasta que la clave sea null.
            echo "<h2>" . key($salarioDia) . " = " . current($salarioDia) . "€</h2>"; //Mostramos la clave y valor actual en cada vuelta
            $sueldoSemana += current($salarioDia); //Acumulamos el salario para mostrar el total
            next($salarioDia); //Avanzamos una posición en el bucle
        }
        
        echo "<h2>"."Salario total de la semana es: ".$sueldoSemana."</h2>";
        ?>

    </body>
</html>
