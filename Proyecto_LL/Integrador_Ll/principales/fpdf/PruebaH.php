<?php

require('./fpdf.php');

class PDF extends FPDF {

    // Cabecera de página
    function Header() {
        if ($this->PageNo() === 1) {
            $this->Image('logo.jpeg', 270, 5, 20);
            $this->SetFont('Arial', 'B', 19);
            $this->Cell(95);
            $this->SetTextColor(0, 0, 0);
            $this->Cell(110, 15, utf8_decode('MINIMARKET "LLAUCE"'), 1, 1, 'C', 0);
            $this->Ln(3);
            $this->SetTextColor(103);

            /* UBICACION */
            $this->Cell(180);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(96, 10, utf8_decode("Ubicación: Calle Industrial N°1500 "), 0, 0, '', 0);
            $this->Ln(5);

            /* TELEFONO */
            $this->Cell(180);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(59, 10, utf8_decode("Teléfono: 972 087 792"), 0, 0, '', 0);
            $this->Ln(5);

            /* COREEO */
            $this->Cell(180);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(85, 10, utf8_decode("Correo: minimarketllauce14@gmail.com"), 0, 0, '', 0);
            $this->Ln(5);

            /* SUCURSAL */
            $this->Cell(180);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(85, 10, utf8_decode("Sucursal: San Martin "), 0, 0, '', 0);
            $this->Ln(10);
        }

        if ($this->PageNo() === 1 || $this->PageNo() === 1) {
            $this->SetTextColor(228, 100, 0);
            $this->Cell(100);
            $this->SetFont('Arial', 'B', 15);
            $this->Cell(100, 10, utf8_decode("REPORTE DE TRABAJADORES"), 0, 1, 'C', 0);
            $this->Ln(7);

            $anchoPagina = $this->GetPageWidth() - $this->lMargin - $this->rMargin;
            $anchoColumna = $anchoPagina / 8; // Dividir entre 8 para tener 8 columnas en la tabla
            $this->SetFillColor(228, 100, 0);
            $this->SetTextColor(255, 255, 255);
            $this->SetDrawColor(163, 163, 163);
            $this->SetFont('Arial', 'B', 11);
            $this->Cell(15, 10, utf8_decode('N°'), 1, 0, 'C', 1);
            $this->Cell($anchoColumna, 10, utf8_decode('CODIGO'), 1, 0, 'C', 1);
            $this->Cell($anchoColumna, 10, utf8_decode('NOMBRE'), 1, 0, 'C', 1);
            $this->Cell($anchoColumna, 10, utf8_decode('APELLIDOS'), 1, 0, 'C', 1);
            $this->Cell($anchoColumna, 10, utf8_decode('CELULAR'), 1, 0, 'C', 1);
            $this->Cell(55, 10, utf8_decode('CORREO'), 1, 0, 'C', 1);
            $this->Cell($anchoColumna, 10, utf8_decode('EDAD'), 1, 0, 'C', 1);
            $this->Cell($anchoColumna, 10, utf8_decode('CARGO'), 1, 0, 'C', 1);
            $this->Ln(20);
        }
    }

    // Pie de página
    function Footer() {
        $this->SetY(-15); // Posición: a 1,5 cm del final
        $this->SetFont('Arial', 'I', 8); // Tipo fuente, negrita(B-I-U-BIU), tamañoTexto
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); // Pie de página (número de página)

        $this->SetY(-15); // Posición: a 1,5 cm del final
        $this->SetFont('Arial', 'I', 8); // Tipo fuente, cursiva, tamañoTexto
        $hoy = date('d/m/Y');
        $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // Pie de página (fecha de página)
    }

}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_llauce";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$pdf = new PDF();
$pdf->AddPage("landscape");
$pdf->AliasNbPages();

$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163);

$consulta_info = $conn->query("SELECT * FROM empleados");

$i = 0;

while ($datos_info = $consulta_info->fetch_object()) {
    $i = $i + 1;
    $pdf->Cell(15, 10, utf8_decode($i), 1, 0, 'C', 0);
    $pdf->Cell(35, 10, utf8_decode($datos_info->codigo), 1, 0, 'C', 0);
    $pdf->Cell(35, 10, utf8_decode($datos_info->nombre), 1, 0, 'C', 0);
    $pdf->Cell(35, 10, utf8_decode($datos_info->apellidos), 1, 0, 'C', 0);
    $pdf->Cell(35, 10, utf8_decode($datos_info->celular), 1, 0, 'C', 0);
    $pdf->Cell(55, 10, utf8_decode($datos_info->correo), 1, 0, 'C', 0);
    $pdf->Cell(35, 10, utf8_decode($datos_info->edad), 1, 0, 'C', 0);
    $pdf->Cell(32, 10, utf8_decode($datos_info->cargo), 1, 0, 'C', 0);
    $pdf->Ln();
}

$pdf->Output('Prueba2.pdf', 'I');

$conn->close();
?>
