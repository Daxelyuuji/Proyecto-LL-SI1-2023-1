<?php
include_once '../Model/validar.php';
include_once '../Controller/mysql.php';
include_once '../Controller/captura.php';
include_once '../Model/validar-pro.php';
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                            <a href="v_mantenimiento.php">
                                <i class='bx bx-home-alt icon' ></i> 
                                <span class="text nav-text">Inicio</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="v_canasta.php">
                                <i class='bx bx-bar-chart-alt-2 icon' ></i>
                                <span class="text nav-text">Procesar - Compra</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="v_notificaciones.php">
                                <i class='bx bx-bell icon'></i>
                                <span class="text nav-text">Notificaciones</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="v_analisis.php">
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
                            <a href= "v_producto.php">
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
                        <a href="v_login.php"> 
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
            
            <center> <h1 class="text nav-text">CONSULTA DE PRODUCTOS</h1></center>
            <center><section>
                <?php 
                error_reporting(0);
                ?>
                <form method="post">
                    <table border ="2" width="600" cellspacing="5" cellpadding="0">
                        <tr>
                            <td>Ingreso de id de producto </td>
                            <td><input type="text" name="id" value="<?php  echo getid(); ?>"
                                       value="<?php echo getid(); ?>"
                                       maxlength="5"/>
                            </td>
                            <td><input type="submit" value="BUSCAR" /></td>
                        </tr>
                    </table>
                      <br>
                    
                </form>
                     <?php 
                    $id = getid();
                    $rs = mysql_query("CALL sp_productoid('$id')",$cn);
                    $producto = mysql_fetch_array($rs);
                    ?>
                    <br>
                    <table border="2" width="600" cellspacing="4" callpadding="5">
                        <tr>
                            <th>Producto</th>
                            <td><?php  echo $producto[1]; ?></td>
                        </tr
                </section></center>

        </section>
    </body>
</html>