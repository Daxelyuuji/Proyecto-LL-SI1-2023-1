<?php
include_once './validar.php';
include_once './mysql.php';
try {
    conectar();
} catch (Exception $ex) {
    die($ex->getMessage());
}
$registros = consultar("SELECT * FROM producto");
# var_dump($registros);
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <title> Administracion de Productos &copy;</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../Imagenes/favicon-32x32.png">
        <link href="../CSS/style.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/perfil.css" rel="stylesheet" type="text/css"/>
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>

        <nav class="sidebar close">
            <header>
                <div class = "image-text">
                    <span class="image">
                        <img src="../Imagenes/Imagen_2.jpeg" alt="" width="70px" height="40px">
                    </span>

                    <div class="text logo-text">
                        <span class= "name"></span>
                        <span class="profession">Minimarket LLauce &COPY;</span>
                    </div>
                </div>
                <i class='bx bx-chevron-right toggle'></i>
            </header>

            <div class="menu-bar">
                <div class="menu">

                    <li class="search-box">
                        <i class='bx bx-search icon'></i>
                        <input type="text" placeholder="Buscar...">
                    </li>

                    <ul class="menu-links">
                        <li class = "nav-link">
                            <a href="principal.php">
                                <i class='bx bx-home-alt icon' ></i> 
                                <span class="text nav-text">Inicio</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="canasta.php">
                                <i class='bx bx-bar-chart-alt-2 icon' ></i>
                                <span class="text nav-text">Procesar - Compra</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-bell icon'></i>
                                <span class="text nav-text">Notificaciones</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-pie-chart-alt icon' ></i> 
                                <span class="text nav-text">Análisis</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href= "#">
                                <i class='bx bx-heart icon' ></i>
                                <span class="text nav-text">Clientes</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href= "producto.php">
                                <i class='bx bx-notepad icon' ></i>
                                <span class="text nav-text">Productos</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href= "#">
                                <i class='bx bx-user-plus icon' ></i>
                                <span class="text nav-text">Proveedores</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="bottom-content">
                    <li class="">
                        <a href="login.php"> 
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">Cerrar Sesión</span>
                        </a>
                    </li>
                    <li class="mode">
                        <div class="sun-moon">
                            <i class='bx bx-moom icon moon'></i>
                            <i class='bx bx-sun icon sun'></i>
                        </div>
                        <span class="mode-text text">Modo oscuro</span>  

                        <div class="toggle-switch">
                            <span class="switch"></span>
                        </div>
                    </li>

                </div>
            </div>
        </nav>
        <section class="home">
            <br/>
            <br/>
            <div class="container-fluid" style="color: green" >
                <center> <h1 class="text nav-text">MANTENIMIENTO DE PRODUCTOS</h1></center>
                <div style="display:flex; " class="row">
                    <center><a class="mi-boton" href="../admin/producto_nuevo.php"> AGREGAR</a></center>
                </div>
                <div class="row">
                    <center> <table class="tablas" border="1" WIDTH="80%" style="color: black" >
                            <br/>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th >Nombre de Producto</th>
                                    <th>Imagen</th>
                                    <th>Stock</th>
                                    <th>Categoria</th>
                                    <th>Id Proveedor</th>
                                    <th>Proveedor</th>
                                    <th>Precio</th>
                                    <th colspan="2"><center>Acciones</center></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($registros as $producto) : ?>
                                    <tr style="text-align: center">
                                        <td><?= $producto ["id"] ?></td>
                                        <td><?= $producto ["productos"] ?></td>
                                        <td><?= $producto ["img"] ?></td>
                                        <td><?= $producto ["stock"] ?></td>
                                        <td><?= $producto["categoria"] ?></td>
                                        <td><?= $producto["idproveedor"] ?></td>
                                        <td><?= $producto["proveedor"] ?></td>
                                        <td> S/ <?= $producto ["precio"] ?></td>
                                        <td>
                                            <div class="row">
                                                <a href="producto_editar.php?id=<?= $producto["id"] ?>">
                                                    <i style="color: #f7d547" class='bx bx-pencil'></i>
                                                </a>
                                                <a href="producto_eliminar.php?id=<?= $producto["id"] ?>"">
                                                    <i style="color: red" class='bx bx-trash-alt'></i>
                                                </a>
                                            </div>


                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table></center>
                    <br/>
                </div>
            </div>
            <br/>
            <br/>
        </section>
        <script src="../js/script.js" type="text/javascript"></script>
    </body>
</html>
