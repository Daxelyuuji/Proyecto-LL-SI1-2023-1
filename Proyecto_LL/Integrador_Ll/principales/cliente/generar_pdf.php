<?php

session_start();
require_once '../Controller/conexion/configuracion.php';
require_once('../vendor/autoload.php'); // Ruta al archivo de autoload de Stripe
require_once '../Model/M_Pago.php';
require_once '../fpdf/fpdf.php';
require_once '../Model/M_correo_carrito.php';

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Obtener el nombre y la dirección de las variables de sesión
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
$direccion = isset($_SESSION['direccion']) ? $_SESSION['direccion'] : '';

// Obtener el número de boleta actual y aumentar el contador
$numBoleta = isset($_SESSION['numBoleta']) ? $_SESSION['numBoleta'] + 1 : 1;
$_SESSION['numBoleta'] = $numBoleta;

require_once '../fpdf/fpdf.php';
header('Content-Type: text/html; charset=utf-8');
// Crear una instancia de la clase FPDF
$pdf = new FPDF();

// Agregar una página al PDF
$pdf->AddPage();

// Configurar la fuente y el tamaño del texto
$pdf->SetFont('Arial', 'B', 16);

// Agregar el logo de la empresa
$pdf->Image('logo.jpeg', 10, 15, 30); // Ajusta la ruta y las coordenadas según sea necesario
// Agregar la información de la empresa
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'MINIMARKET "LLAUCE"', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'R.U.C.: 40123456789 ', 0, 1, 'C');
$pdf->Cell(0, 10, 'Direccion: Los Olivos - Lima', 0, 1, 'C');
$pdf->Cell(0, 10, 'Telefono: 972 087 792', 0, 1, 'C');
$pdf->Cell(0, 10, 'Boleta electronica de Ventas', 0, 1, 'C');

// Agregar la fecha y el número de boleta
$pdf->Cell(0, 10, 'Fecha: ' . date('d/m/Y'), 0, 1);
$pdf->Cell(0, 10, 'Numero de Boleta: ' . str_pad($numBoleta, 3, '0', STR_PAD_LEFT), 0, 1);

$pdf->Ln(10); // Agregar un espacio después de los datos del cliente y la boleta
// Configurar la fuente y el tamaño del texto para los detalles del carrito
$pdf->SetFont('Arial', '', 12);

// Crear la tabla con encabezados
$pdf->SetFillColor(192, 192, 192); // Establecer el color de fondo cenizo (RGB: 192, 192, 192)
$pdf->Cell(60, 10, 'Producto', 1, 0, 'C', true); // Agregar el parámetro "true" para activar el relleno
$pdf->Cell(20, 10, 'Cantidad', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Precio', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Subtotal', 1, 0, 'C', true);
$pdf->Ln(); // Agregar una nueva línea después de los encabezados
 // Agregar una nueva línea después de los encabezados

$total = 0; // Variable para almacenar el total
// Recorrer los productos del carrito y agregarlos a la tabla
foreach ($_SESSION['carrito'] as $producto) {
    $pdf->Cell(60, 10, $producto['nombre'], 1);
    $pdf->Cell(20, 10, $producto['cantidad'], 1);
    $pdf->Cell(40, 10, 'S/ ' . $producto['precio'], 1);
    $subtotal = $producto['precio'] * $producto['cantidad'];
    $pdf->Cell(40, 10, 'S/ ' . $subtotal, 1);
    $pdf->Ln(); // Agregar una nueva línea después de cada registro
    $total += $subtotal; // Sumar el subtotal al total
}

$igv = $total * 0.18;
$importeFinal = $total + $igv;
$pdf->Cell(0, 10, '', 0, 1, 'C');
$pdf->Cell(0, 10, 'Total: S/ ' . $total, 0, 1, 'C');
$pdf->Cell(0, 10, 'IGV (18%): S/ ' . $igv, 0, 1, 'C');
$pdf->Cell(0, 10, 'Importe Final: S/ ' . $importeFinal, 0, 1, 'C');

// Agregar el sello de "Pagado"
$pdf->Image('https://png.pngtree.com/png-vector/20230227/ourmid/pngtree-paid-stamps-png-image_6621591.png', 150, $pdf->GetY(), 40); // Ajusta la ruta y las coordenadas según sea necesario
// Agregar la información de correo
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 10, 'Para mayor informacion, contacte con nosotros:', 0, 1, 'C');
$pdf->Cell(0, 10, 'Correo: minimarketllauce14@gmail.com', 0, 1, 'C');

// Generar el PDF
$pdf->Output('carrito.pdf', 'I');
?>
