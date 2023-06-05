<?php

include_once '../Controller/mysql.php';

$producto = $_POST ["producto"];
$precio = $_POST["precio"];
$categoria = ($_POST ["categoria"]);




if (isset($_POST["id"])) {
    $id = $_POST["id"];
#Actualizar
    $sql = "UPDATE carrito SET producto = '$producto', precio = '$precio', categoria = '$categoria' WHERE id = $id";
} else {
#Insertar
    $sql = "INSERT INTO carrito (producto, precio, categoria) VALUES ('$producto', '$precio', '$categoria')";
}
try {
    conectar();
    if (ejecutar($sql)) {
        desconectar();
        header("location: ../View/v_carrito.php");
    } else {
        desconectar();
        echo 'ERROR al procesar';
    }
} catch (Exception $e) {
    die($e->getMessage());
}