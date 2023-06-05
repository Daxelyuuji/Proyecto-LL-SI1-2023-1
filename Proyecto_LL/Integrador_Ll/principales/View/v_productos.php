<!DOCTYPE html>
<?php require_once '../Controller/conexion/configuracion.php';?>
<html lang="es">
    <head>
        <title> Productos &copy;</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../Imagenes/favicon-32x32.png">
        <link href="../CSS/Productos.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <style>
            .card {
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body style="background-image: url('https://img.freepik.com/foto-gratis/fondo-producto-pared-amarilla-simple_53876-100290.jpg')">
        <?php require_once './v_hadder.php'; ?>
        <br/>
        <div class="containerr" style="padding: 2px 20px">
            <center><h1>PRODUCTOS</h1></center>
            <hr>
            <div class="row">
                <?php
                $sql = "SELECT * FROM productoss";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                <div class="col-md-3" >
                    <div class="card">
                        <hr>
                        <br/>
                                <?php echo "<td><img src='../Imagenes/" . $row['img'] . "' width='20' height='200' class='card-img-top'></td>";?>
                                <div class="card-body">
                                    <h5 id="producto" class="card-title" style="text-align: center"><?php echo $row['producto']; ?></h5>
                                    <p id="precio" class="card-text"> S/ <?php echo $row['precio']; ?></p>
                                    <p id="categoria" class="card-text"> Catgoria: <?php echo $row['categoria']; ?></p>
                                    <form class="form-register" method="post" action="../Model/M_carrito_añadir.php">
                                    <center><button type="submit" class="btn btn-primary btn-comprar">Comprar</button></center>
                                </form>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "No se encontraron productos.";
                }
                $conn->close();
                ?>
            </div>
            <hr>
        </div>
        <br/>
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </body>
    <?php include '../View/v_footer.php';?>
</html>