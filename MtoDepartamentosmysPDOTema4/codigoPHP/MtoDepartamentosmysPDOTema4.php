
<!DOCTYPE html>
<!--
                                   <---------------------------MANTENIMIENTO DEPARTAMENTOS TEMA 4-------------------------------------------------->

<html>
    <head>
        <title>Ejercicio MtoDepartamentosTema4</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../WEBBROOT/css/estilos4.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        <main>
            <?php
            /**
              @author Ismael Heras Salvador
              @since 18/11/2019
             */
            require '../core/validacionFormularios.php'; //importamos la libreria de validacion  
            require '../config/constantes.php'; //requerimos las constantes para la conexion
            $entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto
            //manejo del control de errores.
            //manejo de las variables del formulario
            $aFormulario ['DescDepartamentos'] = null;
            //hacemos la conexion a la base de datos.
            try {
                    //conexion a la base de datos
                    $miDB = new PDO(MAQUINA, USUARIO, PASSWD);
                    //mensaje por pantalla que todo ha ido bien
                    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $excepcionPDO) {
                    die("Error al conectarse a la base de datos");
                }
            ?>

            <!-enlaces a añadir departamento exportar he importar->
            <li><a href="añadirDepartamentos.php">AÑADIR</a></li>
            <li><a href="exportarDepartamentos.php">EXPORTAR</a></li>
            <li><a href="importarDepartamentos.php">IMPORTAR</a></li> 
            <br>
            <br>
            
            <!-formulario para buscar la descripcion de el departamento->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>                  
                    BUSCAR DEPARTAMENTOS: 
                    <input type="text" name="DescDepartamentos" placeholder="Introduce coincidencia con descripcion" id="buscar" value="<?php
                    if (isset($_POST['DescDepartamentos'])) {
                        echo $_POST['DescDepartamentos'];
                    }
                    ?>"> 
                    <input type="submit" name="enviar" value="Buscar" id="enviar">       

                </fieldset>
            </form> 
            <?php           
             if(isset($_POST['DescDepartamentos'])){//si esta definida la variable i no es null decimos que nuestro array es igual al valor que recogemos en el campo buscar 
                  $aFormulario ['DescDepartamentos']  = $_POST['DescDepartamentos'];
                }   
                //si el array es diferente de null entonces ejecutamos la consulta para decir si lo introducido en el campo
                // de buscar coincide con la descripcion de alguno de los registros.
            if ($aFormulario['DescDepartamentos'] !=null) {
                try {                
                    //instruccion sql para saber las coincidencias
                    $sql = "SELECT * FROM Departamento where DescDepartamento LIKE '%" . $aFormulario["DescDepartamentos"] . "%'";
                    $sentencia = $miDB->prepare($sql);
                    //ejecutamos la sentencia
                    $sentencia->execute();
                    //guardamos en una variable la instruccion sql
                    $resultadoConsulta = $miDB->query($sql);

                    //control de excepciones con la clase PDOException
                } catch (PDOException $miExceptionPDO) {
                    //mostrar mensaje de errores
                    echo'Error: ' . $miExceptionPDO->getMessage();
                    echo'Código de error: ' . $miExceptionPDO->getCode();
                } finally {

                    //cierre de la conexion
                    unset($miDB2);
                }
                //si no se ha introducido nada el el campo de busqueda (por defecto al principio) y pulsamos cuando
                //el input de buscar esta vacio nos ejecutara una consulta de todos los campos de la tabla(en este caso le hemos puesto un limit 7,es decir solo mostrara 7)
            } else {
                try {
                 
                    //select con un limit de 7 campos para mostar en la tabla.
                    $sql = "SELECT * FROM Departamento LIMIT 7";
                    $resultadoConsulta = $miDB->query($sql);
                    //control de excepciones con la clase PDOException
                } catch (PDOException $miExceptionPDO) {
                    //mostrar mensaje de errores
                    echo'Error: ' . $miExceptionPDO->getMessage();
                    echo'Código de error: ' . $miExceptionPDO->getCode();
                } finally {

                    //cierre de la conexion
                    unset($miDB);
                }
            }          
              //tabla para formatear la salida en formato tabla
                        echo '<table border="1">';
                        echo '<tr>';
                        echo '<th>Código</th>';
                        echo '<th>Descripción</th>';

                        echo '</tr>';
                        //muestra los registros que coinciden en la sentencia sql que sera dependiendo de el condicional de arriba 
                        //(si hay algo en el input ejecutara la sentencia de de comparar (like) y si no hara un select de todos los campos(limit 7)) y da formato
                        // a nuestra tabla con los td y tr de modificar borrar etc...
                        while ($campoTabla = $resultadoConsulta->fetchObject()) {
                            echo '<tr>';
                            echo "<td>" . '<b>' . $campoTabla->CodDepartamento . "</td>" . "<td>" . '</b>' . '<b>' . $campoTabla->DescDepartamento .
                            "</td>"  . "<td>" . '<b>' . "<a href='mostrarDepartamentos.php?codigo=$campoTabla->CodDepartamento'><img src='../WEBBROOT/img/ver2.png'/></a>" . "</td>" .
                            "</td>" . "<td>" . '<b>' . "<a href='modificarDepartamentos.php?codigo=$campoTabla->CodDepartamento'><img src='../WEBBROOT/img/modificar.png'/></a>" . "</td>" .
                            "</td>" . "<td>" . '<b>' . "<a href='borrarDepartamentos.php?codigo=$campoTabla->CodDepartamento'><img src='../WEBBROOT/img/borrar2.png'/></a>" . "</td>" .
                            "<td>" . '<b>' . "<a href='bajaLogica.php?codigo=$campoTabla->CodDepartamento'><img src='../WEBBROOT/img/flecha-hacia-abajo.png'/></a>" . "</td>".
                                   "<td>" . '<b>' . "<a href='ReavilitacionDepartamentos.php?codigo=$campoTabla->CodDepartamento'><img src='../WEBBROOT/img/flecha-hacia-arriba.png'/></a>" . "</td>";
                            echo '</tr>';
                        } 
            ?> 
            <br/>
            <br/>
            <footer class="page-footer font-small blue load-hidden">
                <div class="footer-copyright text-center py-3"> <a href="../../../index.php">© 2019 Copyright: Ismael Heras Salvador</a> 
                    <a class="volver" href="../../proyectoTema4/index.php">Salir Aplicacion</a>
                </div>
            </footer> 
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </main>
    </body>

</html>

















