<!DOCTYPE html>
<html lang="es">
    <head>
        <title> Registrar Cliente &copy;</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../Imagenes/favicon-32x32.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href="../CSS/register.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/Principal.css" rel="stylesheet" type="text/css"/>
    </head>
    <body >
        <?php require_once './v_hadder.php'; ?>
        <!-- Formulario -->
        <div class="root">
            <br/>
            <br/>
            <form class="form-register" method="GET" action="../Model/M_registro_enviar.php">
                <br/>
                <br/>
                <div class="form-register__header">
                    <ul class="progressbar">
                        <li class="progressbar__option active">Paso 1</li>
                        <li class="progressbar__option">Paso 2</li>
                        <li class="progressbar__option">Paso 3</li>
                    </ul>
                    <br/>
                </div>
                <div class="form-register__body">
                    <div class="step active" id="step-1">
                        <div class="step__header">
                            <h2 class="step__title">Información de cuenta <small>( Paso 1)</small></h2>
                        </div>
                        <div class="step__body">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required maxlength="30">
                        </div>
                        <div class="step__body">
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" required maxlength="50">
                        </div>
                        <div class="step__body">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required maxlength="6">
                        </div>
                        <div class="step__footer">
                            <button type="button" class="step__button step__button--next" data-to_step="2" data-step="1" id="siguiente">Siguiente</button>
                        </div>
                    </div>

                    <div class="step" id="step-2">
                        <div class="step__header">
                            <h2 class="step__title">Información de Usuario <small>( Paso 2)</small></h2>
                        </div>
                        <div class="step__body">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" required maxlength="40">
                        </div>
                        <div class="step__body">
                            <label for="telefono">Telefono</label>
                            <input type="number" class="form-control" id="telefono" name="telefono" required maxlength="9">
                        </div>
                        <div class="step__body">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control"   name="direccion" required>
                        </div>
                        <div class="step__footer">
                            <button type="button" class="step__button step__button--back" data-to_step="1" data-step="2">Regresar</button>
                            <button type="button" class="step__button step__button--next" data-to_step="3" data-step="2">Siguiente</button>
                        </div>
                    </div>

                    <div class="step" id="step-3">
                        <div class="step__header">
                            <h2 class="step__title">Información de Usuario <small>(Paso 3)</small></h2>
                        </div>
                        <div class="step__body">
                            <label for="date_add">Fecha de Nacimiento</label>
                            <input type="date" class="form-control"   name="date_add" required>
                        </div>
                        <div class="step__body">
                            <label for="edad">Edad</label>
                            <input type="number" class="form-control"  name="edad" required>
                        </div>
                        <div class="step__body">
                            <div class="step__body">
                                <select class="step__input" name="genero">
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino" selected="selected">Femenino</option>
                                </select>
                            </div>

                        </div>
                        <div class="step__footer">
                            <button type="button" class="step__button step__button--back" data-to_step="2" data-step="3">Regresar</button>
                            <button type="submit" class="step__button step__button--back" id="registrarnuevo">Enviar</button>                        
                        </div>
                    </div>
                </div>
            </form>











        </div> 
        <?php if (isset($_GET["estado"])) : ?>
            <div class="alert alert-success">
                <?= $_GET["estado"] == "ok" ? "Mensaje enviado" : "Inténtelo más tarde" ?>
            </div>
        <?php endif; ?>
        <?php require_once './v_footer.php'; ?>
        <script src="../principales/js/register.js" type="text/javascript"></script>
    </body>
</html>
