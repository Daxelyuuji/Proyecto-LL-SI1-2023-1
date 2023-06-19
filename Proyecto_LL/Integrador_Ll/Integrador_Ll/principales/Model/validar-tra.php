<?php
$id = $_GET["id"];
try {
    conectar();
    $sql = "SELECT * FROM empleados WHERE id = $id";
    $registros = consultar($sql);
    $empleados = $registros[0];
    desconectar();
} catch (Exception $e) {
    die($e->getMessage());
}
?>