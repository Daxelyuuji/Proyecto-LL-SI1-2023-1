<?php

include_once './mysql.php';

$producto = trimInside($_POST ["producto"]);
$precio = $_POST['precio'];
$cantidad = ($_POST ["cantidad"]);




if (isset($_POST["id"])) {
    $id = $_POST["id"];
#Actualizar
    $sql = "UPDATE canasta SET producto = '$producto', precio = '$precio', cantidad = '$cantidad' WHERE id = $id";
} else {
#Insertar
    $sql = "INSERT INTO canasta (producto, precio, cantidad) VALUES ('$producto', '$precio', '$cantidad')";
}
try {
    conectar();
    if (ejecutar($sql)) {
        desconectar();
        header("location: canasta.php");
    } else {
        desconectar();
        echo 'ERROR al procesar';
    }
} catch (Exception $e) {
    die($e->getMessage());
}