
<!--autor ismael-->

<!--ejercici21
Construir un formulario para recoger un cuestionario realizado a una persona y enviarlo a una página Tratamiento.php para que muestre
las preguntas y las respuestas recogidas-->

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
        <div class="wrap">
        
            <form action="tratamiento.php" method="post">
               
                 <input type="text" name="numero1" id="numero1" class="form-control" placeholder="numero1:" value="">
                 //input que pide el segundo numero.
                 <input type="text" name="numero2" id="numero2" class="form-control" placeholder="numero2:" value="">
                 
                <input type="submit" name="submit" value="Enviar Correo" class="btn btn-primary">
            </form>
        </div>
    </body>
</html>






