<?php require_once '../admin_productos/editar_img.php'; ?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html class="es">
    <head>
        <title> Administracion de Productos &copy;</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../Imagenes/favicon-32x32.png">
        <link href="../CSS/style.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/perfil.css" rel="stylesheet" type="text/css"/>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

        </script>
        <div class="menu-bar">

            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Buscar...">
                </li>

                <ul class="menu-links">
                    <li class = "nav-link">
                        <a href="../View/v_mantenimiento.php">
                            <i class='bx bx-home-alt icon' ></i> 
                            <span class="text nav-text">Inicio</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="canasta/canasta.php">
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
                        <a href= "../View/v_producto.php">
                            <i class='bx bx-notepad icon' ></i>
                            <span class="text nav-text">Productos</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href= "../View/v_trabajadores.php">
                            <i class='bx bx-user-plus icon' ></i>
                            <span class="text nav-text">Trabajadores</span>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="bottom-content">
                <li class="">
                    <a href="../View/v_login.php"> 
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
        <div class="col-auto">
            <h3 style="padding: 20px">PRODUCTO EDITAR</h3>
            <form action="../View/v_producto_editar.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                <label for="producto">Producto:</label><br/>
                <input type="text" name="producto" value="<?php echo $row['producto']; ?>"><br/>
                <label for="precio">Precio:</label><br/>
                <input type="text" name="precio" value="<?php echo $row['precio']; ?>"><br/>
                <label for="stock">Stock:</label><br/>
                <input type="text" name="stock" value="<?php echo $row['stock']; ?>"><br/>
                <label for="categoria">Categoría:</label><br/>
                <input type="text" name="categoria" value="<?php echo $row['categoria']; ?>"><br/>
                <label for="idproveedor">ID Proveedor:</label><br/>
                <input type="text" name="idproveedor" value="<?php echo $row['idproveedor']; ?>"><br/>
                <br/>
                <label for="proveedor">Proveedor:</label><br/>
                <input type="text" name="proveedor" value="<?php echo $row['proveedor']; ?>"><br/>
                <label for="imagen">Imagen:</label><br/>
                <input type="file" name="imagen"><br/>
                <br/>
                <input class="" type="submit" value="Actualizar" style="padding: 0px 15px">
                <input class="" type="submit" value="Cancelar" style="padding: 0px 15px">
            </form>
        </div>
    </section>
    <script src="../js/script.js" type="text/javascript"></script>
    <script src="../js/filtro.js" type="text/javascript"></script>


</body>

</html>
