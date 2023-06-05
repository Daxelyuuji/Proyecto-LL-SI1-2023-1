<?php
try {
    conectar();
} catch (Exception $ex) {
    die($ex->getMessage());
}
$registros = consultar("SELECT * FROM empleados");
# var_dump($registros);
?>