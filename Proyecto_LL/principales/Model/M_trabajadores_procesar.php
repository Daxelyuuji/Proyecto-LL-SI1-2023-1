<?php

include_once '../Controller/mysql.php';

$codigo = trimInside($_POST ["codigo"]);
$nombre = $_POST['nombre'];
$apellidos = ($_POST ["apellidos"]);
$celular = trimInside($_POST ["celular"]);
$correo = $_POST ["correo"];
$edad = $_POST['edad'];
$cargo = $_POST ["cargo"];
$contrasena = $_POST ["contrasena"];


if (isset($_POST["id"])) {
    $id = $_POST["id"];
#Actualizar
    $sql = "UPDATE empleados SET codigo = '$codigo', nombre = '$nombre', apellidos = '$apellidos', celular = '$celular', correo = '$correo', edad = '$edad', cargo = '$cargo' , contrasena = '$contrasena' WHERE id = $id";
} else {
#Insertar
    $sql = "INSERT INTO empleados (codigo,nombre, apellidos, celular, correo, edad, cargo, contrasena) VALUES ('$codigo', '$nombre', '$apellidos', '$celular', '$correo', '$edad', '$cargo', '$contrasena')";
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