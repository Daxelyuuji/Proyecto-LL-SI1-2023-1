<?php

include_once '../Controller/mysql.php';

$codigo = trimInside($_POST["codigo"]);
$nombre = $_POST['nombre'];
$apellidos = ($_POST["apellidos"]);
$celular = trimInside($_POST["celular"]);
$correo = $_POST["correo"];
$edad = $_POST['edad'];
$cargo = $_POST["cargo"];
$contrasena = $_POST["contrasena"];

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    // Actualizar
    $sql = "CALL SP_DB_trabajadores_act($id, '$nombre', '$apellidos', '$cargo', $celular, '$contrasena', '$correo', $edad, '$codigo')";
} else {
    // Insertar
    $sql = "CALL SP_DB_trabajadores_in(NULL, '$nombre', '$apellidos', '$cargo', $celular, '$contrasena', '$correo', $edad, '$codigo')";
}

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
