<!DOCTYPE html>
<?php require_once '../Controller/conexion/configuracion.php'; ?>
<html lang="es">
    <head>
        <title> Productos - Limpieza&copy;</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../Imagenes/favicon-32x32.png">
        <link href="../CSS/Productos.css" rel="stylesheet" type="text/css"/>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .card {
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body style="background-color: khaki">
        <?php require_once '../cliente/header.php'; ?>
        <br/>
        <div style="padding: 2px 20px">
            <center><h1>CATEGORIA LIMPIEZA </h1></center>
            <hr>
            <div class="row">
                <?php
                $categoria = "Limpieza"; // Categoría deseada
                $sql = "SELECT * FROM productoss WHERE categoria = '$categoria'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                <div class="col-md-3">
                            <div class="card">
                                <hr>
                                <br/>
                                <?php echo "<td><img src='../Imagenes/" . $row['img'] . "' width='50' height='200' class='card-img-top'></td>"; ?>
                                <div class="card-body">
                                    <h5 id="producto" class="card-title" style="text-align: center"><?php echo $row['producto']; ?></h5>
                                    <p id="precio" class="card-text"> S/ <?php echo $row['precio']; ?></p>
                                    <p id="categoria" class="card-text"> Categoría: <?php echo $row['categoria']; ?></p>
                                    <form action="carrito.php" method="post" onsubmit="return validarCantidad()">
                                        <div style="text-align: center">
                                            <label>Cantidad:</label><br/>
                                            <input type="number" id="cantidadInput" name="cantidad" min="1" max="10" style="padding: 3px 5px; width: 80px">
                                        </div>
                                        <br/>
                                        <input type="hidden" name="producto_id" value="<?php echo $row['id']; ?>">
                                        <input type="hidden" name="producto_nombre" value="<?php echo $row['producto']; ?>">
                                        <input type="hidden" name="producto_precio" value="<?php echo $row['precio']; ?>">
                                        <center>
                                            <button type="submit" class="btn btn-primary btn-comprar" name="agregar_carrito">Añadir al carrito</button>
                                        </center>
                                    </form>

                                    <script>
                                        function validarCantidad() {
                                            var cantidad = document.getElementById("cantidadInput").value;

                                            if (cantidad < 1 && cantidad > 10) {
                                                alert("La cantidad debe estar entre 1 y 10.");
                                                return false; // Evita que se envíe el formulario
                                            }

                                            alert("Producto añadido al carrito");
                                            return true; // Permite que se envíe el formulario
                                        }
                                    </script>

                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "No se encontraron productos.";
                }
                $conn->close();

                // Verificar si $_SESSION['carrito'] está definida antes de recorrerla
                if (isset($_SESSION['carrito'])) {
                    foreach ($_SESSION['carrito'] as $producto) {
                        $producto_id = $producto['id'];
                        $cantidad = $producto['cantidad'];

                        $stmt = $conn->prepare("UPDATE productoss SET stock = stock - ? WHERE id = ?");
                        $stmt->bind_param("ii", $cantidad, $producto_id);
                        $stmt->execute();
                        $stmt->close();
                    }
                }
                ?>
            </div>
            <hr>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <?php include '../cliente/footer.php'; ?>
    </body>
</html>
