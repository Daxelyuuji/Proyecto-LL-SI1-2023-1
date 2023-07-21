<?php
require_once('../vendor/autoload.php'); // Ruta al archivo de autoload de Stripe
require_once '../Model/M_Pago.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pago con Stripe</title>
        <script src="https://js.stripe.com/v3/"></script>
    </head>
    <body>
        <h1>Pago con Stripe</h1>

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
            <button type="submit">Pagar</button>
             <?php if (!empty($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <p style="color: green;"><?php echo $success; ?></p>
        <?php endif; ?>
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
    </body>
</html>
