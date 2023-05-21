<?php

include_once './mysql.php';
include_once '../principales/mysql.php';

$nombre = ucwords(strtolower (trim($_GET["nombre"]))); 
$correo = $_GET["correo"]; 
$password = $_GET["password"];           // Dar formato "rAul    joSE    PeralTA" a "RAUL JOSE PERALTA"
$apellidos = ucwords(strtolower (trim($_GET["apellidos"])));
$telefono = $_GET["telefono"];
$direccion = ucwords(strtolower (trim($_GET["direccion"])));
$fecha_nacimiento = $_GET["date_add"]; 
$edad = $_GET["edad"]; 
$genero = ucwords(strtolower (trim($_GET["genero"])));                 // Dar formato "sdsdk@UTP.EDI.pe" a "sdsdk@utp.edi.pe
                                 // No se modifica, pero se debe controlar el tamaño


#var_dump($sql);
$varcesarNombre=trimInside($nombre);


$sql = "INSERT INTO registro (nombre,correo,password,apellidos,telefono,direccion,date_add,edad,genero)"
        . "VALUES ('$varcesarNombre', '$correo', '$password' , '$apellidos' , '$telefono' , '$direccion' , '$fecha_nacimiento' , '$edad' , '$genero')";

try {
    echo $sql;
    conectar();
    ejecutar($sql);
    desconectar();
    header("location: registro_usuario.php?estado=ok");
} catch (Exception $e) {
    header("location: registro_usuario.php?estado=fail");
}
