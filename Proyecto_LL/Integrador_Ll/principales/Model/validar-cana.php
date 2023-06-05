<?php 
try {
    conectar();
} catch (Exception $ex) {
    die($ex->getMessage());
}
$registros = consultar("SELECT * FROM canasta");
?>