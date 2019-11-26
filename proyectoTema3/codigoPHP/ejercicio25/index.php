
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
        /*
          autor: ismael heras
         * 
         * fecha:17/10/2019
         * 
         * */
        require '../../core/validacionFormularios.php'; //importamos la libreria de validacion.
        $entradaOK = true; //Inicialización de la variable que nos indica que todo va bien
        //definicion de las constantes para la libreria de validar formularios.
        define('OBLIGATORIO', 1); //constante que define que un campo es obligatorio.
        define('NOOBLIGATORIO', 0); //constante que define que un campo NO es obligatorio.
        $errores = ['floatObli' => null,
            'alfanumericoObli' => null,
            'dniS' => null,
            'floatNo' => null,
            'alfanumericoNo' => null,
            'alfabeticoObli' => null,
            'alfabeticoNo' => null,
            'dniN' => null,
            'emailS' => null,
            'emailN' => null,
            'passS' => null,
            'passN' => null,
            'tlfS' => null,
            'tlfN' => null,
            'textaS' => null,
            'checkBoxS' => null,
            'checkBoxN' => null,
            'radioS' => null,
            'radioN' => null,
            'dateS' => null,
            'dateN' => null,
            'enteroS' => null,
            'enteroN' => null]; //Inicialización del array donde recogemos los errores
        $arrayFormulario = ['floatObli' => null,
            'alfanumericoObli' => null,
            'floatNo' => null,
            'alfanumericoNo' => null,
            'alfabeticoObli' => null,
            'alfabeticoNo' => null,
            'dniS' => null,
            'dniN' => null,
            'emailS' => null,
            'emailN' => null,
            'passS' => null,
            'passN' => null,
            'tlfS' => null,
            'tlfN' => null,
            'textaS' => null,
            'checkBoxS' => null,
            'checkBoxN' => null,
            'radioS' => null,
            'radioN' => null,
            'dateS' => null,
            'dateN' => null,
            'enteroS' => null,
            'enteroS' => null]; //este array recorre los campos del formulario.
        //Código que se ejecuta cuando se envía el formulario
        if (isset($_POST['submit'])) {

            //si hay un error el array recibe un mensaje.
            $errores['floatObli'] = validacionFormularios::comprobarFloat($_POST['floatObli'], PHP_FLOAT_MAX, -PHP_FLOAT_MIN, OBLIGATORIO);
            $errores['floatNo'] = validacionFormularios::comprobarFloat($_POST['floatNo'], PHP_FLOAT_MAX, -PHP_FLOAT_MIN, NOOBLIGATORIO);
            $errores['alfanumericoObli'] = validacionFormularios::comprobarAlfaNumerico($_POST['alfanumericoObli'], 50, 1, OBLIGATORIO);
            $errores['alfanumericoNo'] = validacionFormularios::comprobarAlfaNumerico($_POST['alfanumericoObli'], 50, 1, NOOBLIGATORIO);
            $errores['alfabeticoObli'] = validacionFormularios::comprobarAlfabetico($_POST['alfabeticoObli'], 50, 1, OBLIGATORIO);
            $errores['alfabeticoNo'] = validacionFormularios::comprobarAlfabetico($_POST['alfabeticoNo'], 50, 1, NOOBLIGATORIO);
            $errores['dniS'] = validacionFormularios::validarDni($_POST['dniS'], OBLIGATORIO);
            $errores['dniN'] = validacionFormularios::validarDni($_POST['dniN'], NOOBLIGATORIO);
            $errores['emailS'] = validacionFormularios::validarEmail($_POST['emailS'], 50, 1, OBLIGATORIO);
            $errores['emailN'] = validacionFormularios::validarEmail($_POST['emailN'], 50, 1, NOOBLIGATORIO);
            $errores['passS'] = validacionFormularios::validarPassword($_POST['passS'], OBLIGATORIO, 4);
            
            $errores['tlfS'] = validacionFormularios::validaTelefono($_POST['tlfS'], OBLIGATORIO);
            $errores['tlfN'] = validacionFormularios::validaTelefono($_POST['tlfN'], NOOBLIGATORIO);
            $errores['textaS'] = validacionFormularios::comprobarAlfaNumerico($_POST['textaS'], 50, 1, OBLIGATORIO);
            if (!isset($_POST['checkBoxS'])) {
                $errores['checkBoxS'] = "Debe marcarse al menos un valor";
            } //para el checkbox
           
            if (!isset($_POST['radioS'])) {
                $errores['radioS'] = "Debe marcarse un valor";
            } //para los radio buttons
            
            $errores['dateS'] = validacionFormularios::validarFecha($_POST['dateS'], OBLIGATORIO);
            $errores['dateN'] = validacionFormularios::validarFecha($_POST['dateN'], NOOBLIGATORIO);
            $errores['enteroS'] = validacionFormularios::comprobarEntero($_POST['enteroS'], PHP_INT_MAX, PHP_INT_MIN, OBLIGATORIO);
            $errores['enteroN'] = validacionFormularios::comprobarEntero($_POST['enteroN'], PHP_INT_MAX, PHP_INT_MIN, NOOBLIGATORIO);


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
            //guardamos los datos recogidos en el formulario en el array.
            $arrayFormulario['floatObli'] = $_POST['floatObli'];
            $arrayFormulario['floatNo'] = $_POST['floatNo'];
            $arrayFormulario['alfanumericoObli'] = $_POST['alfanumericoObli'];
            $arrayFormulario['alfanumericoNo'] = $_POST['alfanumericoNo'];
            $arrayFormulario['alfabeticoObli'] = $_POST['alfabeticoObli'];
            $arrayFormulario['alfabeticoNo'] = $_POST['alfabeticoNo'];
            $arrayFormulario['dniS'] = $_POST['dniS'];
            $arrayFormulario['dniN'] = $_POST['dniN'];
            $arrayFormulario['emailS'] = $_POST['emailS'];
            $arrayFormulario['emailN'] = $_POST['emailN'];
            $arrayFormulario['passS'] = $_POST['passS'];
          
            $arrayFormulario['tlfS'] = $_POST['tlfS'];
            $arrayFormulario['tlfN'] = $_POST['tlfN'];
            $arrayFormulario['textaS'] = $_POST['textaS'];
            $arrayFormulario['checkBoxS'] = $_POST['checkBoxS'];
//            $arrayFormulario['checkBoxN'] = $_POST['checkBoxN'];
            $arrayFormulario['radioS'] = $_POST['radioS'];
//            $arrayFormulario['radioN'] = $_POST['radioN'];
            $arrayFormulario['dateS'] = $_POST['dateS'];
            $arrayFormulario['dateN'] = $_POST['dateN'];
            $arrayFormulario['enteroS'] = $_POST['enteroS'];
            $arrayFormulario['enteroN'] = $_POST['enteroN'];

            echo "<hi class='titulo1'>Elemtos introducidos en el formulario</hi>";

            //muestar por pantalla la variable
            echo "<p class='parrafo2'>" . "Float obligatorio =" . $arrayFormulario['floatObli'] . "</p>";
            echo '<br>';
            echo "<p class='parrafo2'>" . "Float no obligatorio =" . $arrayFormulario['floatNo'] . "</p>";
            echo '<br>';
            echo "<p class='parrafo2'>" . "Alfanumerico obligatorio =" . $arrayFormulario['alfanumericoObli'] . "</p>";
            echo '<br>';
            echo "<p class='parrafo2'>" . "Alfanumerico no obligatorio =" . $arrayFormulario['alfanumericoNo'] . "</p>";
            echo "<br>";
            echo "<p class='parrafo2'>" . "Alfabetico obligatorio =" . $arrayFormulario['alfabeticoObli'] . "</p>";
            echo "<br>";
            echo "<p class='parrafo2'>" . "Alfabetico no obligatorio =" . $arrayFormulario['alfabeticoNo'] . "</p>";
            echo "<p class='parrafo2'>" . "Introducir DNI obligatorio =" . $arrayFormulario['dniS'] . "</p>";
            echo "<br>";
            echo "<p class='parrafo2'>" . "Introducir DNI no obligatorio =" . $arrayFormulario['dniN'] . "</p>";
            echo "<br>";
            echo "<p class='parrafo2'>" . "Introducir EMAIL obligatorio =" . $arrayFormulario['emailS'] . "</p>";
            echo "<br>";
            echo "<p class='parrafo2'>" . "Introducir EMAIL no obligatorio =" . $arrayFormulario['emailN'] . "</p>";
            echo "<br>";
            echo "<p class='parrafo2'>" . "Introducir PASSWORD obligatoria =" . $arrayFormulario['passS'] . "</p>";
            echo "<br>";
            echo "<p class='parrafo2'>" . "Introducir PASSWORD no obligatoria =" . $arrayFormulario['passN'] . "</p>";
            echo "<br>";
            echo "<p class='parrafo2'>" . "Introducir telefono  obligatorio =" . $arrayFormulario['tlfS'] . "</p>";
            echo "<br>";
            echo "<p class='parrafo2'>" . "Introducir telefono no obligatorio =" . $arrayFormulario['tlfN'] . "</p>";
            echo "<br>";
            echo "<p class='parrafo2'>" . "Introducir checkbox obligatorio =" . $arrayFormulario['checkBoxS'] . "</p>";
            echo "<br>";
            echo "<p class='parrafo2'>" . "Introducir checkbox no obligatorio =" . $arrayFormulario['checkBoxN'] . "</p>";
            echo "<br>";
            echo "<p class='parrafo2'>" . "Introducir radio button obligatorio =" . $arrayFormulario['radioS'] . "</p>";
            echo "<br>";
            echo "<p class='parrafo2'>" . "Introducir radio button no obligatorio =" . $arrayFormulario['radioN'] . "</p>";
            echo "<br>";
            echo "<p class='parrafo2'>" . "Introducir texarea obligatorio =" . $arrayFormulario['textaS'] . "</p>";
            echo "<br>";
            echo "<p class='parrafo2'>" . "Introducir fecha obligatoria=" . $arrayFormulario['dateS'] . "</p>";
            echo "<br>";
            echo "<p class='parrafo2'>" . "Introducir fecha no obligatoria=" . $arrayFormulario['dateN'] . "</p>";
            echo "<br>";
            echo "<p class='parrafo2'>" . "Introducir entero  obligatorio=" . $arrayFormulario['enteroS'] . "</p>";
            echo "<br>";
            echo "<p class='parrafo2'>" . "Introducir entero no obligatorio=" . $arrayFormulario['enteroN'] . "</p>";
            echo "<br>";
        } else {//muestra el formulario hasta que se rellene. 
            ?>
            <div class="wrap">
                <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post">
                    <fieldset class="field">
                        <legend class="plantilla1">Plantilla para hacer Formularios como churros</legend>
                        <fieldset class="field1">
                            <label class="label1" for="floatObli">Introduce numero float  obligatorio</label><br>
                            <input type="number" name="floatObli" id="floatObli" class="form-control" placeholder="Numero:" value="<?php
                            if (isset($_POST['floatObli']) && is_null($errores['floatObli'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                                echo $_POST['floatObli']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
                            }
                            ?>">
                                   <?php if ($errores['floatObli'] != NULL) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['floatObli'] . "</p>"; //mensaje de error que tiene el array aErrores        ?>
                                </div>   
                            <?php } ?> 
                            <label class="label2" for="floatNo">Introduce numero float no obligatorio</label><br>
                            <input type="number" name="floatNo" id="floatNo" class="form-control" placeholder="Numero:" value="<?php
                            if (isset($_POST['floatNo']) && is_null($errores['floatNo'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                                echo $_POST['floatNo']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
                            }
                            ?>">
                                   <?php if ($errores['floatNo'] != NULL) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['floatN'] . "</p>"; //mensaje de error que tiene el array aErrores        ?>
                                </div>   
                            <?php } ?> 

                            <!--------------FLOAT------------------------------------------------------------------------------------------------------------------------------------------------->

                            <label class="label1" for="alfanumericoObli">Introduce alfanumerico obligatorio</label><br>
                            <input type="text" name="alfanumericoObli" id="alfanumericoObli" class="form-control" placeholder="Alfanumerico:" value="<?php
                            if (isset($_POST['alfanumericoObli']) && is_null($errores['alfanumericoObli'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                                echo $_POST['alfanumericoObli']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
                            }
                            ?>">
                                   <?php if ($errores['alfanumericoObli'] != NULL) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['alfanumericoObli'] . "</p>"; //mensaje de error que tiene el array aErrores        ?>
                                </div>   
                            <?php } ?> 
                            <label class="label2" for="alfanumericoNo">Introduce alfanumerico no obligatorio</label><br>
                            <input type="text" name="alfanumericoNo" id="alfanumericoNo" class="form-control" placeholder="Alfanumerico:" value="<?php
                            if (isset($_POST['alfanumericoNo']) && is_null($errores['alfanumericoNo'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                                echo $_POST['alfanumericoNo']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
                            }
                            ?>">
                                   <?php if ($errores['alfanumericoNo'] != NULL) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['alfanumericoNo'] . "</p>"; //mensaje de error que tiene el array aErrores        ?>
                                </div>   
                            <?php } ?> 

                            <!--------------------ALFANUMERICO--------------------------------------------------------------------------------------------------------------------------------------------------->

                            <label class="label1" for="alfabeticoObli">Introduce alfabetico  obligatorio</label><br>
                            <input type="text" name="alfabeticoObli" id="alfabeticoObli" class="form-control" placeholder="Alfabetico:" value="<?php
                            if (isset($_POST['alfabeticoObli']) && is_null($errores['alfabeticoObli'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                                echo $_POST['alfabeticoObli']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
                            }
                            ?>">
                                   <?php if ($errores['alfabeticoObli'] != NULL) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['alfabeticoObli'] . "</p>"; //mensaje de error que tiene el array aErrores        ?>
                                </div>   
                            <?php } ?> 

                            <label class="label2" for="alfabeticoNo">Introduce alfabetico no obligatorio</label><br>
                            <input type="text" name="alfabeticoNo" id="alfabeticoNo" class="form-control" placeholder="Alfabetico:" value="<?php
                            if (isset($_POST['alfabeticoNo']) && is_null($errores['alfabeticoNo'])) {//comprobamos si ha introducido algo en el campo y que el array de errores este a null
                                echo $_POST['alfabeticoNo']; //aunque se muestre un campo mal el valor si es correcto se mantiene.                      
                            }
                            ?>">
                                   <?php if ($errores['alfabeticoNo'] != null) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['alfabeticoNo'] . "</p>"; //mensaje de error que tiene el array aErrores     ?>
                                </div>
                            <?php } ?>

                            <!------------------------------ALFABETICO----------------------------------------------------------------------------------------------------------------------------------------->

                            <label class="label1" for="emailS">Introduce EMAIL obligatorio</label><br>
                            <input type="email" name="emailS" id="emailS" class="form-control" placeholder="EMAIL:" value="<?php
                            if (isset($_POST['emailS']) && is_null($errores['emailS'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                                echo $_POST['emailS']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
                            }
                            ?>">
                                   <?php if ($errores['emailS'] != NULL) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['emailS'] . "</p>"; //mensaje de error que tiene el array aErrores        ?>
                                </div>   
                            <?php } ?> 

                            <label class="label2" for="emailN">Introduce EMAIL no obligatorio</label><br>
                            <input type="email" name="emailN" id="emailN" class="form-control" placeholder="EMAIL:" value="<?php
                            if (isset($_POST['emailN']) && is_null($errores['emailN'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                                echo $_POST['emailN']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
                            }
                            ?>">
                                   <?php if ($errores['emailN'] != NULL) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['emailN'] . "</p>"; //mensaje de error que tiene el array aErrores        ?>
                                </div>   
                            <?php } ?> 

                            <!-----------------------EMAIL---------------------------------------------------------------------------------------------------------------------------------------------->

                            <label class="label1" for="dniS">Introduce DNI obligatorio</label><br>
                            <input type="text" name="dniS" id="dniS" class="form-control" placeholder="DNI:" value="<?php
                            if (isset($_POST['dniS']) && is_null($errores['dniS'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                                echo $_POST['dniS']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
                            }
                            ?>">
                                   <?php if ($errores['dniS'] != NULL) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['dniS'] . "</p>"; //mensaje de error que tiene el array aErrores        ?>
                                </div>   
                            <?php } ?> 

                            <label class="label2" for="dniN">Introduce DNI no obligatorio</label><br>
                            <input type="text" name="dniN" id="dniN" class="form-control" placeholder="DNI:" value="<?php
                            if (isset($_POST['dniN']) && is_null($errores['dniN'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                                echo $_POST['dniN']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
                            }
                            ?>">
                                   <?php if ($errores['dniN'] != NULL) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['dniN'] . "</p>"; //mensaje de error que tiene el array aErrores        ?>
                                </div>   
                            <?php } ?> 


                            <!------------------------------DNI----------------------------------------------------------------------------------------------------------------------------------------->


                            <label class="label1" for="passS">Introduce PASSWORD obligatoria</label><br>
                            <input type="password" name="passS" id="passS" class="form-control" placeholder="PASSWORD:" value="<?php
                            if (isset($_POST['passS']) && is_null($errores['passS'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                                echo $_POST['passS']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
                            }
                            ?>">
                                   <?php if ($errores['passS'] != NULL) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['passS'] . "</p>"; //mensaje de error que tiene el array aErrores        ?>
                                </div>   
                            <?php } ?> 



                            <!---------------------------PASSWORD------------------------------------------------------------------------------------------------------------------------------->

                            <label class="label1" for="dateS" >Fecha obligatoria</label>
                            <input type="date" name="dateS" class="form-control" value="<?php
                            if (isset($_POST['dateS']) && is_null($errores['dateS'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                                echo $_POST['dateS']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
                            }
                            ?>">

                            <?php if ($errores['dateS'] != NULL) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['dateS'] . "</p>"; //mensaje de error que tiene el array aErrores        ?>
                                </div>   
                            <?php } ?> 

                            <label class="label2" for="dateN">Fecha no obligatoria</label>
                            <input type="date" name="dateN" class="form-control" value="<?php
                            if (isset($_POST['dateN']) && is_null($errores['dateN'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                                echo $_POST['dateN']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
                            }
                            ?>">

                            <?php if ($errores['dateN'] != NULL) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['dateN'] . "</p>"; //mensaje de error que tiene el array aErrores        ?>
                                </div>   
                            <?php } ?> 

                            <!----------------------------FECHAS-------------------------------------------------------------------------------------------------------------->



                        </fieldset>

                        <fieldset class="field2">


                            <label class="label1" for="tlfS">Introduce telefono  obligatorio</label><br>
                            <input type="tel" name="tlfS" id="passS" class="form-control" placeholder="TELEFONO:" value="<?php
                            if (isset($_POST['tlfS']) && is_null($errores['tlfS'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                                echo $_POST['tlfS']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
                            }
                            ?>">
                                   <?php if ($errores['tlfS'] != NULL) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['tlfS'] . "</p>"; //mensaje de error que tiene el array aErrores        ?>
                                </div>   
                            <?php } ?> 

                            <label class="label2" for="tlfN">Introduce telefono no obligatorio</label><br>
                            <input type="tel" name="tlfN" id="passS" class="form-control" placeholder="TELEFONO:" value="<?php
                            if (isset($_POST['tlfN']) && is_null($errores['tlfN'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                                echo $_POST['tlfN']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
                            }
                            ?>">
                                   <?php if ($errores['tlfN'] != NULL) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['tlfN'] . "</p>"; //mensaje de error que tiene el array aErrores  ?>
                                </div>   
                            <?php } ?> 

                            <!-----------------------TELEFONO--------------------------------------------------------------------------------------------------------------->


                            <label  class="label1" for="checkBoxS"> CheckBox obligatorio</label><br>   
                            <input class="form-control" name="checkBoxS" type="checkbox" value="Opcion 1" <?php
                            if (isset($_POST['checkBoxS']) && $_POST['checkBoxS'] == "Opcion 1") {
                                echo 'checked';
                            }
                            ?> > posicion 1 <br>
                            <input class="form-control" name="checkBoxS" type="checkbox" value="Opcion 2" <?php
                            if (isset($_POST['checkBoxS']) && $_POST['checkBoxS'] == "Opcion 2") {
                                echo 'checked';
                            }
                            ?>  > posicion 2 <br>              
                            <input class="form-control" name="checkBoxS" type="checkbox" value="Opcion 3" <?php
                            if (isset($_POST['checkBoxS']) && $_POST['checkBoxS'] == "Opcion 3") {
                                echo 'checked';
                            }
                            ?> > posicion 3 <br> 
                                   <?php if ($errores['checkBoxS'] != NULL) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['checkBoxS'] . "</p>"; //mensaje de error que tiene el array aErrores   ?>

                                </div>   
                            <?php } ?> 

                            <label  class="label2" for="checkBoxN"> CheckBox no obligatorio</label><br>   
                            <input class="form-control" name="checkBoxN" type="checkbox" value="Opcion 1" <?php
                            if (isset($_POST['checkBoxN']) && $_POST['checkBoxN'] == "Opcion 1") {
                                echo 'checked';
                            }
                            ?>> posicion 1 <br>
                            <input class="form-control" name="checkBoxN" type="checkbox" value="Opcion 2" <?php
                            if (isset($_POST['checkBoxN']) && $_POST['checkBoxN'] == "Opcion 2") {
                                echo 'checked';
                            }
                            ?> > posicion 2 <br>              
                            <input class="form-control" name="checkBoxN" type="checkbox" value="Opcion 3" <?php
                            if (isset($_POST['checkBoxN']) && $_POST['checkBoxN'] == "Opcion 3") {
                                echo 'checked';
                            }
                            ?> > posicion 3 <br>  
                                   <?php if ($errores['checkBoxN'] != NULL) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['checkBoxN'] . "</p>"; //mensaje de error que tiene el array aErrores ?>

                                </div>   
                            <?php } ?> 

                            <!-----------------------------------CHECKBOX--------------------------------------------------------------------------------------------------------------------------------------------------------->

                            <label class="label1" for="radioS">Radio button obligatorio</label><br>
                            <input type="radio" class="form-control" id="r1" name="radioS" value="Opcion 1" <?php
                            if (isset($_POST['radioS']) && $_POST['radioS'] == "Opcion 1") {
                                echo 'checked';
                            }
                            ?>><label for="r1">Opcion 1</label><br>
                            <input type="radio" class="form-control" id="r2" name="radioS" value="Opcion 2" <?php
                            if (isset($_POST['radioS']) && $_POST['radioS'] == "Opcion 2") {
                                echo 'checked';
                            }
                            ?>><label for="r2">Opcion 2</label><br>
                            <input type="radio" class="form-control" id="r3" name="radioS" value="Opcion 3" <?php
                            if (isset($_POST['radioS']) && $_POST['radioS'] == "Opcion 3") {
                                echo 'checked';
                            }
                            ?>><label for="r3">Opcion 3</label><br>
                                   <?php if ($errores['radioS'] != NULL) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['radioS'] . "</p>"; //mensaje de error que tiene el array aErrores  ?>

                                </div>   
                            <?php } ?> 

                            <label class="label2" for="radioN">Radio button no obligatorio</label><br>
                            <input type="radio" class="form-control" id="r11" name="radioN" value="Opcion 1" <?php
                            if (isset($_POST['radioN']) && $_POST['radioN'] == "Opcion 1") {
                                echo 'checked';
                            }
                            ?>><label for="r11">Opcion 1</label><br>
                            <input type="radio" class="form-control" id="r12" name="radioN" value="Opcion 2" <?php
                            if (isset($_POST['radioN']) && $_POST['radioN'] == "Opcion 2") {
                                echo 'checked';
                            }
                            ?>><label for="r12">Opcion 2</label><br>
                            <input type="radio" class="form-control" id="r13" name="radioN" value="Opcion 3" <?php
                            if (isset($_POST['radioN']) && $_POST['radioN'] == "Opcion 3") {
                                echo 'checked';
                            }
                            ?>><label for="r13">Opcion 3</label><br>


                            <!--------------------------RADIOBUTTONS-------------------------------------------------------------------------------------------------------------->

                            <label class="label1" for="enteroS">Introduce numero entero  obligatorio</label><br>
                            <input type="text" name="enteroS" id="enteroS" class="form-control" placeholder="Numero:" value="<?php
                            if (isset($_POST['enteroS']) && is_null($errores['enteroS'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                                echo $_POST['enteroS']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
                            }
                            ?>">
                                   <?php if ($errores['enteroS'] != NULL) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['enteroS'] . "</p>"; //mensaje de error que tiene el array aErrores        ?>
                                </div>   
                            <?php } ?> 

                            <label class="label2" for="enteroN">Introduce numero entero no obligatorio</label><br>
                            <input type="text" name="enteroN" id="enteroN" class="form-control" placeholder="Numero:" value="<?php
                            if (isset($_POST['enteroN']) && is_null($errores['enteroN'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                                echo $_POST['enteroN']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
                            }
                            ?>">
                                   <?php if ($errores['enteroN'] != NULL) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['enteroN'] . "</p>"; //mensaje de error que tiene el array aErrores         ?>
                                </div>   
                            <?php } ?> 

                            <!--------------------------ENTEROS---------------------------------------------------------------------------------------------------------------------->

                            <label class="label1" for="textaS">Escribe algo en el textarea</label><br>
                            <textarea name="textaS" id="textaS" class="form-control" placeholder="Escribe algo:"><?php
                                if (isset($_POST['textaS']) && is_null($errores['textaS'])) {
                                    echo $_POST['textaS'];
                                }
                                ?></textarea>
                            <?php if ($errores['textaS'] != NULL) { ?>
                                <div>
                                    <?php echo "<p class='p1'>" . $errores['textaS'] . "</p>"; //mensaje de error que tiene el array aErrores ?>
                                </div>                            
                            <?php } ?> 

                            <!------------------------TEXAREA-------------------------------------------------------------------------------------------------------------->

                        </fieldset>
                    </fieldset>

                    <input type="submit" name="submit" value="Enviar" class="btn btn-primary boton">

                    <!-------------------------SUBMIT----------------------------------------------------------------------------------------------------------------------------->

                </form>
            </div>
            <?php
        }
        ?> 

        <?php
       
        ?>
    </body>
</html>
