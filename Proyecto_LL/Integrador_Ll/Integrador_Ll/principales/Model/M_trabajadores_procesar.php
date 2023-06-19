<?php

include_once '../Controller/mysql.php';

$producto = trimInside($_POST["producto"]);
$precio = $_POST['precio'];
$cantidad = $_POST["cantidad"];
$metodopago = $_POST["metodopago"];

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    // Actualizar
    $sql = "CALL SP_DB_productos_act($id, '$producto', $precio, $cantidad, '$metodopago')";
} else {
    // Insertar
    $sql = "CALL SP_DB_productos_in(NULL, '$producto', $precio, $cantidad, '$metodopago')";
}

try {
    conectar();
    if (ejecutar($sql)) {
        desconectar();
        header("location: ../View/v_productos.php");
    } else {
        desconectar();
        echo 'ERROR al procesar';
    }
} catch (Exception $e) {
    die($e->getMessage());
}
?>
