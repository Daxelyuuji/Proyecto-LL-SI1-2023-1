<?php
require_once('../vendor/autoload.php'); // Ruta al archivo de autoload de Stripe

\Stripe\Stripe::setApiKey('sk_test_51NIoQLDQUPQBscfReiDm3nN9PHe2HtIDXQZfdiwcUJwKPFUuWQgLNqC18SBeK5kekAhx8lZNK9jcNhNWeeDwq5lg0083jP1BKv');

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario de pago
    $token = $_POST['stripeToken'];
    $cantidad = $_POST['cantidad'];
    $correo = $_POST['correo'];

    // Crea el cargo en Stripe
    try {
        $charge = \Stripe\Charge::create([
                    'amount' => $cantidad * 100, // La cantidad debe estar en centavos o la moneda correspondiente
                    'currency' => 'usd', // La moneda del cargo
                    'description' => 'Pago de prueba',
                    'source' => $token,
                    'receipt_email' => $correo // Opcional: envía un recibo por correo electrónico al cliente
        ]);

        // Procesa la respuesta del cargo (éxito o error)
        if ($charge->status == 'succeeded') {
            // Pago exitoso, realiza las acciones necesarias (actualización de base de datos, envío de confirmaciones, etc.)
            $success = '¡Pago exitoso!';
        } else {
            // Pago fallido, muestra un mensaje de error o realiza las acciones necesarias
            $error = 'Error al procesar el pago: ' . $charge->failure_message;
        }
    } catch (\Stripe\Exception\CardException $e) {
        // Error con la tarjeta de crédito
        $error = 'Error con la tarjeta de crédito: ' . $e->getMessage();
    } catch (\Stripe\Exception\RateLimitException $e) {
        // Error de límite de tasa
        $error = 'Error de límite de tasa: ' . $e->getMessage();
    } catch (\Stripe\Exception\InvalidRequestException $e) {
        // Error de solicitud inválida
        $error = 'Error de solicitud inválida: ' . $e->getMessage();
    } catch (\Stripe\Exception\AuthenticationException $e) {
        // Error de autenticación
        $error = 'Error de autenticación: ' . $e->getMessage();
    } catch (\Stripe\Exception\ApiConnectionException $e) {
        // Error de conexión a la API
        $error = 'Error de conexión a la API: ' . $e->getMessage();
    } catch (\Stripe\Exception\ApiErrorException $e) {
        // Error genérico de la API de Stripe
        $error = 'Error de la API de Stripe: ' . $e->getMessage();
    }
}
?>