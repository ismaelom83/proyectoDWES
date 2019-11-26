
<!--autor: Ismael Heras-->


<!--ejercicio1
  Inicializar variables de los distintos tipos de datos básicos(string, int, float, bool) y
  mostrar los datos por pantalla (echo, print, printf, print_r,var_dump).-->


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Lato|Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="estilosPhp.css">
        <title>Ejercicio1</title>
        <style>
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
        $entero =10;
        $nombre = "Hola Mundo";
        $logico = true;
        $nreal = 10.5;
        echo "Muestra de variables con echo". '<br>'.'<br>';
        
        echo "La Variable " .'$entero'. " es de tipo ". gettype($entero) ." con echo se muestar asi el resultado: ", $entero, '<br>';
        echo "La variable ".' $nombre'. " es de tipo ". gettype($nombre) ."  con echo se muestar asi el resultado: ",  $nombre , "<br>";
        echo "La Variable ".'$logico'."  es de tipo ". gettype($logico)." se muestar asi el resultado: ", $logico,'<br>';
        echo "La Variable ".'$nreal'." es de tipo ". gettype($nreal)." se muestar asi el resultado:: ", $nreal ,'<br>'.'<br>.<br>';
        
        echo "Muestra de variables con print". '<br>'.'<br>';
        
        print "La Variable ".' $entero '." es de tipo ". gettype($entero) ." y con print se muestar a si ". $entero .'<br>'; 
        print "La Variable ".' $nombre '." es de tipo ". gettype($nombre) ." y con print se muestar a si ". $nombre.'<br>'; 
        print "La Variable ".' $logico '." es de tipo ". gettype($logico) ." y con print se muestar a si ". $logico .'<br>'; 
        print  "La Variable ".' $enreal '." es de tipo ". gettype($nreal) ." y con print se muestar a si ". $nreal .'<br>'; 

        echo  '<br>'.'<br>'."Muestra de variables con printf". '<br>'.'<br>';
        
        printf("La primera veriable es un entero y es: %d  ".'<br>'
                . "La segunda variable es un string y es: %s  ".'<br>'
                . "La tercera variable es un booleano y es: %b  ".'<br>'
                . "Y la ultima variable es un float y es: %f ", $entero, $nombre, $logico, $nreal);
        
        echo '<br>'.'<br>'.'<br>'."Muestra de variables con print_r". '<br>'.'<br>';
        
        print_r($entero);
       echo "<br>";
        print_r($nombre);
        echo "<br>";
        print_r($logico);
        echo "<br>";
        print_r($nreal);
        
        
        echo '<br>'.'<br>'.'<br>'."Muestra de variables con var_dump". '<br>'.'<br>';
        
        var_dump($entero);
       echo "<br>";
       var_dump($nombre);
        echo "<br>";
        var_dump($logico);
        echo "<br>";
        var_dump($nreal);
       
        
          ?>      
        
        

    </body>
</html>

