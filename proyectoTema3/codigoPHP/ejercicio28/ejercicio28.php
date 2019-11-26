<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ismael Heras Salvdor</title>
        <meta name="author" content="Ismael Heras Salvador">
        <meta name="date" content="24-10-2019">    
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>  
  <?php
        /**
          @author Ismael Heras
          @since 24/10/2019
         */  
        define('NUMEROFORMULARIO', 3); //definimos una constante para saber los formularos que tenemos. 
        require 'validacionFormularios.php'; //Importamos la libreria de validacion.
        $entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto
        //Inicializamos un array que se encargara de recoger los errores(Campos vacios)
        for ($forErrores = 1; $forErrores <= NUMEROFORMULARIO; $forErrores++) {
            $aErrores[$forErrores]['nombre' . $forErrores] = null;
            $aErrores[$forErrores]['lenguajes' . $forErrores] = null;
            $aErrores[$forErrores]['opiniones' . $forErrores] = null;
        }  
        //Inicializamos un array que se encargara de recoger los datos del formulario(Campos vacios)
        for ($irespuestas = 1; $irespuestas <= NUMEROFORMULARIO; $irespuestas++) {
            $aRespuestas[$irespuestas]['nombre' . $irespuestas] = null;
            $aRespuestas[$irespuestas]['lenguajes' . $irespuestas] = null;
            $aRespuestas[$irespuestas]['opiniones' . $irespuestas] = null;
        }
        if (isset($_POST['enviar']) && $_POST['enviar'] == 'Enviar') { //Si se ha pulsado enviar
            //La posición del array de errores recibe el mensaje de error si hubiera
            #OBLIGATORIOS
            for ($exten = 1; $exten <= NUMEROFORMULARIO; $exten++) {
                $aErrores[$exten]['nombre' . $exten] = validacionFormularios::comprobarAlfabetico($_POST['nombre' . $exten], 100, 1, 1);  //maximo, mínimo y opcionalidad                    
                $aErrores[$exten]['lenguajes' . $exten] = validacionFormularios::comprobarEntero($_POST['lenguajes' . $exten], 150, 0, 1); //maximo, mínimo y opcionalidad
                $aErrores[$exten]['opiniones' . $exten] = validacionFormularios::comprobarAlfaNumerico($_POST['opiniones' . $exten], 150, 0, 1); //maximo, mínimo y opcionalidad
            }
            foreach ($aErrores as $campo) { //recorre el array en busca de mensajes de error
                foreach ($campo as $error) {
                    if ($error != null) {
                        $entradaOK = false; //cambia la condiccion de la variable
                    }
                }
            }
        } else {
            $entradaOK = false; //Cambiamos el valor de la variable porque no se ha pulsado el botón
        }
        if ($entradaOK) { //Si el valor es true procesamos los datos que hemos recogido
            for ($extension = 1; $extension <= NUMEROFORMULARIO; $extension++) {
                $aRespuestas[$extension]['nombre'] = $_POST['nombre' . $extension];
                $aRespuestas[$extension]['lenguajes'] = $_POST['lenguajes' . $extension];
                $aRespuestas[$extension]['opiniones'] = $_POST['opiniones' . $extension];
            }          
            setlocale(LC_TIME, 'es_ES.UTF-8');
            date_default_timezone_set('Europe/Madrid');
            $fechaNacional = new DateTime();
            echo "<br>";
            echo '<h1>' . "Encuesta sobre lenguajes de programacion a tres personas" . '</h1>' . "<br>";
            echo '<p class="hora">' . " Hoy " . strftime("%A, %d de %B de %Y a las %T ") . " Hemos realizado una encuesta a tre alumnos <br> de el intituto IES Los Sauces sobre los lenguajes de programacion que domina y el resultado a sido el siguiente: " . '</p>';
            for ($mostrar = 1; $mostrar <= NUMEROFORMULARIO; $mostrar++) {
                echo '<p class="encuesta">' . "Encuesta numero $mostrar" . '</p>';
                echo '<p>' . " El alumno " . $aRespuestas[$mostrar]['nombre'] . "<br>" .
                " A la pregunta de que cuantos lenguajes de programacion domina , contesto: " . $aRespuestas[$mostrar]['lenguajes'] . '<br>' .
                " La opinion del alumno de que lenguaje le gusta mas es la siguiente: " . $aRespuestas[$mostrar]['opiniones'] . '</p>';
            }
           echo "<br>";
            $acumulador = 0;
            for ($index = 1; $index <= NUMEROFORMULARIO; $index++) {//for para saber la media de los lenguajes de programacion.
                $acumulador = $acumulador + $aRespuestas[$index]['lenguajes'];
            }          
             echo '<h4>' . "La media de lenguajes de programacion que dominan los alumnos es: " . $acumulador / NUMEROFORMULARIO . '</h4>';                       
        } else { //Mostrar el formulario hasta que se rellene correctamente
            ?>
            <h1 class="h12">Formulario multiple</h1>
            <h2>Encuesta para alumnos sobre el numero de lenguajes de programacion que domina <br> y opinion de cual de ellos le gusta mas</h2>
            <div class="wrap">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <?php for ($extension2 = 1; $extension2 <= NUMEROFORMULARIO; $extension2++) { ?>
                        <fieldset>
                            <legend>formulario <?php echo $extension2 ?></legend>
                            <div class="obligatorio">
                                Nombre y Apellidos: <br>
                                <input type="text" name="<?php echo 'nombre' . $extension2 ?>" placeholder="Alfabetico" value="<?php
                                if ($aErrores[$extension2]['nombre' . $extension2] == NULL && isset($_POST['nombre' . $extension2])) {
                                    echo $_POST['nombre' . $extension2];
                                }
                                ?>"> <!--//Si el valor es bueno, lo escribe en el campo-->
                                       <?php if ($aErrores[$extension2]['nombre' . $extension2] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores[$extension2]['nombre' . $extension2]; //Mensaje de error que tiene el array aErrores    ?>
                                    </div>   
                                <?php } ?>                
                            </div>
                            <br>
                            <div class="obligatorio">
                                ¿Cuantos lenguajes de <br> programacion dominas?<br>
                                <input type="number" name="<?php echo 'lenguajes' . $extension2 ?>" placeholder="Número entero" value="<?php
                                if ($aErrores[$extension2]['lenguajes' . $extension2] == NULL && isset($_POST['lenguajes' . $extension2])) {
                                    echo $_POST['lenguajes' . $extension2];
                                }
                                ?>"> <!--//Si el valor es bueno, lo escribe en el campo-->
                                       <?php if ($aErrores[$extension2]['lenguajes' . $extension2] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores[$extension2]['lenguajes' . $extension2]; //Mensaje de error que tiene el array aErrores       ?>
                                    </div>   
                                <?php } ?>                
                            </div> 
                            <br>
                            <div class="obligatorio">    
                                <label  for="<?php 'opiniones' . $extension2 ?>">Opina del lenguaje de<br> programacion que mas <br> te gusta</label><br>
                                <textarea name="<?php echo 'opiniones' . $extension2 ?>" placeholder="Área de texto"><?php
                                    if ($aErrores[$extension2]['opiniones' . $extension2] == NULL && isset($_POST['opiniones' . $extension2])) {
                                        echo trim($_POST['opiniones' . $extension2]);
                                    }
                                    ?></textarea> <!--//Si el valor es bueno, lo escribe en el campo-->
                                <?php if ($aErrores[$extension2]['opiniones' . $extension2] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores[$extension2]['opiniones' . $extension2]; //Mensaje de error que tiene el array aErrores        ?>
                                    </div>   
                                <?php } ?>                
                            </div>

                        </fieldset>
                    <?php }
                    ?>
                    <br> 
                    <input type="submit" name="enviar" value="Enviar" class="btn">               
                </form>
            </div>
        <?php } ?>   
        <br/>
        <br/>
        <footer>
            <p>
                <a href="../../../..">
                    © Ismael Heras Salvador 2019-2020
                </a>
            </p>
        </footer>
    </body>
</html>