<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Ejercicio 7PDOxml</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../WEBBROOT/css/estilos8.css">
    </head>
    <body>
        <?php
//        /**
//          @author Ismael Heras Salvador
//          @since 12/11/2019
//         */

        /*
          Importacion XML
         *          */

        require '../config/constantes.php'; //requerimos las constantes para la conexion
        try {
            //conexion a la base de datos
            $miDB = new PDO(MAQUINA, USUARIO, PASSWD);
            //para poder utilizar las excepciones.
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //try cacth por si falla la conexion.
        } catch (PDOException $excepcionPDO) {
            die("Error al conectarse a la base de datos");
        }
        try {
            echo "<h2>" . "Conexion PDO OK" . "</h2>";
            echo '<br>';

            
            //le ponemos fecha al archivo
            $fecha = new DateTime();
            $nombreArchivo = $fecha->format("Ymd") . "exportarDepartamentos.xml";

            //realizamos la insercion 
            $sql = "INSERT INTO Departamentos VALUES (:cod, :desc)";
            //realizamos la consulta preparada
//            $consulta = $$miDB->prepare($sql);
            //creamos un nuervo archivo de tipo Dom.
            $archivoXML = new DOMDocument();
            //cargamos el archivo en la ruta especificada.
            $archivoXML->load("../tmp/$nombreArchivo");


            //seleccionamos los nodos del archivo en el nodo principal
            $cargaNODO = $archivoXML->getElementsByTagName("departamento");
            
            //con este foreach creamos la estructura del archivo XML.
            foreach ($cargaNODO as  $nodo) {
                echo "$nodo->valorNODO \n";
            }

            foreach ($archivoXML as $departamento) {
                $insercion->execute(array(':cod' => $departamento->children()[0], ':desc' => $departamento->children()[1]));
                 $departamento->children()[0];
            }

            echo "<h2>" . "Fichero XML cargado exitosamente en nuestra base de datos" . "</h2>";
            echo '<br>';
            //enlace para comprobar los registros cargados en la BD
            echo '<a href="ejercicio2PDO.php">Pulse aqui para comprobar los registros cargados en nuestra base de datos</a>';
            //control de excepciones con la clase PDOException
        } catch (PDOException $miExceptionPDO) {
            echo "<h1>Se ha producido un error</h1>";
            $miDB->rollBack(); //Reviertimos la transacción actual
            if ($miExceptionPDO->getCode() == 23000 || $miExceptionPDO->getCode() == 2002) {
                echo "<h3>Error, Duplicado de clave primaria</h3>";
            }
        } finally {
            //cierre de conexion
            unset($miDB);
        }
        ?>
    </body>
</html>
