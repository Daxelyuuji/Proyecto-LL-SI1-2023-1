<?php
include_once './mysql.php';
$id = $_GET["id"];
try {
    conectar();
    $sql = "SELECT * FROM producto WHERE id = $id";
    $registros = consultar($sql);
    $producto = $registros[0];
    desconectar();
} catch (Exception $e) {
    die($e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Editar Productos &copy;</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../Imagenes/favicon-32x32.png">
        <link href="../CSS/Principal.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/editar-p.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body class="editar">
        <?php require_once './header.php'; ?>
        <div class="sises">
            <center>
                <h2 style="color: green">Actualizar productos</h2>
                <br/>
                <form action="producto_procesar.php" method="post">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Nombre de Producto</span>
                            <input type="text"  name="productos" class="form-control" value="<?= $producto["productos"] ?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <input type="hidden" name="id" class="form-control" value="<?= $producto["id"] ?>">
                    </div>

                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Stock</span>
                            <input type="number"  name="stock" value="<?= $producto["stock"] ?>" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Categoria</span>
                            <input type="text"  name="categoria" value="<?= $producto["categoria"] ?>" class="form-control"  placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Id Proveedor</span>
                            <input type="number"  name="idproveedor" value="<?= $producto["idproveedor"] ?>" class="form-control"  placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Proveedor</span>
                            <input type="text"  name="proveedor" value="<?= $producto["proveedor"] ?>" class="form-control"  placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Precio</span>
                            <input type="number"  name="precio" value="<?= $producto["precio"] ?>" class="form-control"  placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <br />
                    <button class="btn btn-success" type="submit">Actualizar</button>
                    <a class="btn btn-primary" href="producto.php">Cancelar</a>
                </form>
                <br/>
        </div>
        <br/>
        <?php require_once './footer.php'; ?>
    </body>
</html>