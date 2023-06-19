<?php
session_start();
require_once '../Controller/conexion/configuracion.php';

// ...

if (isset($_POST['eliminar'])) {
    $producto_id = $_POST['producto_id'];

    // Eliminar el producto del carrito en la sesión
    foreach ($_SESSION['carrito'] as $key => $producto) {
        if ($producto['id'] === $producto_id) {
            unset($_SESSION['carrito'][$key]);
            break;
        }
    }

    // Eliminar el producto de la tabla carrito en la base de datos
    $stmt = $conn->prepare("DELETE FROM carrito WHERE producto_id = ?");
    $stmt->bind_param("i", $producto_id);
    $stmt->execute();
    $stmt->close();
}

// ...

$conn->close();

// Redireccionar al catálogo de productos
header("Location: ../cliente/carrito.php");
exit();
?>
