
<!-- autor: Ismael Heras-->


<!-- ejercicio12
  Mostrar el contenido de las variables superglobales (utilizando print_r() y foreach()).-->

<!doctype html>
<html lang="esz">
    <head>
        <meta charset="UTF-8">
        <title>ejercicio12</title>
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
        echo '<h2>' . "Variables super globales con print_r" . '</h2>';

        //utilizamos el print_r para mostrar las variables superglobales.
        print_r($_SERVER);
//       echo "<br>";
//        print_r($_GET);
//        echo "<br>";
//        print_r($_POST);
//        echo "<br>";
//        print_r($_FILES);
//        echo "<br>";
//         print_r($_COOKIE);
//       echo "<br>";
//       print_r($_ENV);
//       echo "<br>";
//       print_r($_REQUEST);
//       echo "<br>";  
//       print_r($_SESSION);
//       echo "<br>";
//       echo "<br>";
//       echo "<br>";


        echo '<h2>' . "Variables super globales con foreach()" . '</h2>';

        //almacenamos una variable de 
        $globales = $_SERVER;

       
        
        foreach ($globales as $key => $value) {
             echo "$key => $value".'<br>';          
        }
        ?>
    </body>
</html>

