<?php
//nuevo
$id = $_GET["id"];
try {
    conectar();
    $sql = "SELECT * FROM producto WHERE id = $id";
    $registros = consultar($sql);
    $producto = $registros[0];
    desconectar();
} catch (Exception $e) {
    die($e->getMessage());
}
//consulta
try {
    conectar();
} catch (Exception $ex) {
    die($ex->getMessage());
}
$registros = consultar("SELECT * FROM producto");


//edicion
$id = $_GET["id"];
try {
    conectar();
    $sql = "SELECT * FROM producto WHERE id = $id";
    $registros = consultar($sql);
    $producto = $registros[0];
    desconectar();
} catch (Exception $e) {
    die($e->getMessage());
}
?>