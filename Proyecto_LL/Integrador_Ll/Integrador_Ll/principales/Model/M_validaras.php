
<?php

include_once 'M_config.php';
session_start();

$correo = $_POST['correo'];
$password = $_POST['password'];

$query = "SELECT * FROM registro WHERE correo = '$correo' and password ='$password'";
$validar_login = mysqli_query($conn, $query);

if (mysqli_num_rows($validar_login) > 0) {

    $_SESSION['correo'] = $correo;

    while ($row = $validar_login->fetch_assoc()) {
        $_SESSION['id'] = $row['id_usuario'];
    }
     header("location: ../cliente/principal.php");
} else {
    header("location: ../View/v_login.php");
}
?>