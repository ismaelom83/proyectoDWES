
<!--autor ismael-->

<!--ejercici22
Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas recogidas.-->

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Lato|Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="estilos.css">
        <title>Formulario Contacto</title>
    </head>
    <body>

        <?php
        
         //autor ismael

//ejercici22
//Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas recogidas.
        
        //Código que se ejecuta cuando se envía el formulario
        if (isset($_POST['submit'])) {
            //asignamos el valor a las variables que contienen el $_POST de nonumero 1 y numero que hemos pedido en el formulario.
            $numero1 = $_POST['numero1'];
            $numero2 = $_POST['numero2'];

            //muestra por pantalla el numero recogido por la variable $_POST.
            echo "numero1: " . $numero1 . '<br>';
            //muestra por pantalla el numero recogido por la variable $_POST.
            echo "numero2: " . $numero2 . '<br>';
            
            $suma = $numero1+$numero2;
            //muestra la suma de los 2 numeros
            echo "La suma de los 2 numeeros es: " . $suma .'<br>';
            
        } else {
            //Código que se ejecuta antes de rellenar el formulario.
            ?>
            <div class="wrap">
               
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    
                    <input type="text" name="numero1" id="numero1" class="form-control" placeholder="numero1:" value="">
                    
                    <input type="text" name="numero2" id="numero2" class="form-control" placeholder="numero2:" value="">
                    
                    <input type="submit" name="submit" value="Enviar Correo" class="btn btn-primary">
                </form>
            </div>
    <?php
}
?>
    </body>
</html>







