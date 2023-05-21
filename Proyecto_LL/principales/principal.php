<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <title>Minimarket Llauce &COPY;</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../Imagenes/favicon-32x32.png">
        <link href="../CSS/Principal.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body>
        <?php require_once './header.php'; ?>

        <div class="fondo d-flex">
            <div class="hero">
                <h1 class="display-2"> <b>Productos de Confianza</b></h1>
                <p>Minimarket encargado de brindar productos de primera necesidad al mejor precio.</p>
                <a href="#"> <img src="../Imagenes/arrow-bar-right.svg" width="50" alt="Logo"><b> Promociones</b> </a>
            </div>
            <img src="../Imagenes/viveres.jpg" alt=""/>
        </div>
        <!-- Contenedor -->
        <div class="container text-center">
            <div class="row align-items-start">
                <div class="col">
                    <img src="../Imagenes/bandaid.svg" width="40"><br>
                    <a href="#"> <b>Utensilios de Limpieza</b> </a>
                    <p>Los mejores productos para cocina y el consumo.</p>
                </div>
                <div class="col">
                    <img src="../Imagenes/egg-fill.svg" width="40"><br>
                    <a href="#"> <b>Viveres</b> </a>
                    <p>Necesitas limpiar aqui te ayudamos.</p>
                </div>
                <div class="col">
                    <img src="../Imagenes/droplet-fill.svg" width="40"><br>
                    <a href="#"> <b>Bebidas</b></a>
                    <p>Hidratate como te gusta.</p>
                </div>
            </div>
        </div>
        <?php require_once './footer.php'; ?>
    </body>
</html>