
<!-- autor: Ismael Heras-->


<!-- ejercicio15
 Crear e inicializar un array con el sueldo percibido de lunes a domingo. Recorrer el array para calcular el sueldo percibido durante la
semana. (Array asociativo con los nombres de los días de la semana).-->

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ejercicio15</title>
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
        $diasSemana = ["Lunes" => 100,
            "Martes" => 120,
            "Miercoles" => 115,
            "Jueves" => 125,
            "Vieernes" => 200,
            "Sabado" => 180,
            "Domingo" => 50];

        echo '<h2>' . "muestra de array del sueldo de todos los dias  de la semana" . '</h2>';

        //variable contador para acumular los sueldos de todos los dias.
        $contador = 0;

        //foreach con valor para recorrer todos los valores de cada dia de la semana.
        foreach ($diasSemana as $key => $value) {
            //este echo muestra el dia de la semana y el sueldo de ese dia en formato lista
            echo'<h2>' . '<li>' . $key . " = " . $value . " €" . '</li>' . '<h2>';
            //el contador acumula los valores de todosa los dias de la semana.
            $contador += $value;
        }
//echo que muestra el valor del acumulador con el total de sueldos.
        echo '<h2 class="h21">' . "El sueldo total de la semana es: " . $contador . " €" . '</h2>';
        ?>

    </body>
</html>
