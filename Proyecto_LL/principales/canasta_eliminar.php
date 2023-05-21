<?php

include_once './mysql.php';

$id = $_GET["id"];

$sql = "DELETE FROM canasta WHERE id = $id";

#var_dump($sql);
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
