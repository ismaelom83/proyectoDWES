
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 24</title>
        <link rel="stylesheet" href="../webroot/formularios/bootstrap.css">
    </head>
    <body>  
        <?php
        /**
          @author: Victor Martinez Mielgo
          @since: 08/10/2019
          Comentarios: Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la  misma página las preguntas y las respuestasrecogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente, pero lasrespuestas que habíamos tecleado correctamente aparecerán en el formulario y no tendremos que volver a teclearlas
         */
        require '../core/181025validacionFormularios.php'; //importamos la libreria de validacion
        //variables que contienen datos que necesitan las funciones de la libreria de validacion
        //constantes que contienen datos que necesitan las funciones de la libreria de validacion
        define('MAX', PHP_FLOAT_MAX);
        define('MIN', -PHP_FLOAT_MAX);
        define('OBLIGATORIO', 1); //si esta variable contiene 1 es que el campo del formulario es obligario, si tiene 0 es un campo no obligatorio
        $entradaOK = true; //inicializamos una variable que nos ayudara a controlar si todo esta correcto
        //inicializamos un array que se encargara de recoger los errrorer(Campos vacios)
        $aErrores = ['primerNumero' => null,
            'segundoNumero' => null];
        //inicializamos un array que se encargara de recoger los datos del formulario(Campos vacios)
        $aFormulario = ['primerNumero' => null,
            'segundoNumero' => null];

        if (isset($_POST['enviar'])) {
            $aErrores['primerNumero'] = validacionFormularios::comprobarFloat($_POST['primerNumero'], MAX, MIN, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error si hubiera
            $aErrores['segundoNumero'] = validacionFormularios::comprobarFloat($_POST['segundoNumero'], MAX, MIN, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error si hubiera

//            //Estructuta que comprobara si los campos estan vacios y en caso de estar a NULL cargamos un mensaje en el array de errores
//            if ($_POST['primerNumero'] == NULL) {
//                $aErrores['primerNumero'] = 'Campo Vacio';
//            }
//            if ($_POST['segundoNumero'] == NULL) {
//                $aErrores['segundoNumero'] = 'Campo Vacio';
//            }

            foreach ($aErrores as $campo => $error) { //recorre el array en busca de mensajes de error
                if ($error != null) { //si lo encuentra vacia el campo y cambia la condiccion
                    $_REQUEST[$campo] = ""; //vacia el campo
                    $entradaOK = false; //cambia la condiccion de la variable
                }
            }
        } else {
            $entradaOK = false; //cambiamos el valor de la variable
        }

        if ($entradaOK) { //si el valor es true mostramos los datos que hemos recogido
            $aFormulario['primerNumero'] = $_POST['primerNumero']; //en el array del formulario guardamos los datos
            $aFormulario['segundoNumero'] = $_POST['segundoNumero']; //en el array del formulario guardamos los datos
            $suma = $aFormulario['primerNumero'] + $aFormulario['segundoNumero']; //variable que tiene una operacion. Suma los 2 numeros del formulario
            $resta = $aFormulario['primerNumero'] - $aFormulario['segundoNumero']; //variable que tiene una operacion. resta los 2 numeros del formulario
            $multiplicacion = $aFormulario['primerNumero'] * $aFormulario['segundoNumero']; //variable que tiene una operacion. Multiplica los 2 numeros del formulario
            //Mostramos los datos por pantalla        
            print "Primer Numero Introducido: " . $aFormulario['primerNumero'] . "<br>";
            print "Segundo Numero Introducido: " . $aFormulario['segundoNumero'] . "<br>";
            print "Suma de los 2 numero: " . $suma . "<br>";
            print "Resta de los 2 numero: " . $resta . "<br>";
            print "Multiplicacion de los 2 numero: " . $multiplicacion . "<br>";
        } else { //mostrar el formulario hasta que se rellene correctamente
            ?>
            <form name="form23" action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post">
                <legend>Formulario Ejercicio 24</legend>
                <div class="form-group">
                    <label for="exampleNumero1">Primer Numero</label>
                    <input type="text" name="primerNumero" class="form-control" id="exampleInputEmail1" aria-describedby="numero1" placeholder="Introduzca un numero" value="<?php
                    if (isset($_POST['primerNumero']) && is_null($aErrores['primerNumero'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                        echo $_POST['primerNumero'];
                    }
                    ?>"> 
                           <?php if ($aErrores['primerNumero'] != NULL) { ?>
                        <div class="alert alert-dismissible alert-warning">
                            <?php echo $aErrores['primerNumero']; //mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                  
                </div>   
                <div class="form-group">
                    <label for="exampleNumero1">Segundo Numero</label>
                    <input type="text" name="segundoNumero" class="form-control" id="exampleInputEmail1" aria-describedby="numero1" placeholder="Introduzca un numero" value="<?php
                    if (isset($_POST['segundoNumero']) && is_null($aErrores['segundoNumero'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                        echo $_POST['segundoNumero'];
                    }
                    ?>"> 
                           <?php if ($aErrores['segundoNumero'] != NULL) { ?>
                        <div class="alert alert-dismissible alert-warning">
                            <?php echo $aErrores['segundoNumero']; //mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>
                </div> 
                <input type="submit" class="btn btn-primary" value="Enviar" name="enviar">
                <input type="button" class="btn btn-primary" value="Volver" onclick="location = '../indexProyectoTema3.html'">
            </form>
        <?php } ?>
    </body>
</html>