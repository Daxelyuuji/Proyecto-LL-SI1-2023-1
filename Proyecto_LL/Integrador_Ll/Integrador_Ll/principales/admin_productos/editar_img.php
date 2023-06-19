<?php
require_once '../Controller/conexion/configuracion.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verificar si se ha enviado el formulario de actualización
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los datos actualizados del formulario
        $producto = $_POST['producto'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $categoria = $_POST['categoria'];
        $idproveedor = $_POST['idproveedor'];
        $proveedor = $_POST['proveedor'];

        // Verificar si se ha cargado una nueva imagen
        if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $imagen_tmp = $_FILES['imagen']['tmp_name'];
            $imagen_nombre = $_FILES['imagen']['name'];
            $imagen_extension = pathinfo($imagen_nombre, PATHINFO_EXTENSION);
            $imagen_destino = '../Imagenes/' . $imagen_nombre;

            // Mover la imagen cargada al destino
            if (move_uploaded_file($imagen_tmp, $imagen_destino)) {
                // Actualizar los datos del producto en la base de datos, incluyendo la nueva imagen
                $sql = "UPDATE productoss SET producto = '$producto', img = '$imagen_nombre', precio = '$precio', stock = '$stock', categoria = '$categoria', idproveedor = '$idproveedor', proveedor = '$proveedor' WHERE id = $id";
                if ($conn->query($sql) === TRUE) {
                    echo "Producto actualizado exitosamente.";
                    header("location: ../View/v_producto.php");
                } else {
                    echo "Error al actualizar el producto: " . $conn->error;
                }
            } else {
                echo "Error al mover la imagen cargada.";
            }
        } else {
            // Actualizar los datos del producto en la base de datos sin cambiar la imagen
            $sql = "UPDATE productoss SET producto = '$producto', precio = '$precio', stock = '$stock', categoria = '$categoria', idproveedor = '$idproveedor', proveedor = '$proveedor' WHERE id = $id";

            if ($conn->query($sql) === TRUE) {
                echo "Producto actualizado exitosamente.";
                header("location: ../View/v_producto.php");
            } else {
                echo "Error al actualizar el producto: " . $conn->error;
            }
        }
    }

    // Obtener los datos del producto específico
    $sql = "SELECT * FROM productoss WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Mostrar el formulario de edición
        ?>
        
        <?php
    } else {
        echo "No se encontró el producto.";
    }
}

$conn->close();
?>