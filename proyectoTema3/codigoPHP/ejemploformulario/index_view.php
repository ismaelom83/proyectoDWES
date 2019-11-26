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
        <h1>Formulario de PHP  de Ismael para DAWS</h1>
        <div class="wrap">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre:" value="<?php if(!$enviado && isset($nombre)) echo $nombre ?>">
                <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo:" value="<?php if(!$enviado && isset($correo)) echo $correo?>">
                <textarea name="mensaje" id="mensaje" class="form-control" placeholder="Mensaje:"><?php if(!$enviado && isset($mensaje)) echo $mensaje?></textarea>

                <?php if (!empty($errores)): ?>
                    <div class="alert error">
                        <?php echo $errores; ?>
                    </div>
                <?php elseif ($enviado): ?>
                    <div class="alert success">
                        <p>Enviado Correctamente</p>
                    </div>
                <?php endif; ?>
                <input type="submit" name="submit" value="Enviar Correo" class="btn btn-primary">
            </form>
        </div>
    </body>
</html>


