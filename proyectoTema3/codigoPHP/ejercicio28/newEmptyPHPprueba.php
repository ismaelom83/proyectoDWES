<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Luis Mateo Rivera Uriarte</title>
        <meta name="author" content="Luis Mateo Rivera Uriarte">
        <meta name="date" content="22-10-2019">
        <link rel="stylesheet" type="text/css" href="../webroot/css/styles.css" media="screen">
        <link rel="icon" type="image/png" href="../../../mifavicon.png">
        <style>
            fieldset{
                display: inline-block;
            }
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
                padding: 0.5%;
                border-radius: 10%;
            }
        </style>
    </head>
    <body>  
        <h1>
            Formulario múltiple
        </h1>
        <?php
        /**
          @author Luis Mateo Rivera Uriate
          @since 22/10/2019
         */
        
        require 'validacionFormularios.php'; //Importamos la libreria de validacion

        $entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto
        
        //Inicializamos un array que se encargara de recoger los errores(Campos vacios)
        $aErrores['altura'][1] = null;
        $aErrores['altura'][2] = null;
        $aErrores['altura'][3] = null;
            
        $aErrores['peso'][1] = null;
        $aErrores['peso'][2] = null;
        $aErrores['peso'][3] = null;
        
        $aErrores['RBopinion'][1] = null;
        $aErrores['RBopinion'][2] = null;
        $aErrores['RBopinion'][3] = null;
        
        //Inicializamos un array que se encargara de recoger los datos del formulario(Campos vacios)
        $aFormulario['altura'][1] = null;
        $aFormulario['altura'][2] = null;
        $aFormulario['altura'][3] = null;
        
        $aFormulario['peso'][1] = null;
        $aFormulario['peso'][2] = null;
        $aFormulario['peso'][3] = null;
            
        $aFormulario['RBopinion'][1] = null;
        $aFormulario['RBopinion'][2] = null;
        $aFormulario['RBopinion'][3] = null;
        
        if (isset($_POST['enviar'])) { //Si se ha pulsado enviar
            //La posición del array de errores recibe el mensaje de error si hubiera
        #OBLIGATORIOS
            $aErrores['altura'][1] = validacionFormularios::comprobarFloat($_POST['altura'][1], 3, 1, 1); //maximo, mínimo y opcionalidad
            $aErrores['altura'][2] = validacionFormularios::comprobarFloat($_POST['altura'][2], 3, 1, 1); //maximo, mínimo y opcionalidad
            $aErrores['altura'][3] = validacionFormularios::comprobarFloat($_POST['altura'][3], 3, 1, 1); //maximo, mínimo y opcionalidad
            
            $aErrores['peso'][1] = validacionFormularios::comprobarFloat($_POST['peso'][1], 150, 1, 1); //maximo, mínimo y opcionalidad
            $aErrores['peso'][2] = validacionFormularios::comprobarFloat($_POST['peso'][2], 150, 1, 1); //maximo, mínimo y opcionalidad
            $aErrores['peso'][3] = validacionFormularios::comprobarFloat($_POST['peso'][3], 150, 1, 1); //maximo, mínimo y opcionalidad
            
            if(!isset($_POST['RBopinion'][1])){$aErrores['RBopinion'][1] = "Debe marcarse un valor";}
            if(!isset($_POST['RBopinion'][2])){$aErrores['RBopinion'][2] = "Debe marcarse un valor";}
            if(!isset($_POST['RBopinion'][3])){$aErrores['RBopinion'][3] = "Debe marcarse un valor";}

            
            foreach ($aErrores as $campo => $error) { //Recorre el array en busca de mensajes de error
                for($persona = 1; $persona <=3; $persona++){
                    if ($error[$persona] != null) { //Si lo encuentra vacia el campo y cambia la condiccion
                        $entradaOK = false; //Cambia la condiccion de la variable
                    }
                } 
            }
        } else {
            $entradaOK = false; //Cambiamos el valor de la variable porque no se ha pulsado el botón
        }

        if ($entradaOK) { //Si el valor es true procesamos los datos que hemos recogido
            $aFormulario['altura'][1] = $_POST['altura'][1];
            $aFormulario['altura'][2] = $_POST['altura'][2];
            $aFormulario['altura'][3] = $_POST['altura'][3];
            
            $aFormulario['peso'][1] = $_POST['peso'][1]; 
            $aFormulario['peso'][2] = $_POST['peso'][2]; 
            $aFormulario['peso'][3] = $_POST['peso'][3]; 
            
            $aFormulario['RBopinion'][1] = $_POST['RBopinion'][1];
            $aFormulario['RBopinion'][2] = $_POST['RBopinion'][2];
            $aFormulario['RBopinion'][3] = $_POST['RBopinion'][3];
          
            //Mostramos los datos por pantalla   
                //ALTURA
            echo "La media de altura es: " . round(($aFormulario['altura'][1] + $aFormulario['altura'][2] + $aFormulario['altura'][3])/3, 2) . "m.<br/>";
                //PESO
            echo "La media de peso es: " . round(($aFormulario['peso'][1] + $aFormulario['peso'][2] + $aFormulario['peso'][3])/3, 2) . "Kg.<br/>";
                //OPINION DE LA ENCUESTA
            $respuestas = ['muy mal' => 0, 'mal' => 0, 'bien' => 0, 'muy bien' => 0];
            for($persona = 1; $persona <= 3; $persona++){
                if($aFormulario['RBopinion'][$persona] == "no me gusta"){
                    $respuestas['muy mal']++;
                }
                if($aFormulario['RBopinion'][$persona] == "no esta mal"){
                    $respuestas['mal']++;
                }
                if($aFormulario['RBopinion'][$persona] == "me agrada"){
                    $respuestas['bien']++;
                }
                if($aFormulario['RBopinion'][$persona] == "es maravillosa"){
                    $respuestas['muy bien']++;
                }
            }
            if($respuestas['muy mal'] > 0){
                if($respuestas['muy mal'] > 1){
                    echo $respuestas['muy mal'] . " personas opinan que no les gusta la encuesta.<br/>";
                }else{
                    echo "Una persona opina que la encuesta no le gusta.<br/>";
                }
            }
            if($respuestas['mal'] > 0){
                if($respuestas['mal'] > 1){
                    echo $respuestas['mal'] . " personas opinan que no les desagrada la encuesta.<br/>";
                }else{
                    echo "Una persona opina que la encuesta no le desagrada.<br/>";
                }
            }
            if($respuestas['bien'] > 0){
                if($respuestas['bien'] > 1){
                    echo $respuestas['bien'] . " personas opinan que la encuesta no está mal.<br/>";
                }else{
                    echo "Una persona opina que la encuesta no está mal.<br/>";
                }
            }
            if($respuestas['muy bien'] > 0){
                if($respuestas['muy bien'] > 1){
                    echo $respuestas['muy bien'] . " personas opinan que es la mejor encuesta que han visto en sus vidas.<br/>";
                }else{
                    echo "Una persona opina que es la mejor encuesta de su vida.<br/>";
                }
            }
            
            echo '<br/><br/>';
        } else { //Mostrar el formulario hasta que se rellene correctamente
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <legend>Persona 1</legend>
                    <div class="obligatorio">
                        Altura
                        <input type="text" name="altura[1]" placeholder="Altura en m" value="<?php if($aErrores['altura'][1] == NULL && isset($_POST['altura'][1])){ echo $_POST['altura'][1];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['altura'][1] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['altura'][1]; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div> 
                    <br/>
                    <div class="obligatorio">
                        Peso
                        <input type="text" name="peso[1]" placeholder="Peso en Kg" value="<?php if($aErrores['peso'][1] == NULL && isset($_POST['peso'][1])){ echo $_POST['peso'][1];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['peso'][1] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['peso'][1]; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div> 
                    <br>
                    <div class="obligatorio">
                        ¿Qué opina sobre esta encuesta múltiple?
                        <br/>
                        <input type="radio" id="RO11" name="RBopinion[1]" value="no me gusta" <?php if(isset($_POST['RBopinion'][1]) && $_POST['RBopinion'][1] == "no me gusta"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO11">No me gusta</label><br/>
                        <input type="radio" id="RO12" name="RBopinion[1]" value="no esta mal" <?php if(isset($_POST['RBopinion'][1]) && $_POST['RBopinion'][1] == "no esta mal"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO12">No está mal</label><br/>
                        <input type="radio" id="RO13" name="RBopinion[1]" value="me agrada" <?php if(isset($_POST['RBopinion'][1]) && $_POST['RBopinion'][1] == "me agrada"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO13">Me agrada</label><br/>
                        <input type="radio" id="RO14" name="RBopinion[1]" value="es maravillosa" <?php if(isset($_POST['RBopinion'][1]) && $_POST['RBopinion'][1] == "es maravillosa"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO14">Es maravillosa</label><br/>
                        <?php if ($aErrores['RBopinion'][1] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['RBopinion'][1]; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                </fieldset>
                
                <fieldset>
                    <legend>Persona 2</legend>
                    <div class="obligatorio">
                        Altura
                        <input type="text" name="altura[2]" placeholder="Altura en m" value="<?php if($aErrores['altura'][2] == NULL && isset($_POST['altura'][2])){ echo $_POST['altura'][2];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['altura'][2] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['altura'][2]; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div> 
                    <br/>
                    <div class="obligatorio">
                        Peso
                        <input type="text" name="peso[2]" placeholder="Peso en Kg" value="<?php if($aErrores['peso'][2] == NULL && isset($_POST['peso'][2])){ echo $_POST['peso'][2];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['peso'][2] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['peso'][2]; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div> 
                    <br>
                    <div class="obligatorio">
                        ¿Qué opina sobre esta encuesta múltiple?
                        <br/>
                        <input type="radio" id="RO21" name="RBopinion[2]" value="no me gusta" <?php if(isset($_POST['RBopinion'][2]) && $_POST['RBopinion'][2] == "no me gusta"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO21">No me gusta</label><br/>
                        <input type="radio" id="RO22" name="RBopinion[2]" value="no esta mal" <?php if(isset($_POST['RBopinion'][2]) && $_POST['RBopinion'][2] == "no esta mal"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO22">No está mal</label><br/>
                        <input type="radio" id="RO23" name="RBopinion[2]" value="me agrada" <?php if(isset($_POST['RBopinion'][2]) && $_POST['RBopinion'][2] == "me agrada"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO23">Me agrada</label><br/>
                        <input type="radio" id="RO24" name="RBopinion[2]" value="es maravillosa" <?php if(isset($_POST['RBopinion'][2]) && $_POST['RBopinion'][2] == "es maravillosa"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO24">Es maravillosa</label><br/>
                        <?php if ($aErrores['RBopinion'][2] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['RBopinion'][2]; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                </fieldset>
                
                <fieldset>
                    <legend>Persona 3</legend>
                    <div class="obligatorio">
                        Altura
                        <input type="text" name="altura[3]" placeholder="Altura en m" value="<?php if($aErrores['altura'][3] == NULL && isset($_POST['altura'][3])){ echo $_POST['altura'][3];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['altura'][3] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['altura'][3]; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div> 
                    <br/>
                    <div class="obligatorio">
                        Peso
                        <input type="text" name="peso[3]" placeholder="Peso en Kg" value="<?php if($aErrores['peso'][3] == NULL && isset($_POST['peso'][3])){ echo $_POST['peso'][3];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['peso'][3] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['peso'][3]; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div> 
                    <br>
                    <div class="obligatorio">
                        ¿Qué opina sobre esta encuesta múltiple?
                        <br/>
                        <input type="radio" id="RO31" name="RBopinion[3]" value="no me gusta" <?php if(isset($_POST['RBopinion'][3]) && $_POST['RBopinion'][3] == "no me gusta"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO31">No me gusta</label><br/>
                        <input type="radio" id="RO32" name="RBopinion[3]" value="no esta mal" <?php if(isset($_POST['RBopinion'][3]) && $_POST['RBopinion'][3] == "no esta mal"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO32">No está mal</label><br/>
                        <input type="radio" id="RO33" name="RBopinion[3]" value="me agrada" <?php if(isset($_POST['RBopinion'][3]) && $_POST['RBopinion'][3] == "me agrada"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO33">Me agrada</label><br/>
                        <input type="radio" id="RO34" name="RBopinion[3]" value="es maravillosa" <?php if(isset($_POST['RBopinion'][3]) && $_POST['RBopinion'][3] == "es maravillosa"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO34">Es maravillosa</label><br/>
                        <?php if ($aErrores['RBopinion'][3] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['RBopinion'][3]; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                </fieldset>
                <div>
                    <input type="submit" name="enviar" value="Enviar">
                </div>
            </form>
    <?php } ?>   
        <br/>
        <br/>
        <footer>
            <p>
                <a href="../../../..">
                    © Luis Mateo Rivera Uriarte 2019-2020
                </a>
            </p>
        </footer>
    </body>
</html>