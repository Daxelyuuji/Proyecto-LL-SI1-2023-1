<?php

include_once '../Controller/mysql.php';

$producto = trimInside($_POST ["productos"]);
$img = $_POST['img'];
$stock = ($_POST ["stock"]);
$categoria = trimInside($_POST ["categoria"]);
$idproveedor = $_POST ["idproveedor"];
$proveedor = trimInside($_POST ["proveedor"]);
$precio = $_POST ["precio"];




if (isset($_POST["id"])) {
    $id = $_POST["id"];
#Actualizar
    $sql = "UPDATE producto SET productos = '$producto', img = '$img', stock = '$stock', categoria = '$categoria', idproveedor = '$idproveedor', proveedor = '$proveedor', precio = '$precio' WHERE id = $id";
} else {
#Insertar
    $sql = "INSERT INTO producto (productos, img, stock, categoria, idproveedor, proveedor, precio) VALUES ('$producto', '$img', '$stock', '$categoria', '$idproveedor', '$proveedor', '$precio')";
}
try {
    conectar();
    if (ejecutar($sql)) {
        desconectar();
        header("location: ../View/v_producto.php");
    } else {
        desconectar();
        echo 'ERROR al procesar';
    }
} catch (Exception $e) {
    die($e->getMessage());
}
