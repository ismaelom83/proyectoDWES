
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
        require '../../core/validacionFormularios.php'; //importamos la libreria de validacion.
        $entradaOK = true; //Inicialización de la variable que nos indica que todo va bien
        //definicion de las constantes para la libreria de validar formularios.
        define('MAX', PHP_FLOAT_MAX); //define el numero maximo que se puede introducir
        define('MIN', -PHP_FLOAT_MIN); //define el numero minimo que se puede introducir
        define('OBLIGATORIO', 1);
        $errores = ['numero1' => null,
            'numero2' => null]; //Inicialización del array donde recogemos los errores
        $arrayFormulario = ['numero1' => null,
            'mumero2' => null]; //este array recorre los campos del formulario.
        //Código que se ejecuta cuando se envía el formulario
        if (isset($_POST['submit'])) {

            //si hay un error el array recibe un mensaje
            $errores['numero1'] = validacionFormularios::comprobarFloat($_POST['numero1'], MAX, MIN, OBLIGATORIO);
            //si hay un error el array recibe un mensaje
            $errores['numero2'] = validacionFormularios::comprobarFloat($_POST['numero2'], MAX, MIN, OBLIGATORIO);

            foreach ($errores as $key => $error) {
                if ($error != null) {
                    $_REQUEST[$key] = "";
                    $entradaOK = false;
                }
            }
        } else {
            $entradaOK = false; //cambiamos a false la variable
        }
        if ($entradaOK) {//si la variable entradaOK es verdadera mostramos los datos del formulario. 
            $arrayFormulario['numero1'] = $_POST['numero1']; //guardamos los datos recogidos en el formulario en el array.
            $arrayFormulario['numero2'] = $_POST['numero2']; //guardamos los datos recogidos en el formulario en el array.
            $suma = $arrayFormulario['numero1'] + $arrayFormulario['numero2']; //la variable suma almacena la suma de los numeros introducidos en el formulario.

            echo "El primer numero introducido es: " . $arrayFormulario['numero1'] . "<br>";
            echo "El segundo numero introducido es: " . $arrayFormulario['numero2'] . "<br>";
            echo "la suma de los numeros introducidos es: " . $suma . "<br>";
        } else {//muestra el formulario hasta que se rellene. 
            ?>
            <div class="wrap">
                <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post">
                    <input type="text" name="numero1" id="numero1" class="form-control" placeholder="Introduce numero1:" value="<?php
                    if (isset($_POST['numero1']) && is_null($errores['numero1'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                        echo $_POST['numero1'];//aunque se muestre un campo mal el valor si es correcto se mantiene.
                    }
                    ?>">
                    <?php if ($errores['numero1'] != NULL) { ?>
                        <div>
                            <?php echo $errores['numero1']; //mensaje de error que tiene el array aErrores    ?>
                        </div>   
                    <?php } ?> 
                    <input type="text" name="numero2" id="numero2" class="form-control" placeholder="Introduce numero2:" value="<?php
                    if (isset($_POST['numero2']) && is_null($errores['numero2'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                        echo $_POST['numero2'];//aunque se muestre un campo mal el valor si es correcto se mantiene.
                    }
                    ?>">
                    <?php if ($errores['numero2'] != NULL) { ?>
                        <div>
                            <?php echo $errores['numero2']; //mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?> 
                    <input type="submit" name="submit" value="Enviar" class="btn btn-primary">
                </form>
            </div>
            <?php
        }
        ?>
    </body>
</html>
