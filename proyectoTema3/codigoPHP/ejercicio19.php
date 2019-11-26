<!-- autor: Ismael Heras-->


<!-- ejercicio9
 Mostrar el path donde se encuentra el fichero que se está ejecutando.-->

<!doctype html>
<html lang="esz">
    <head>
        <meta charset="UTF-8">
        <title>ejercicio9</title>
        <link rel="stylesheet" href="../css/estilosPhp.css">
    <style>
        *{
            text-align: center;
            margin-top: 100px;
        }

    </style>
</head>
<body>


    <?php
    //autor ismael
//ejercici22
//Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas recogidas.

    require './operacionesMatematicas.php';
    //Código que se ejecuta cuando se envía el formulario
    if (isset($_POST['submit'])) {
     $numero1 = $_POST['numero1'];

        $resultadoRaiz = operacionesMatematicas::raizCuadrada($_POST['numero1']);
        $seno = operacionesMatematicas::seno($_POST['numero1']);
        $coseno = operacionesMatematicas::coseno($_POST['numero1']);
        $tangente = operacionesMatematicas::tangente($_POST['numero1']);


        echo "El seno de " . $numero1 . " es :" . $seno;
        echo '<br>';
        echo "El coseno de " . $numero1 . " es :" . $coseno;
        echo '<br>';
        echo "La tangente de " . $numero1 . " es :" . $tangente;
        echo '<br>';
        echo "La raiz cuadrada de " . $numero1 . " es :" . $resultadoRaiz;
    } else {
        //Código que se ejecuta antes de rellenar el formulario.
        ?>
    
    <h1>Funcion que realiza la raiz cuadrada el seno el coseno y la tangente del numero introducido</h1>
        <div class="wrap">

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

                <label for="numero1">Introduce un entero</label>
                <input type="text" name="numero1" id="numero1" class="form-control" placeholder="numero1:" value="">

                <input type="submit" name="submit" value="Enviar" class="btn btn-primary">
            </form>
        </div>
    <?php
}
?>
</body>
</html>


