<?php

include_once '../Controller/mysql.php';

$sql = "TRUNCATE TABLE canasta";


#var_dump($sql);
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
