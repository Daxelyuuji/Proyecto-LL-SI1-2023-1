<?php
require_once '../Controller/conexion/configuracion.php';

$mes = isset($_GET['mes']) ? $_GET['mes'] : date('m'); // Obtener el valor del mes seleccionado o el mes actual si no se selecciona
// Consulta SQL para obtener el producto más vendido por año y mes
$sql = "SELECT YEAR(fecha_registro) AS anio, MONTH(fecha_registro) AS mes, producto_nombre, SUM(cantidad) AS total_cantidad 
        FROM carrito 
        WHERE MONTH(fecha_registro) = $mes
        GROUP BY anio, mes, producto_nombre 
        HAVING total_cantidad = (
            SELECT MAX(sum_cantidad)
            FROM (
                SELECT YEAR(fecha_registro) AS anio, MONTH(fecha_registro) AS mes, producto_nombre, SUM(cantidad) AS sum_cantidad
                FROM carrito
                WHERE MONTH(fecha_registro) = $mes
                GROUP BY anio, mes, producto_nombre
            ) AS ventas_por_mes
            WHERE anio = ventas_por_mes.anio AND mes = ventas_por_mes.mes
        )";

$result = $conn->query($sql);

// Crear arrays para almacenar los datos del gráfico
$anios = array();
$productos = array();
$cantidades = array();

// Recorrer los resultados y almacenar los datos en los arrays
while ($row = $result->fetch_assoc()) {
    $anios[] = $row["anio"];
    $productos[] = $row["producto_nombre"];
    $cantidades[] = $row["total_cantidad"];
}

// Consulta SQL para obtener los datos del carrito
$sql = "SELECT producto_nombre, SUM(cantidad) AS total_cantidad
        FROM carrito
        WHERE MONTH(fecha_registro) = $mes
        GROUP BY producto_nombre
        ORDER BY total_cantidad DESC";
$resultado = $conn->query($sql);

$productos = array();
$cantidades = array();

while ($fila = $resultado->fetch_assoc()) {
    $productos[] = $fila['producto_nombre'];
    $cantidades[] = $fila['total_cantidad'];
}

// Consulta SQL para obtener los datos de productos y stock
$sql = "SELECT producto, stock FROM productoss";
$resultado = $conn->query($sql);

$productos = array();
$stock = array();

while ($fila = $resultado->fetch_assoc()) {
    $productos[] = $fila['producto'];
    $stock[] = $fila['stock'];
}

// Consulta SQL para obtener la cantidad de productos vendidos por categoría
$sql = "SELECT p.categoria, SUM(c.cantidad) AS total_vendidos
        FROM carrito c
        INNER JOIN productoss p ON c.producto_id = p.id
        WHERE MONTH(c.fecha_registro) = $mes
        GROUP BY p.categoria";

$result = $conn->query($sql);

$categorias = array();
$totalVendidos = array();

while ($row = $result->fetch_assoc()) {
    $categorias[] = $row["categoria"];
    $totalVendidos[] = $row["total_vendidos"];
}

// Obtener la suma de todos los "producto_precio"
$sql_suma_precios = "SELECT SUM(producto_precio) AS suma_precios FROM carrito";
$resultado_suma_precios = $conn->query($sql_suma_precios);
$suma_precios = 0;
if ($resultado_suma_precios->num_rows > 0) {
    $row = $resultado_suma_precios->fetch_assoc();
    $suma_precios = $row["suma_precios"];
}

// Obtener el producto más vendido con la cantidad
$sql_producto_mas_vendido = "SELECT producto_nombre, SUM(cantidad) AS cantidad_vendida FROM carrito GROUP BY producto_nombre ORDER BY cantidad_vendida DESC LIMIT 1";
$resultado_producto_mas_vendido = $conn->query($sql_producto_mas_vendido);
$producto_mas_vendido = "";
$cantidad_vendida = 0;
if ($resultado_producto_mas_vendido->num_rows > 0) {
    $row = $resultado_producto_mas_vendido->fetch_assoc();
    $producto_mas_vendido = $row["producto_nombre"];
    $cantidad_vendida = $row["cantidad_vendida"];

    // Obtener la suma recaudada solo para el producto más vendido
    $sql_suma_recaudada = "SELECT SUM(producto_precio) AS suma_recaudada FROM carrito WHERE producto_nombre = '$producto_mas_vendido'";
    $resultado_suma_recaudada = $conn->query($sql_suma_recaudada);
    $suma_recaudada = 0;
    if ($resultado_suma_recaudada->num_rows > 0) {
        $row = $resultado_suma_recaudada->fetch_assoc();
        $suma_recaudada = $row["suma_recaudada"];
    }
}

// Obtener el producto menos vendido con la cantidad
$sql_producto_menos_vendido = "SELECT producto_nombre, SUM(cantidad) AS cantidad_vendida FROM carrito GROUP BY producto_nombre ORDER BY cantidad_vendida ASC LIMIT 1";
$resultado_producto_menos_vendido = $conn->query($sql_producto_menos_vendido);
$producto_menos_vendido = "";
$cantidad_menos_vendida = 0;
if ($resultado_producto_menos_vendido->num_rows > 0) {
    $row = $resultado_producto_menos_vendido->fetch_assoc();
    $producto_menos_vendido = $row["producto_nombre"];
    $cantidad_menos_vendida = $row["cantidad_vendida"];
}


$conn->close();
?>