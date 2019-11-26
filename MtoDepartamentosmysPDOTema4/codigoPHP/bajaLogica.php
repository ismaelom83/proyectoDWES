
<!DOCTYPE html>
<!--
                       <---------------------------BAJA LOGICA-------------------------------------------------->

<html>
    <head>
        <title>Baja Logica</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../WEBBROOT/css/estilosBorrar.css">
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
        <form action="" method="post">
            <h2>¿Deseas dar de baja logica el registro?</h2>
            <br>
            <div class='container3'>
                <input class='i1' type='submit' name='si' value='SI'/>
                <input class='i2' type='submit' name='no'  value='NO'/>
            </div>   
        </form>
        <?php
        /**
          @author Ismael Heras Salvador
          @since 20/11/2019
         */
        require '../core/validacionFormularios.php'; //importamos la libreria de validacion  
        require '../config/constantes.php'; //requerimos las constantes para la conexion
        try {
            //conexion a la base de datos
            $miDB2 = new PDO(MAQUINA, USUARIO, PASSWD);
            //mensaje por pantalla que todo ha ido bien
            $miDB2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //try cacth por si falla la conexion.
        } catch (PDOException $excepcionPDO) {
            die("Error al conectarse a la base de datos");
        }

        try {
              //consulta para optener el codigo y mostar solo el campo completo de ese codigo 
            $sql = "SELECT * FROM Departamento WHERE CodDepartamento LIKE '" . $_GET['codigo'] . "'";
            $resultadoConsulta = $miDB2->query($sql);

            //tabla para formatear la salida en formato tabla.
            echo '<table border="1">';
            echo '<tr>';
            echo '<th>Código</th>';
            echo '<th>Descripción</th>';
            echo '<th>FechaBaja</th>';
            echo '<th>VolumenNegocio</th>';
            echo '</tr>';


            //while que recorre los campos de la tabla
            while ($campoTabla = $resultadoConsulta->fetchObject()) {
                echo '<tr>';
                echo "<td>" . '<b>' . $campoTabla->CodDepartamento . "</td>" . "<td>" . '</b>' . '<b>' . $campoTabla->DescDepartamento .
                "</td>" . "<td>" . '</b>' . '<b>' . $comprobarfecha =  $campoTabla->FechaBaja .
                "</td>" . "<td>" . '<b>' . $campoTabla->VolumenNegocio . "</td>";
                echo '</tr>';
            }
            
            
        
                     
            
            //estructura de control que dice que si el boton si esta seteado borra el registro que le hemos pasado
            //y si no no lo borra.
             if(isset($_POST['si']) && $_POST['si'] == 'SI') {
                 //al,acenamos en una variable una marca timestamp.
                 $timesstamp = time();
                $sql = "UPDATE Departamento SET FechaBaja= '$timesstamp'  WHERE CodDepartamento LIKE '" . $_GET['codigo'] . "' ";           
                $resultadoConsulta = $miDB2->query($sql);
                echo '<br>';
                echo '<h2>Registro en Baja Logica</h2>';
                echo '<br>';
                 echo "<div class='volver1'><a  href='MtoDepartamentosmysPDOTema4.php'>ACEPTAR</a></div>";               
            }else if(isset($_POST['no']) && $_POST['no'] == 'NO'){
               echo '<br>';
                echo '<h2>Registro no modificado</h2>';
                echo '<br>';
                 echo "<div class='volver1'><a  href='MtoDepartamentosmysPDOTema4.php'>ACEPTAR</a></div>"; 
            }

              //control de excepciones con la clase PDOException
        } catch (PDOException $miExceptionPDO) {
            //mostrar mensaje de errores
            echo'Error: ' . $miExceptionPDO->getMessage();
            echo'Código de error: ' . $miExceptionPDO->getCode();
        } finally {
            //cierre de la conexion
            unset($miDB2);
        }
        ?>          
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

















