<?php

include_once '../Controller/mysql.php';

$producto = trimInside($_POST ["producto"]);
$precio = $_POST['precio'];
$cantidad = ($_POST ["cantidad"]);
$metodopago= ($_POST["metodopago"]);



if (isset($_POST["id"])) {
    $id = $_POST["id"];
#Actualizar
    $sql = "UPDATE canasta SET producto = '$producto', precio = '$precio', cantidad = '$cantidad', metodopago = '$metodopago' WHERE id = $id";
} else {
#Insertar
    $sql = "INSERT INTO canasta (producto, precio, cantidad, metodopago) VALUES ('$producto', '$precio', '$cantidad', '$metodopago' )";
}
try {
    conectar();
    if (ejecutar($sql)) {
        desconectar();
        header("location: ../View/v_canasta.php");
    } else {
        desconectar();
        echo 'ERROR al procesar';
    }
} catch (Exception $e) {
    die($e->getMessage());
}