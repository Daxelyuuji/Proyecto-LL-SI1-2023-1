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
    $total = $_POST['total'];
    $igv = $_POST['igv'];
    $importe = $_POST['importe'];
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
    $mail->Subject = 'HOLA ' . $cliente;
    $mail->Body = 'TU PEDIDO SE ESTA PROCESANDO.';
    $mail->msgHTML('Estimado ' . $cliente . ',<br>'
            . '<br>¡Gracias por realizar tu compra!<br>Tu pedido ha sido confirmado y será procesado próximamente.<br>'
            . '<br>'
            . '<br>'
            . '----------------------- Detalle Pedido ----------------<br>'
            . '<br>'
            . 'NOMBRE          S/: ' . $cliente . '<br>'
            . 'SUBTOTAL        S/: ' . $total . '<br>'
            . 'IGV             S/: ' . $igv . '<br>'
            . 'IMPORTE A PAGAR S/: ' . $importe . '<br>'
            . '<br>'
            . '-------------------------------------------------------------------<br>'
            . '<br>'
            . 'Atentamente,<br>Equipo de la tienda');

    if ($mail->send()) {
        echo 'El correo se ha enviado correctamente.';
        // Eliminar la tabla de productos en MySQL
        $sql = "DELETE FROM canasta";
        if ($conn->query($sql) === TRUE) {
            
        } else {
            echo ' ' . $conn->error;
        }
    } else {
        echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
    }
}
?>
