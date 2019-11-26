<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ismael Heras Salvdor</title>
        <meta name="author" content="Luis Mateo Rivera Uriarte">
        <meta name="date" content="08-10-2019">
        <link rel="stylesheet" type="text/css" href="../webroot/css/styles.css" media="screen">
        <link rel="icon" type="image/png" href="../../../mifavicon.png">
        <style>
            .obligatorio input{
                background-color: lightblue;
            }
            .obligatorio textarea{
                background-color: lightblue;
            }
            .obligatorio select{
                background-color: lightblue;
            }
            .obligatorio label{
                text-decoration: underline;
            }
            .error{
                background-color: #ff708c;
                transition: 10s;
                width: 10%;
                padding: 0.5%;
                border-radius: 10%;
            }
        </style>
    </head>
    <body>  
        <h1>
            Informe de satisfaccion personal
        </h1>
        
        <?php
        /**
          @author Ismael Heras
          @since 21/10/2019
         */
        require 'validacionFormularios.php'; //Importamos la libreria de validacion

        $entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto
        //Inicializamos un array que se encargara de recoger los errores(Campos vacios)
        $aErrores = [
            'campoAlfabetico' => null,
            'campoEntero' => null,
            'campoTexto' => null,
            'selectorRadio' => null,
            'selectorFecha' => null,
            'lista' => null];

        //Inicializamos un array que se encargara de recoger los datos del formulario(Campos vacios)
        $aFormulario = [
            'campoAlfabetico' => null,
            'campoEntero' => null,
            'campoTexto' => null,
            'selectorRadio' => null,
            'selectorFecha' => null,
            'lista' => null];

        if (isset($_POST['enviar']) && $_POST['enviar'] == 'Enviar') { //Si se ha pulsado enviar
            //La posición del array de errores recibe el mensaje de error si hubiera
            #OBLIGATORIOS
            $aErrores['campoAlfabetico'] = validacionFormularios::comprobarAlfabetico($_POST['campoAlfabetico'], 100, 1, 1);  //maximo, mínimo y opcionalidad
            $aErrores['campoEntero'] = validacionFormularios::comprobarEntero($_POST['campoEntero'], 150, -150, 1); //maximo, mínimo y opcionalidad

            if (!isset($_POST['selectorRadio'])) {
                $aErrores['selectorRadio'] = "Debe marcarse un valor";
            }

            $aErrores['selectorFecha'] = validacionFormularios::validarFecha($_POST['selectorFecha'], "2999-12-12", "1900-01-01", 1); //maximo, minimo y obligatoriedad
            $aErrores['campoTexto'] = validacionFormularios::comprobarAlfaNumerico($_POST['campoTexto'], 255, 1, 1); //maximo, mínimo y opcionalidad
            $aErrores['lista'] = validacionFormularios::validarElementoEnLista($_POST['lista'], array("Ni idea", "Con la Familia", "De fiesta", "Trabajar", "Estudiando DWES")); // opciones
            #OPCIONALES    


            foreach ($aErrores as $campo => $error) { //Recorre el array en busca de mensajes de error
                if ($error != null) { //Si lo encuentra vacia el campo y cambia la condiccion
                    $entradaOK = false; //Cambia la condiccion de la variable
                } else {
                    if (isset($_POST[$campo])) {
                        $aFormulario[$campo] = $_POST[$campo];
                    }
                }
            }
        } else {
            $entradaOK = false; //Cambiamos el valor de la variable porque no se ha pulsado el botón
        }

        if ($entradaOK) { //Si el valor es true procesamos los datos que hemos recogido
            setlocale(LC_TIME, 'es_ES.UTF-8');
            date_default_timezone_set('Europe/Madrid');
            
            $fechaNacional = new DateTime();
            $date1 = new DateTime($aFormulario['selectorFecha']);
            $date2 = new DateTime();
            $diff = $date1->diff($date2);
            echo "<br>";

            echo " hoy " .strftime("%A, %d de %B de %Y a las %T ") . "<br>"  . " Don " . $aFormulario['campoAlfabetico'] . " nacio hace " . $diff->format('%y') . " años" . "<br>" . " Se siente " . $aFormulario['selectorRadio'] . "<br>"
            . "Valore el curso con un: " . $aFormulario['campoEntero'] . " sobre 10"
            . "<br>" . "Estas navidades las dedicara a " . $aFormulario['lista'] . "<br>" . "Y ademas opina que " . $aFormulario['campoTexto'];
        } else { //Mostrar el formulario hasta que se rellene correctamente
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>

                    <div class="obligatorio">
                        Nombre y Apellidos: 
                        <input type="text" name="campoAlfabetico" placeholder="Alfabetico" value="<?php
                        if ($aErrores['campoAlfabetico'] == NULL && isset($_POST['campoAlfabetico'])) {
                            echo $_POST['campoAlfabetico'];
                        }
                        ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                               <?php if ($aErrores['campoAlfabetico'] != NULL) { ?>
                            <div class="error">
                                <?php echo $aErrores['campoAlfabetico']; //Mensaje de error que tiene el array aErrores   ?>
                            </div>   
                        <?php } ?>                
                    </div>
                    <br>

                    <div class="obligatorio">
                        Fecha Nacimiento: 
                        <input type="date" name="selectorFecha" value="<?php
                        if ($aErrores['selectorFecha'] == NULL && isset($_POST['selectorFecha'])) {
                            echo $_POST['selectorFecha'];
                        }
                        ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                            <?php if ($aErrores['selectorFecha'] != NULL) { ?>
                            <div class="error">
                            <?php echo $aErrores['selectorFecha']; //Mensaje de error que tiene el array aErrores    ?>
                            </div>   
    <?php } ?>                
                    </div>
                    <br>

                    <div class="obligatorio">
                        ¿Como te sientes hoy?
                        <br/>
                        <input type="radio" id="RO1" name="selectorRadio" value="Muy Mal" <?php
    if (isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Muy Mal") {
        echo 'checked';
    }
    ?>> <!--//Recuerda la selección-->
                        <label for="RO1">Muy Mal</label><br/>
                        <input type="radio" id="RO2" name="selectorRadio" value="Mal" <?php
                        if (isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Mal") {
                            echo 'checked';
                        }
                        ?>> <!--//Recuerda la selección-->
                        <label for="RO2">Mal</label><br/>
                        <input type="radio" id="RO3" name="selectorRadio" value="Regular" <?php
                        if (isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Regular") {
                            echo 'checked';
                        }
                        ?>> <!--//Recuerda la selección-->
                        <label for="RO3">Regular</label><br/>
                        <input type="radio" id="RO4" name="selectorRadio" value="Bien" <?php
                    if (isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Bien") {
                        echo 'checked';
                    }
                    ?>> <!--//Recuerda la selección-->
                        <label for="RO4">Bien</label><br/>
                        <input type="radio" id="RO5" name="selectorRadio" value="Muy Bien" <?php
                    if (isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Muy Bien") {
                        echo 'checked';
                    }
                    ?>> <!--//Recuerda la selección-->
                        <label for="RO5">Muy Bien</label><br/>
                        <?php if ($aErrores['selectorRadio'] != NULL) { ?>
                            <div class="error">
                                   <?php echo $aErrores['selectorRadio']; //Mensaje de error que tiene el array aErrores   ?>
                            </div>   
                            <?php } ?>                
                    </div>
                    <br>

                    <div class="obligatorio">
                        ¿como va el curso?: 
                        <input type="number" name="campoEntero" placeholder="Número entero" value="<?php
                            if ($aErrores['campoEntero'] == NULL && isset($_POST['campoEntero'])) {
                                echo $_POST['campoEntero'];
                            }
                            ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                            <?php if ($aErrores['campoEntero'] != NULL) { ?>
                            <div class="error">
                                <?php echo $aErrores['campoEntero']; //Mensaje de error que tiene el array aErrores      ?>
                            </div>   
                                    <?php } ?>                
                    </div>
                    <br>
                    <br>
                    <div class="obligatorio">
                        ¿Como se presentan la vacaciones de navidades?
                        <select name="lista">

                            <option value="Ni idea" <?php
                            if (isset($_POST['lista'])) {
                                if ($aErrores['lista'] == NULL && $_POST['lista'] == "Ni idea") {
                                    echo "selected";
                                }
                            }
                            ?>>Ni idea</option>
                            <option value="Con la Familia" <?php
                        if (isset($_POST['lista'])) {
                            if ($aErrores['lista'] == NULL && $_POST['lista'] == "Con la Familia") {
                                echo "selected";
                            }
                        }
                            ?>>Con la Familia</option>
                            <option value="De fiesta" <?php
                                if (isset($_POST['lista'])) {
                                    if ($aErrores['lista'] == NULL && $_POST['lista'] == "De fiesta") {
                                        echo "selected";
                                    }
                                }
                                ?>>De Fiesta</option>
                            <option value="Trabajar" <?php
                                if (isset($_POST['lista'])) {
                                    if ($aErrores['lista'] == NULL && $_POST['lista'] == "Trabajar") {
                                        echo "selected";
                                    }
                                }
                            ?>>Trabajando</option>
                            <option value="Estudiando DWES" <?php
                        if (isset($_POST['lista'])) {
                            if ($aErrores['lista'] == NULL && $_POST['lista'] == "Estudiando DWES") {
                                echo "selected";
                            }
                        }
                        ?>>Estudiando DWES</option>
                        </select>
    <?php if ($aErrores['lista'] != NULL) { ?>
                            <div class="error">
        <?php echo $aErrores['lista']; //Mensaje de error que tiene el array aErrores     ?>
                            </div>   
            <?php } ?>                             
                    </div>
                    </br>
                    <div class="obligatorio">    
                        <label  for="campoTexto">Describe brevenente tu estado de animo</label><br>
                        <textarea name="campoTexto" placeholder="Área de texto"><?php
        if ($aErrores['campoTexto'] == NULL && isset($_POST['campoTexto'])) {
            echo trim($_POST['campoTexto']);
        }
        ?></textarea><br> <!--//Si el valor es bueno, lo escribe en el campo-->
    <?php if ($aErrores['campoTexto'] != NULL) { ?>
                            <div class="error">
        <?php echo $aErrores['campoTexto']; //Mensaje de error que tiene el array aErrores       ?>
                            </div>   
    <?php } ?>                
                    </div>

                    <div>
                        <input type="submit" name="enviar" value="Enviar">
                    </div>
                </fieldset>
            </form>
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