
<?php
require_once './Classes/PHPExcel.php';
// Paso 1: Conectarse a la base de datos
$host = 'localhost';
$dbname = 'bd_llauce';
$username = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}

// Paso 2: Consultar los datos de la tabla
$query = "SELECT * FROM carrito";
$stmt = $pdo->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Paso 3: Crear un nuevo archivo de Excel
$objPHPExcel = new PHPExcel();

// Paso 4: Agregar datos a la hoja de cálculo
$sheet = $objPHPExcel->getActiveSheet();
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'ID de Producto');
$sheet->setCellValue('C1', 'Nombre del Producto');
$sheet->setCellValue('D1', 'Precio del Producto');
$sheet->setCellValue('E1', 'Cantidad');
$sheet->setCellValue('F1', 'Fecha de Registro');

$row = 2;
foreach ($results as $rowdata) {
    $sheet->setCellValue('A' . $row, $rowdata['id']);
    $sheet->setCellValue('B' . $row, $rowdata['producto_id']);
    $sheet->setCellValue('C' . $row, $rowdata['producto_nombre']);
    $sheet->setCellValue('D' . $row, $rowdata['producto_precio']);
    $sheet->setCellValue('E' . $row, $rowdata['cantidad']);
    $sheet->setCellValue('F' . $row, $rowdata['fecha_registro']);
    $row++;
}

// Paso 5: Guardar el archivo de Excel
$filename = 'datos_carrito.xlsx';
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save($filename);

echo "El archivo Excel se ha creado exitosamente.";
