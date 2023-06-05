<?php

require './phpMailer/PHPMailer.php';
require './phpMailer/SMTP.php';
require './phpMailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $cliente = $_POST['cliente'];
    $correo = $_POST['correo'];
    $igv = $_POST[''];

    // Configurar el servidor SMTP de Google
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->Username = 'minimarketllauce@gmail.com';
    $mail->Password = 'cqgtkvzwumbbqoki';

    // Componer el contenido del correo
    //$mail->setFrom('israelespinoza1298@gmail.com', 'Remitente');
    $mail->addAddress($correo, $cliente);
    $mail->Subject = 'Confirmación de compra';
    $mail->msgHTML('Estimado ' . $cliente . ',<br><br>¡Gracias por realizar tu compra!<br>Tu pedido ha sido confirmado y será procesado próximamente.<br><br>Atentamente,<br>Equipo de la tienda');

    // Enviar el correo
    if ($mail->send()) {
        echo 'El correo de confirmación ha sido enviado correctamente.';
    } else {
        echo 'Error al enviar el correo de confirmación: ' . $mail->ErrorInfo;
    }
}
?>
