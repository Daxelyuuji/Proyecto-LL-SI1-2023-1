<?php
$correo = $_POST["correo"];
$pass = $_POST["clave"];
$sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND "
        . "AES_DECRYPT(clave, '$pass') = '$pass';";
try {
    conectar();
    $resultado = consultar($sql);
    desconectar();
} catch (Exception $exc) {
    header("location: v_login_admin.php");
}
if (count($resultado) == 1){
    session_start();
    $_SESSION["acceso"] = "E14007a";
}else{
    session_start();
    session_destroy();
    header("location: v_login_admin.php?e=user");
}
?>