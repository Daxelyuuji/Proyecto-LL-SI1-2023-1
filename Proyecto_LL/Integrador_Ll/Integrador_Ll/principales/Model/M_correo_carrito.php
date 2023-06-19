<?php


include_once '../Controller/mysql.php';

//Arreglado el código source
# var_dump($registros);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../View/phpMailer/PHPMailer.php';
require '../View/phpMailer/Exception.php';
require '../View/phpMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $cliente = $_POST['nombre'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $total = $_POST['total'];
    
    
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
            . '<br>¡Gracias por realizar tu compra mediante nuestra pagina WED!<br>Tu pedido ha sido revido correctamente. Gracias<br>'
            . '<br>'
            . '<br>'
            . '----------------------- Detalle Pedido ----------------<br>'
            . '<br>'
            . 'NOMBRE           : ' . $cliente . '<br>'
            . 'DIRECCIÓN DE PEDIDO: ' . $direccion . '<br>'
            . 'TU BOLETA PUEDES DESCARGARLA LUEGO DE CANCELAR LA COMPRA CON VISA'
            . '<br>'
            . '-------------------------------------------------------------------<br>'
            . '<br>'
            . 'Resumen de pedido:'
            
            
            . 'Atentamente,<br>Equipo de la tienda');

    if ($mail->send()) {
        echo 'El correo se ha enviado correctamente.';
    } else {
        echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
    }
}
?>
