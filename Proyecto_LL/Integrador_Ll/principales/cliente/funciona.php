<?php
require_once('../vendor/autoload.php'); // Ruta al archivo de autoload de Stripe
require_once '../Model/M_Pago.php';
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
            <br/>
            <h1 style="text-align: center">Pasarela de Pago</h1>
            <br/>
            <div style="display: flex; align-items: flex-start;">
                <br/>
                <div style="width: 11%; padding: 0px 10px;">

                </div>
                <div style="width: 40%; padding: 0px 20px; background-color: #F1C40F">
                    <br/>
                    <h5 style="text-align: center">Complete su información</h5>
                    <hr/>
                    <br/>
                    <form action="" method="POST">
                        <label for="cantidad">Cantidad:</label>
                        <input type="text" name="cantidad" id="cantidad" required>
                        <br><br>
                        <label for="correo">Correo electrónico:</label>
                        <input type="email" name="correo" id="correo" required>
                        <br><br>
                        <div id="card-element">
                            <!-- Elemento de la tarjeta de crédito de Stripe -->
                        </div>
                        <br><br>
                        <center><button type="submit" style="padding: 4px 15px; border: 0px; background-color: blue; color: white;">Pagar</button></center>
                        <?php if (!empty($error)): ?>
                            <p style="color: red;"><?php echo $error; ?></p>
                        <?php endif; ?>
                        <?php if (!empty($success)): ?>
                            <p style="color: green;"><?php echo $success; ?></p>
                            <br/>
                            <center><a href="generar_pdf.php" target="_blank" class="boton">Descargar PDF</a></center>
                        <?php endif; ?>
                        <br/>
                    </form>
                    <script>
                        var stripe = Stripe('pk_test_51NIoQLDQUPQBscfR2tzBP1g3e82iQIshNgewvollq91tjBejjRY9MLcE8mkAAYYLm9MWPJZEp2acyswBeqE565Ki00qUZ8Qh0E');
                        var elements = stripe.elements();
                        var cardElement = elements.create('card');
                        cardElement.mount('#card-element');

                        var form = document.querySelector('form');
                        form.addEventListener('submit', function (event) {
                            event.preventDefault();

                            stripe.createToken(cardElement).then(function (result) {
                                if (result.error) {
                                    // Manejar el error en caso de que ocurra durante la generación del token
                                    console.error(result.error.message);
                                } else {
                                    // Agregar el token generado al campo hidden del formulario
                                    var tokenInput = document.createElement('input');
                                    tokenInput.setAttribute('type', 'hidden');
                                    tokenInput.setAttribute('name', 'stripeToken');
                                    tokenInput.setAttribute('value', result.token.id);
                                    form.appendChild(tokenInput);

                                    // Enviar el formulario con el token incluido
                                    form.submit();
                                }
                            });
                        });

                    </script>
                </div>
                <div style="width: 40%; padding: 0px 20px; ">
                    <img src="../Imagenes/visa.jpeg" style="width: 100%; height: auto;">

                </div>
            </div>        
            
        </main>
        <br/><!-- comment -->
        <br/>
        <?php include '../cliente/footer.php'; ?>
        <script src="../js/register.js" type="text/javascript"></script>

    </body>
</html>
