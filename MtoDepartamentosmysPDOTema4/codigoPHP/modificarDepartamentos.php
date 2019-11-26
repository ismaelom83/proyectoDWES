
<!DOCTYPE html>
<!--
--------------------------------------MODIFICAR DEPARTAMENTOS---------------------------------------------------------
-->
<html>
    <head>
        <title>Modificar Departamentos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../WEBBROOT/css/estilosModificar.css">
    </head>
    <header>

        <nav class="navbar navbar-expand-sm navbar-light load-hidden"  style="background-color: #e3f2fd;">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../../../index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../proyectoDWES/DWES.php">DWES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../proyectoDWEC/DWEC.php">DWEC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../proyectoDAW/DAW.php">DAW</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../proyectoDIW/DIW.php">DIW</a>
                    </li>
                    <div class="crud">
                        <p >CRUD De Ismael</p>
                    </div>                       
                </ul >
            </div>
        </nav>
    </header>
    <body>           
        <h1>Modificar los campos del registro</h1>

        <?php
        /**
          @author Ismael Heras Salvador
          @since 20/11/2019
         */
        require '../core/validacionFormularios.php'; //importamos la libreria de validacion  
        require '../config/constantes.php'; //requerimos las constantes para la conexion
        define('OBLIGATORIO', 1); //constante que define que un campo es obligatorio.
        define('NOOBLIGATORIO', 0); //constante que define que un campo NO es obligatorio.
        $entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto
        //manejo del control de errores.
        $aErrores = ['CodDepartamentos' => null,
            'DescDepartamentos' => null,
            'FechaBaja' => null,
            'VolumenNegocio' => null];
        //manejo de las variables del formulario
        $aFormulario = ['CodDepartamentos' => null,
            'DescDepartamentos' => null,
            'FechaBaja' => null,
            'VolumenNegocio' => null];
        //
        if (isset($_POST['modificar']) && $_POST['modificar'] == 'ModificarDepartamento') {
            //La posición del array de errores recibe el mensaje de error si hubiera.
            $aErrores['DescDepartamentos'] = validacionFormularios::comprobarAlfaNumerico($_POST['DescDepartamentos'], 255, 1, 1);
            $aErrores['VolumenNegocio'] = validacionFormularios::comprobarFloat($_POST['VolumenNegocio'], PHP_FLOAT_MAX, -PHP_FLOAT_MAX, 1);
            //foreach para recorrer el array de errores
            foreach ($aErrores as $campo => $error) {
                if (!is_null($error)) {
                    $_REQUEST[$campo] = "";
                    $entradaOK = false;
                }
            }
        } else {
            $entradaOK = false; //Cambiamos el valor de la variable si no se pulsa enviar.
        }

        if ($entradaOK) {//si la variable entradaOK esta el true ejecutamos el codigo.

            //el valor del array ahora es igual al de los campos recogidos en el formulario.
            $aFormulario['DescDepartamentos'] = $_POST['DescDepartamentos'];
            $aFormulario['VolumenNegocio'] = $_POST['VolumenNegocio'];
  
            echo "<br>";
            try {
                //conexion a la base de datos
                $miDB = new PDO(MAQUINA, USUARIO, PASSWD);
                //mensaje por pantalla que todo ha ido bien
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //try cacth por si falla la conexion.
            } catch (PDOException $excepcionPDO) {
                die("Error al conectarse a la base de datos");
            }
          
            try {
                
                //realizamos una consulta preparada que es un update de los campos descripcion y volumen 
                //del  registro con codigo recojido por $_GET.
                $sql = "UPDATE Departamento SET DescDepartamento=:descDepartamento, VolumenNegocio=:volumenNegocio WHERE CodDepartamento=:codDepartamento";
                //guardamos en una variable la sentencia sql
                $sentencia = $miDB->prepare($sql);
                //blindeamos los parametros.
                $sentencia ->bindParam(":codDepartamento", $_GET['codigo']);
                $sentencia ->bindParam(":descDepartamento", $_POST['DescDepartamentos']);
                $sentencia ->bindParam(":volumenNegocio", $_POST['VolumenNegocio']);
                $sentencia ->execute();
                //cath donde nos salta las excepcion si introducimos mal los datos
            } catch (Exception $excepcion) {
                die("Datos introducidos erroneamente:<br> " . $excepcion->getMessage());
            }
        }
         //si esta definida la variable y no es null almacenamos en una variable el codigo del registro recogido con $_GET
        //y realizamos una consulta de todos los campos con ese codigo.
        if (isset($_GET['codigo'])) {
            $codigo = $_GET['codigo'];
            try {
              //conexion a la base de datos
                $miDB = new PDO(MAQUINA, USUARIO, PASSWD);
                //consulta preparada que nos devuelve todos los campos del registro recojido por el $_GET  anterior
                $sql = "SELECT * FROM Departamento WHERE CodDepartamento=:codigo"; 
                //guardamos en una variable la sentencia sql.
                 $sentencia = $miDB->prepare($sql);
                 //blindeamos los parametros.
                 $sentencia->bindParam(":codigo", $codigo);
                 $sentencia->execute();

                 //con la siguiente instruccion guardamos los datos de la consulta en un array
                $aresultados =  $sentencia->fetch(PDO::FETCH_ASSOC); 
                //almacenamos en una variable un campo concreto del array de la consulta para introducirlo por defecto 
                //mediante los values en cada input de los campos que queremos modificar.
                $descripcion = $aresultados ['DescDepartamento'];   
                $volumenNegocio = $aresultados['VolumenNegocio'];
                
                //cath que salta cuando a fallado la conexion a la base de datos.
            } catch (Exception $excepcion) {
                die("Conexion a la base de datos fallida:<br> " . $excepcion->getMessage());
            }
        }  
        ?>
        <div class="wrap">
            <form action="<?php echo $_SERVER['PHP_SELF']; echo "?codigo=" .$_GET['codigo'];  ?>" method="post">
                <fieldset>
                    <div class="obligatorio">
                        CODIGO: 
                        <input type="text" name="CodDepartamentos" placeholder="" class="form-control " disabled value="<?php echo $codigo ?>" 
                        <?php if ($aErrores['CodDepartamentos'] != NULL) { ?>
                                   <div class="error">
                                       <?php echo $aErrores['CodDepartamentos']; //Mensaje de error que tiene el array aErrores ?>
                            </div>   
                        <?php } ?>                
                    </div>
                    <br>
                    <div class="obligatorio">
                        DESCRIPCION: 
                        <input type="text" name="DescDepartamentos"  class="form-control " value="<?php echo $descripcion ?>" 
                        <?php if ($aErrores['DescDepartamentos'] != NULL) { ?>
                                   <div class="error">
                                       <?php echo $aErrores['DescDepartamentos']; //Mensaje de error que tiene el array aErrores         ?>
                            </div>   
                        <?php } ?>   
                        <br>
                        <br>
                        <label class="label2" for="VolumenNegocio">ValorNegocio</label>
                        <input type="number" name="VolumenNegocio" id="VolumenNegocio" class="form-control"  value="<?php echo $volumenNegocio ?>">
                        <?php if ($aErrores['VolumenNegocio'] != NULL) { ?>
                            <div class="error">
                                <?php echo "<p class='p1'>" . $aErrores['VolumenNegocio'] . "</p>"; //mensaje de error que tiene el array aErrores ?>
                            </div>   
                        <?php } ?> 
                    </div>
                    <br>
                    <br>
                    <div class="botones2">
                        <input type="submit" name="modificar"  value="ModificarDepartamento" class="form-control  btn btn-primary mb-1">
                        <li class="cancelarModificar"><a href="MtoDepartamentosmysPDOTema4.php">VOLVER</a></li>  
                    </div>
                </fieldset>
            </form>
        </div>

        <br/>
        <br/>
        <footer class="page-footer font-small blue load-hidden">
            <div class="footer-copyright text-center py-3"> <a href="../../../index.php">© 2019 Copyright: Ismael Heras Salvador</a> 
                <a class="volver" href="MtoDepartamentosmysPDOTema4.php">volver CRUD</a>
            </div>
        </footer> 
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>

















