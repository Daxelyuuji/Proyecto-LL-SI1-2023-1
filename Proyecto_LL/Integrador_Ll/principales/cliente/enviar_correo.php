<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './src/PHPMailer.php';
require './src/PHPMailer.php';
require './src/Exception.php';
require './src/SMTP.php';

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

// Instanciar el objeto PHPMailer
$mail = new PHPMailer();

try {
    // Configurar el servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'minimarketllauce14@gmail.com';
    $mail->Password = 'jennial28';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Configurar el remitente y el destinatario
    $mail->setFrom('minimarketllauce14@gmail.com', 'Llauce');
    $mail->addAddress('josesito0519rs@gmail.com', 'Jose');

    // Configurar el contenido del correo
    $mail->isHTML(true);
    
    $mail->Subject = 'Formulario de contacto';
    $mail->Body = "<h1>Formulario de contacto</h1>
                   <p><strong>Nombre:</strong> $nombre</p>
                   <p><strong>Correo electrónico:</strong> $correo</p>
                   <p><strong>Mensaje:</strong> $mensaje</p>";

    // Enviar el correo
    if ($mail->send()) {
        echo 'El correo se ha enviado correctamente';
    } else {
        echo 'Hubo un error al enviar el correo: ' . $mail->ErrorInfo;
    }
} catch (Exception $e) {
    echo 'Hubo una excepción al enviar el correo: ' . $e->getMessage();
}
?>
