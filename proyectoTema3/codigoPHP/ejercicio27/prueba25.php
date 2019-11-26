<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Luis Mateo Rivera Uriarte</title>
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
            Plantilla de formulario
        </h1>
        <?php
        /**
          @author Luis Mateo Rivera Uriate
          @since 15/10/2019
         */
        
        require 'validacionFormularios.php'; //Importamos la libreria de validacion

        $entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto
        
        //Inicializamos un array que se encargara de recoger los errores(Campos vacios)
        $aErrores = [
            'campoAlfabetico' => null
          

          #  'selectorColor' => null,
          #  'campoEmail' => null,
          #  'selectorFichero' => null,
          #  'selectorSlider' => null,
          #  'campoTelefono' => null,
          #  'campoURL' => null,
          #  'botonEnviar' => null
        ];
        
        //Inicializamos un array que se encargara de recoger los datos del formulario(Campos vacios)
        $aFormulario = [
            'campoAlfabetico' => null
         

          #  'selectorColor' => null,
          #  'campoEmail' => null,
          #  'selectorFichero' => null,
          #  'selectorSlider' => null,
          #  'campoTelefono' => null,
          #  'campoURL' => null,
          #  'botonEnviar' => null
        ];

        if (isset($_POST['enviar']) && $_POST['enviar'] == 'Enviar') { //Si se ha pulsado enviar
            //La posición del array de errores recibe el mensaje de error si hubiera
        #OBLIGATORIOS
            $aErrores['campoAlfabetico'] = validacionFormularios::comprobarAlfabetico($_POST['campoAlfabetico'], 20, 1, 1);  //maximo, mínimo y opcionalidad
          
        
            
            foreach ($aErrores as $campo => $error) { //Recorre el array en busca de mensajes de error
                if ($error != null) { //Si lo encuentra vacia el campo y cambia la condiccion
                    $entradaOK = false; //Cambia la condiccion de la variable
                }
                else{
                    if(isset($_POST[$campo])){
                        $aFormulario[$campo] = $_POST[$campo];
                    }
                } 
            }
        } else {
            $entradaOK = false; //Cambiamos el valor de la variable porque no se ha pulsado el botón
        }

        if ($entradaOK) { //Si el valor es true procesamos los datos que hemos recogido
          /*  foreach ($aFormulario as $campo) { //Recorre el array en busca de mensajes de error
                    $aFormulario[$campo] = $_POST[$campo];
            } */
            //Mostramos los datos por pantalla        
            echo "Alfabetico: " . $aFormulario['campoAlfabetico'] . "<br>";
            if($aFormulario['campoAlfabeticoOpcional'] != null){
                echo "Alfabetico opcional: " . $aFormulario['campoAlfabeticoOpcional'] . "<br>";
            }
            
           
           
            
            echo '<br/><br/>';
        } else { //Mostrar el formulario hasta que se rellene correctamente
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <legend>Titulo formulario</legend>
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
                    © Luis Mateo Rivera Uriarte 2019-2020
                </a>
            </p>
        </footer>
    </body>
</html>

