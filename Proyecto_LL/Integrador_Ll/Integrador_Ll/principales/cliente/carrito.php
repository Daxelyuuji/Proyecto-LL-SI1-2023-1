<?php
session_start();
require_once '../Controller/conexion/configuracion.php';
require_once('../vendor/autoload.php'); // Ruta al archivo de autoload de Stripe
require_once '../Model/M_Pago.php';
require_once '../fpdf/fpdf.php';

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}
if (isset($_POST['eliminar'])) {
    $producto_id = $_POST['producto_id'];

    // Eliminar el producto del carrito en PHP
    foreach ($_SESSION['carrito'] as $key => $producto) {
        if ($producto['id'] === $producto_id) {
            unset($_SESSION['carrito'][$key]);
            break;
        }
    }

    // Eliminar el producto del carrito en la tabla carrito de MySQL
    $stmt = $conn->prepare("DELETE FROM carrito WHERE producto_id = ?");
    $stmt->bind_param("i", $producto_id);
    $stmt->execute();
    $stmt->close();
}

if (isset($_POST['agregar_carrito'])) {
    $producto_id = $_POST['producto_id'];
    $producto_nombre = $_POST['producto_nombre'];
    $producto_precio = floatval($_POST['producto_precio']); // Convertir a número
    $cantidad = intval($_POST['cantidad']); // Convertir a número

    $producto = array(
        'id' => $producto_id,
        'nombre' => $producto_nombre,
        'precio' => $producto_precio,
        'cantidad' => $cantidad
    );

    array_push($_SESSION['carrito'], $producto);

    // Restar la cantidad comprada del stock del producto en la base de datos
    $stmt = $conn->prepare("UPDATE productoss SET stock = stock - ? WHERE id = ?");
    $stmt->bind_param("ii", $cantidad, $producto_id);
    $stmt->execute();
    $stmt->close();

    // Redireccionar al catálogo de productos
    header("Location: productos.php");
    exit();
}

if (isset($_POST['eliminar'])) {
    $producto_id = $_POST['producto_id'];

    foreach ($_SESSION['carrito'] as $key => $producto) {
        if ($producto['id'] === $producto_id) {
            unset($_SESSION['carrito'][$key]);
            break;
        }
    }
}

if (isset($_POST['editar'])) {
    $producto_id = $_POST['producto_id'];
    $cantidad = intval($_POST['cantidad']);

    foreach ($_SESSION['carrito'] as &$producto) {
        if ($producto['id'] === $producto_id) {
            $producto['cantidad'] = $cantidad;
            break;
        }
    }
}

if (!empty($_SESSION['carrito'])) {
    // Preparar la consulta SQL
    $stmt = $conn->prepare("INSERT INTO carrito (producto_id, producto_nombre, producto_precio, cantidad) VALUES (?, ?, ?, ?)");

// Recorrer los productos del carrito e insertarlos en la tabla
    foreach ($_SESSION['carrito'] as $producto) {
        $producto_id = $producto['id'];
        $producto_nombre = $producto['nombre'];
        $producto_precio = $producto['precio'];
        $cantidad = $producto['cantidad'];

        // Asignar los valores a los parámetros de la consulta
        $stmt->bind_param("issi", $producto_id, $producto_nombre, $producto_precio, $cantidad);

        // Ejecutar la consulta
        $stmt->execute();
    }
    $stmt->close();
// Cerrar la consulta
}
$conn->close();
// Vaciar el carrito
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
                                        <input type="text" class="form-control" id="nombre" name="nombre" required maxlength="40" >
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
                                <script >
                                    function mensaje(){
                                        alerta("Complete el Formulario en segundo paso");
                                    }
                                </script>
                                <hr/>
                                <div class="step__footer">
                                    <button type="button" class="step__button step__button--back" data-to_step="2" data-step="3">Regresar</button>
                                    <button type="submit" class="step__button step__button--back" id="registrarnuevo" onclick="mensaje()">Enviar</button>                        
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                    const nextButtons = document.querySelectorAll('.step__button--next');
                    nextButtons.forEach(function(button) {
                    button.addEventListener('click', function(event) {
                    const currentStep = parseInt(this.dataset.step);
                    const nextStep = parseInt(this.dataset.to_step);
                    const form = document.querySelector('.form-register');
                    // Check if Step 2 is completed
                    if (currentStep === 2 && !isStep2Completed(form)) {
                    event.preventDefault();
                    alert('Debe completar el paso 2 del formulario para poder avanzar al tercer paso.');
                    } else {
                    showStep(nextStep);
                    }
                    });
                    });
                    function isStep2Completed(form) {
                    const nombre = form.querySelector('#nombre').value.trim();
                    const correo = form.querySelector('#correo').value.trim();
                    const direccion = form.querySelector('[name="direccion"]').value.trim();
                    return nombre !== '' && correo !== '' && direccion !== '';
                    }

                    function showStep(step) {
                    const steps = document.querySelectorAll('.step');
                    steps.forEach(function(stepElement) {
                    if (parseInt(stepElement.dataset.step) === step) {
                    stepElement.classList.add('active');
                    } else {
                    stepElement.classList.remove('active');
                    }
                    });
                    const progressBarOptions = document.querySelectorAll('.progressbar__option');
                    progressBarOptions.forEach(function(option, index) {
                    if (index + 1 === step) {
                    option.classList.add('active');
                    } else {
                    option.classList.remove('active');
                    }
                    });
                    }
                    });
                </script>
            </div> 
        </main>

<?php include '../cliente/footer.php'; ?>
        <script src="../js/register.js" type="text/javascript"></script>

    </body>
</html>
