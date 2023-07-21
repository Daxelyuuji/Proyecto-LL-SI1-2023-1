<?php

include_once '../Controller/mysql.php';
$id = $_GET["id"];

$sql = "CALL SP_DB_productos_elim($id)";
#var_dump($sql);
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
