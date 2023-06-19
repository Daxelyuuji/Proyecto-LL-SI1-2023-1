<?php

include_once '../Controller/mysql.php';

$id = $_GET["id"];

$sql = "CALL SP_DB_trabajadores_elim($id)";

#var_dump($sql);
try {
    conectar();
    if (ejecutar($sql)) {
        desconectar();
        header("location: ../View/v_trabajadores.php");
    } else {
        desconectar();
        echo 'ERROR al procesar';
    }    
} catch (Exception $e) {
    die($e->getMessage());
}
