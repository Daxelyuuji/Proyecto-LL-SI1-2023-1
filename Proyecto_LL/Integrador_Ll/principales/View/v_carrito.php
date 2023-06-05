<!DOCTYPE html>
<!--Autor: Roy Torres-->

<html>
    <head>
        <title>Minimarket Llauce &COPY;</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../Imagenes/favicon-32x32.png">
        <link href="../CSS/Principal.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/carrito.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body>
        <?php require_once '../View/v_hadder.php'; ?>
        <div class="pasos">
            <center>
                <form class="form-register" method="GET" action="#">
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
                                <h2 class="step__title">Tu pedido</h2>
                            </div>
                            <div class="carrito_producto">

                            </div>
                            <div class="step__footer">
                                <button type="button" class="step__button step__button--next" data-to_step="2" data-step="1" id="siguiente">Siguiente</button>
                            </div>
                        </div>

                        <div class="step" id="step-2">
                            <div class="step__header">
                                <h2 class="step__title">Información del Comprador</h2>
                            </div>
                            <div class="step__body">
                                <label for="nombre">Nombre Completo</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required maxlength="40">
                            </div>
                            <div class="step__body">
                                <label for="distrito">Distrito</label>
                                <input type="text" class="form-control" id="distrito" name="distrito" required maxlength="9">
                            </div>
                            <div class="step__body">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" name="direccion" required>
                            </div>
                            <div class="step__body">
                                <label for="tipo_envio">Tipo de Envío</label><br>
                                <select class="form-control" name="tipo_envio">
                                    <option value="Recojo">Recojo en tienda</option>
                                    <option value="Domicilio" selected="selected">Domicilio</option>
                                </select>
                            </div>
                            <div class="step__footer">
                                <button type="button" class="step__button step__button--back" data-to_step="1" data-step="2">Regresar</button>
                                <button type="button" class="step__button step__button--next" data-to_step="3" data-step="2">Siguiente</button>
                            </div>
                        </div>

                        <div class="step" id="step-3">
                            <div class="step__header">
                                <h2 class="step__title">Detalles de la tarjeta</h2>
                            </div>
                            <div class="step__body">
                                <label for="nombre_t">Nombre que esta en la tarjeta</label>
                                <input type="text" class="form-control"   name="nombre_t" required>
                            </div>
                            <div class="step__body">
                                <label for="numero_t">Numero de tarjeta</label>
                                <input type="number" class="form-control"  name="numero_t" required>
                            </div>
                            <div class="step__body">
                                <label for="date_exit">Ficha de Expiracion</label>
                                <input type="date" class="form-control"   name="date_exit" required>
                            </div>
                            <div class="step__body">
                                <label for="cvv">CVV</label>
                                <input type="number" class="form-control"  name="cvv" required>
                            </div>
                            <div class="step__body">
                                <label>Total</label>

                            </div>
                            <div class="step__footer">
                                <button type="button" class="step__button step__button--back" data-to_step="2" data-step="3">Regresar</button>
                                <button type="submit" class="step__button step__button--back" id="registrarnuevo">Enviar</button>                        
                            </div>
                        </div>
                    </div>
                </form>
            </center>

            <br/>
            <br/>
        </div>
        <?php require_once '../View/v_footer.php'; ?>
        <script src="../js/carrito.js" type="text/javascript"></script>
    </div>
</body>
</html>
