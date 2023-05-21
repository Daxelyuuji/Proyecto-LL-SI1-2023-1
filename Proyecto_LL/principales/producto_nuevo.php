<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <title> Nosotros &copy;</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../Imagenes/favicon-32x32.png">
        <link href="../CSS/Principal.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/nuevo_p.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body class="nuevo">
        <?php require_once './header.php'; ?>
        <div class="sises">
            <br/>
            <h2 style="color:green "><center>Nuevo registro</center></h2>
            <br/>
            <form action="producto_procesar.php" method="post">
                <center>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Nombre de Producto</span>
                        <input type="text"  name="productos"  class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Stock</span>
                        <input type="number"  name="stock"  class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div> 
                
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Categoria</span>
                        <input type="text"  name="categoria"  class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div> 
                
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Id Proveedor</span>
                        <input type="number"  name="idproveedor"  class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div> 
                
                
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Proveedor</span>
                        <input type="text"  name="proveedor"  class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div> 
                
                
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Precio S/</span>
                        <input type="number"  name="precio"  class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                    </div>


                </div>  

                    <button class="btn btn-success" type="submit">Guardar</button>
                <a class="btn btn-primary" href="producto.php">Cancelar</a></center>
            </form>
        </div>
        <br/>
<?php require_once './footer.php'; ?>
</body>
</html>