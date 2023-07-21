<?php

include_once '../Controller/mysql.php';

$codigo = $_POST['codigo'];
$nombre = trim($_POST["nombre"]);
$apellidos = $_POST['apellidos'];
$celular = $_POST["celular"];
$correo = $_POST['correo'];
$edad = $_POST["edad"];
$cargo = $_POST["cargo"];
$contrasena = $_POST['contrasena'];

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    // Actualizar
    $sql = "CALL SP_DB_trabajadores_act('$id','$codigo', '$nombre', '$apellidos', '$celular', '$correo', '$edad', '$cargo', '$contrasena')";
} else {
    // Insertar
    $sql = "CALL SP_DB_trabajadores_in(null,'$codigo', '$nombre', '$apellidos', '$celular', '$correo', '$edad', '$cargo', '$contrasena')";
}

try {
    conectar();
    if (ejecutar($sql)) {
        desconectar();
        header("location: ../View/v_trabajadores.php");
        exit();
    } else {
        desconectar();
        echo 'ERROR al procesar';
    }
} catch (Exception $e) {
    die($e->getMessage());
}
?>
