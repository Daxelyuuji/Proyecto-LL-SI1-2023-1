<?php
require_once '../Controller/conexion/configuracion.php';
require_once('../vendor/autoload.php'); // Ruta al archivo de autoload de Stripe
require_once '../Model/M_Pago.php';
require_once '../fpdf/fpdf.php';

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}
if (isset($_POST['eliminar'])) {
    $producto_id = $_POST['producto_id'];

    // Eliminar el producto del carrito en PHP
    foreach ($_SESSION['carrito'] as $key => $producto) {
        if ($producto['id'] === $producto_id) {
            unset($_SESSION['carrito'][$key]);
            break;
        }
    }

    // Eliminar el producto del carrito en la tabla carrito de MySQL
    $stmt = $conn->prepare("DELETE FROM carrito WHERE producto_id = ?");
    $stmt->bind_param("i", $producto_id);
    $stmt->execute();
    $stmt->close();
}

if (isset($_POST['agregar_carrito'])) {
    $producto_id = $_POST['producto_id'];
    $producto_nombre = $_POST['producto_nombre'];
    $producto_precio = floatval($_POST['producto_precio']); // Convertir a número
    $cantidad = intval($_POST['cantidad']); // Convertir a número

    $producto = array(
        'id' => $producto_id,
        'nombre' => $producto_nombre,
        'precio' => $producto_precio,
        'cantidad' => $cantidad
    );

    array_push($_SESSION['carrito'], $producto);

    // Restar la cantidad comprada del stock del producto en la base de datos
    $stmt = $conn->prepare("UPDATE productoss SET stock = stock - ? WHERE id = ?");
    $stmt->bind_param("ii", $cantidad, $producto_id);
    $stmt->execute();
    $stmt->close();

    // Redireccionar al catálogo de productos
    header("Location: productos.php");
    exit();
}

if (isset($_POST['eliminar'])) {
    $producto_id = $_POST['producto_id'];

    foreach ($_SESSION['carrito'] as $key => $producto) {
        if ($producto['id'] === $producto_id) {
            unset($_SESSION['carrito'][$key]);
            break;
        }
    }
}



if (!empty($_SESSION['carrito'])) {
    // Preparar la consulta SQL
    $stmt = $conn->prepare("INSERT INTO carrito (producto_id, producto_nombre, producto_precio, cantidad) VALUES (?, ?, ?, ?)");

// Recorrer los productos del carrito e insertarlos en la tabla
    foreach ($_SESSION['carrito'] as $producto) {
        $producto_id = $producto['id'];
        $producto_nombre = $producto['nombre'];
        $producto_precio = $producto['precio'];
        $cantidad = $producto['cantidad'];

        // Asignar los valores a los parámetros de la consulta
        $stmt->bind_param("issi", $producto_id, $producto_nombre, $producto_precio, $cantidad);


        // Ejecutar la consulta
        $stmt->execute();
    }
    $stmt->close();
    
// Cerrar la consulta
}
$conn->close();

// Vaciar el carrito

?>