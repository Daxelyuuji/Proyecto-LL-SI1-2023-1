<?php

include_once '../Model/M_validar.php';
include_once '../Controller/mysql.php';
include_once '../Model/validar-cana.php';

//Arreglado el código source
# var_dump($registros);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './phpMailer/PHPMailer.php';
require './phpMailer/Exception.php';
require './phpMailer/SMTP.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $cliente = $_POST['cliente'];
    $correo = $_POST['correo'];

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'minimarketllauce14@gmail.com';
    $mail->Password = 'cqgtkvzwumbbqoki';

//$mail->setFrom('josesito0519rs@gmail.com', 'Jose');
    $mail->addAddress($correo, $cliente);
    $mail->Subject = 'HOLA CLIENTE';
    $mail->Body = 'MENSAJE RECIBIDO.';
    $mail->msgHTML('Estimado ' . $cliente . ',<br><br>¡Gracias por realizar tu compra!<br>Tu pedido ha sido confirmado, El monto es S/23.50 .<br><br>Atentamente,<br>Equipo de la tienda');

    if ($mail->send()) {
        echo 'El correo se ha enviado correctamente.';
    } else {
        echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
    }
}
?>
