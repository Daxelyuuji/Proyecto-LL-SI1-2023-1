<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <title> Productos &copy;</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../Imagenes/favicon-32x32.png">
        <link href="../CSS/Productos.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/pro_categorias.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body>
        <?php require_once '../cliente/header.php'; ?>
        <div class="background">
            
            <div class="containers">
                <h1>Bienvenido a nuestra tienda</h1>
                <br/>
                <hr><!-- comment -->
                <br/>
                <h3>Categorias de productos</h3>
                <div class="categories">
                    <div class="category">
                        <h3>Viveres</h3>
                        <hr>
                        <div class="category-img viveres"></div>
                        <br/>
                        <a href="viveres.php" class="btn-ver-mas">Ver Más</a>
                    </div>
                    <div class="category">
                        <h3>Limpieza</h3>
                        <hr>
                        <div class="category-img limpieza"></div>
                        <br/>
                        <a href="limpieza.php" class="btn-ver-mas">Ver Más</a>
                    </div>
                    <div class="category">
                        <h3>Bebidas</h3>
                        <hr>
                        <div class="category-img bebidas"></div>
                        <br/>
                        <a href="bebidas.php" class="btn-ver-mas">Ver Más</a>
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <?php require_once '../cliente/footer.php'; ?>
    </body>
</html>