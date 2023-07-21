<?php

session_start();

require_once '../Controller/conexion/configuracion.php';
require_once('../vendor/autoload.php'); // Ruta al archivo de autoload de Stripe
require_once '../Model/M_Pago.php';
require_once '../fpdf/fpdf.php';
require_once '../Model//M_carrito.php';

?>

<!DOCTYPE html>
<?php require_once '../Controller/conexion/configuracion.php'; ?>
<html lang="es">
    <head>
        <title> Carrito procesar&copy;</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../Imagenes/favicon-32x32.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href="../CSS/carrito_procesar.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/Principal.css" rel="stylesheet" type="text/css"/>
        <script src="https://js.stripe.com/v3/"></script>
        <style>
            .card {
                margin-bottom: 20px;
            }
            body {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }
            main {
                flex: 1;
            }
            .boton {
                display: inline-block;
                background-color: #4CAF50;
                color: white;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                border-radius: 5px;
                border: none;
                cursor: pointer;
                font-size: 16px;
            }

            .boton:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body style="background-color: khaki">
        <?php require_once '../cliente/header.php'; ?>
        <main>
            <div class="root">

                <br/>
                <form class="form-register" method="post" action="../Model/M_correo_carrito.php">
                    <h2 style="text-align: center; color: #FFA500">Carriro de compras</h2>
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
                                <h2 class="step__title">Productos Selecionados <small>( Paso 1)</small></h2>
                            </div>
                            <br/>
                            <hr/>
                            <div style="display: flex; align-items: flex-start;">
                                <?php
                                if (empty($_SESSION['carrito'])) {
                                    echo "<p>No hay productos en el carrito.</p>";
                                } else {
                                    $total = 0;
                                    ?>
                                    <div>
                                        <img src="../Imagenes/carrito.jpeg" style="width: 400px; height: 300px">
                                    </div>
                                    <table class="table" style="text-align: center; margin-left: 20px;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Producto</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Precio</th>
                                                <th scope="col">Subtotal</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($_SESSION['carrito'] as $producto) {
                                                $subtotal = $producto['precio'] * intval($producto['cantidad']);
                                                $total += $subtotal;
                                                ?>
                                                <tr>
                                                    <td><?php echo $producto['nombre']; ?></td>
                                                    <td><?php echo $producto['cantidad']; ?></td>
                                                    <td>S/ <?php echo $producto['precio']; ?></td>
                                                    <td>S/ <?php echo $subtotal; ?></td>
                                                    <td>
                                                        <form action="carrito.php" method="POST">
                                                            <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                                                            <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
                                                <td><input style="border: 0px; font-weight: bold; text-align: left;" type="text" class="form-control" id="total" name="total" value="<?php echo 'S/'; ?> <?= $total, 2 ?>" required></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            </div>
                            <hr/>
                            <div class="step__footer">
                                <button type="button" class="step__button step__button--next" data-to_step="2" data-step="1" id="siguiente" style="background-color: #FFA500">Siguiente</button>
                            </div>
                        </div>
                        <div class="step" id="step-2">
                            <div class="step__header">
                                <h2 class="step__title">Información de Cliente <small>( Paso 2)</small></h2>
                            </div>
                            <br/>
                            <div style="display: flex; align-items: flex-start;">
                                <br/>
                                <div style="width: 10%; padding: 0px 10px;">

                                </div>
                                <div style="width: 40%; padding: 0px 20px">
                                    <div class="step__body" >
                                        <label for="nombre" style="color: blue">Nombre Completo</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" required maxlength="40">
                                    </div>
                                    <div class="step__body" style="color: blue">
                                        <label for="correo">Correo Electroncico</label>
                                        <input type="email" class="form-control" id="correo" name="correo" required>
                                    </div>
                                    <div class="step__body" style="color: blue">
                                        <label for="direccion">Dirección</label>
                                        <input type="text" class="form-control" name="direccion" required>
                                    </div>
                                    <div class="step__body">
                                        <label for="tipo_envio" style="color: blue">Tipo de Envío</label><br>
                                        <select class="form-control" name="tipoenvio">
                                            <option value="Recojo a tienda" >Recojo en tienda</option>
                                            <option value="Domicilio" selected="selected">Domicilio</option>
                                        </select>
                                    </div>
                                </div>
                                <div style="width: 40%; padding: 0px 10px;">
                                    <br/>
                                    <br/>
                                    <img src="../Imagenes/usuario.jpeg" style="width: 100%; height: auto;">
                                </div>
                            </div>
                            <hr/>
                            <div class="step__footer">
                                <button type="button" class="step__button step__button--back" data-to_step="1" data-step="2">Regresar</button>
                                <button type="button" class="step__button step__button--next" data-to_step="3" data-step="2">Siguiente</button>
                            </div>
                        </div>
                        <div class="step" id="step-3" >
                            <div class="step__header">
                                <h2 class="step__title">Metodos de pago <small>(Paso 3)</small></h2>
                                <br/>
                                 <p>Puedes cancelar con targeta visa o cancelar en tienda</p>
                                <div style="display: flex; align-items: flex-start; padding: 0px 20px">
                                    <br/>
                                    <div style="width: 5%; padding: 0px 20px;">
                                    </div>
                                    <div style="width: 40%; padding: 0px 20px;">
                                        <br/>
                                        <h3>Pago Con Yape</h3>
                                        <br/>
                                        <img src="../Imagenes/yape.jpeg" style="width: 100%; height: auto;">
                                        <center> <a href="funciona.php" class="boton" >PAGAR AHORA</a></center>
                                    </div>
                                    <div style="width: 10%; padding: 0px 20px;">
                                    </div>
                                    <div style="width: 40%; padding: 0px 20px;">
                                        <br/>
                                        <h3>Pago con tarjeta (VISA)</h3>
                                        <br/>
                                        <img src="../Imagenes/visa.jpeg" style="width: 100%; height: auto;">
                                        <center> <a href="funciona.php" class="boton" >PAGAR AHORA</a></center>
                                    </div>
                                </div>
                                <br/>

                                <hr/>
                                <div class="step__footer">
                                    <button type="button" class="step__button step__button--back" data-to_step="2" data-step="3">Regresar</button>
                                    <script>
                                    function validar(){
                                        alert("Se a registrado su pedido exitosamente y se le ha enviado un notificacion a su gmail");
                                    }
                                    </script>
                                    <button type="submit" class="step__button step__button--back" id="registrarnuevo" onclick="validar()">Enviar</button>                        
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div> 
        </main>
        <script>
            // Obtener los botones de siguiente y los pasos del formulario
            var siguienteBtns = document.getElementsByClassName('step__button--next');
            var steps = document.getElementsByClassName('step');

            // Agregar un controlador de eventos clic a cada botón de siguiente
            Array.from(siguienteBtns).forEach(function (btn) {
                btn.addEventListener('click', function () {
                    // Obtener el número de paso actual y el número de paso al que se quiere avanzar
                    var currentStep = parseInt(btn.getAttribute('data-step'));
                    var nextStep = parseInt(btn.getAttribute('data-to_step'));

                    // Realizar validación del paso 2 si se quiere avanzar al paso 3
                    if (currentStep === 2 && nextStep === 3) {
                        var nombre = document.getElementById('nombre');
                        var correo = document.getElementById('correo');
                        var direccion = document.getElementsByName('direccion')[0];

                        // Verificar si los campos del paso 2 están completados
                        if (nombre.value === '' || correo.value === '' || direccion.value === '') {
                            var currentStepTemp = currentStep; // Almacenar el valor actual de currentStep
                            alert('Por favor, completa todos los campos del paso 2 antes de avanzar.');
                            currentStep = currentStepTemp; // Restaurar el valor de currentStep al valor almacenado

                            return; // Detener el avance al paso 3
                        } else {
                            // Continuar con el avance al paso 3
                            currentStep++;
                            showStep(currentStep);
                        }
                    }

                    // Mostrar el siguiente paso
                    steps[currentStep - 1].classList.remove('active');
                    steps[nextStep - 1].classList.add('active');
                });
            });
        </script>
         <?php unset($_SESSION['carrito']);?>
        <?php include '../cliente/footer.php'; ?>
        <script src="../js/register.js" type="text/javascript"></script>
       
    </body>
</html>
