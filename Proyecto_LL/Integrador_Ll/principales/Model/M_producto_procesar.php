<?php

include_once '../Controller/mysql.php';
include_once '../Controller/conexion/configuracion.php';

$producto = $_POST['producto'];
$imagen = $_FILES['imagen']['name'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$categoria = $_POST['categoria'];
$idproveedor = $_POST['idproveedor'];
$proveedor = $_POST['proveedor'];
// Mover imagen a una ubicación deseada
$targetDir = "../Imagenes/"; // Reemplaza "ruta_imagenes" por la ruta real donde deseas almacenar las imágenes
$targetFile = $targetDir . basename($_FILES["imagen"]["name"]);
move_uploaded_file($_FILES["imagen"]["tmp_name"], $targetFile);


if (isset($_POST["id"])) {
    $id = $_POST["id"];
    # Actualizar
    $sql = "CALL SP_DB_productos_ac('$producto', '$imagen', '$precio', '$stock', '$categoria', '$idproveedor', '$proveedor')";
    
} else {
    # Insertar
    $sql = "CALL SP_DB_productos_in(null,'$producto', '$imagen', '$precio', '$stock', '$categoria', '$idproveedor', '$proveedor')";
}
try {
    conectar();
    if (ejecutar($sql)) {
        desconectar();
        echo "<script>mostrarMensaje('Producto registrado', 'El producto se ha registrado correctamente.', 'success');</script>";
        header("location: ../View/v_producto.php");
    } else {
        desconectar();
        echo 'ERROR al procesar';
    }
} catch (Exception $e) {
    die($e->getMessage());
}

?>
