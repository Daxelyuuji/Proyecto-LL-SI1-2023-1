<?php
require_once '../Controller/conexion/configuracion.php';
$sql = "SELECT id, producto, img, precio, stock, categoria, idproveedor, proveedor FROM productoss";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['producto'] . "</td>";
        echo "<td><img src='../Imagenes/" . $row['img'] . "' width='50'></td>";
        echo  "<td> S/ " . $row['precio'] . "</td>";
        echo "<td>" . $row['stock'] . "</td>";
        echo "<td>" . $row['categoria'] . "</td>";
        echo "<td>" . $row['idproveedor'] . "</td>";
        echo "<td>" . $row['proveedor'] . "</td>";
        echo "<td><a href='../View/v_producto_editar.php?id=". $row['id'] . "'><i style='color: #f7d547' class='bx bx-pencil'></i></a></td>";
        echo "<td><a href='../Model/M_producto_eliminar.php?id=" . $row['id'] . "'><i style='color: red' class='bx bx-trash-alt'></i></a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>No se encontraron productos.</td></tr>";
}

$conn->close();
?>