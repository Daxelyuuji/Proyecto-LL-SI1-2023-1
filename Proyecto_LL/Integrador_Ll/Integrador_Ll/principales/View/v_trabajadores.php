<?php 
include_once '../Model/validar.php';
include_once '../Controller/mysql.php';
include_once '../Controllercaptura.php';
include_once '../Model/M_vista_trabajadores.php'
?>

<!DOCTYPE html>
<!--Autor JOSE y ROY
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
        <link href="../CSS/empleados.css" rel="stylesheet" type="text/css"/>
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
                            <a href="../View/v_mantenimiento.php">
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
                            <a href= "v_trabajadores.php">
                                <i class='bx bx-user-plus icon' ></i>
                                <span class="text nav-text">trabajadores</span>
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
            <center>
                <form class="form-register" method="post" action="" style="text-align: center" width="990px">

                    <div class="form-register__body" >
                        <div class="step active" id="step-1" >
                            <div class="step__header">
                                <h2 class="step__title"> MANTENIMIENTO DE TRABAJADORES <small></small></h2>
                            </div>
                            <div class="container-fluid" style="color: green" >
                                <div style="display:flex; " class="row">
                                    <center><a class="mi-boton" href="v_trabajadores_nuevo.php"> Agregar</a></center>
                                </div>
                                <br/>
                                <div style="display:flex; " class="row">
                                    <center><a class="mi-boton" href="#"> Consultar</a></center>
                                </div>
                                <div class="row">
                                    <center> <table class="tablas" border="1" WIDTH="90%" style="color: black" >
                                            <br/>
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <td>Codigo</td>
                                                    <th >Nombres</th>
                                                    <th >Apellidos</th>
                                                    <th>Celular</th>
                                                    <th>Correo Electrónico</th>
                                                    <th>Edad</th>
                                                    <th>Puesto</th>
                                                    <th>contraseña</th>
                                                    <th colspan="2"><center>Acciones</center></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($registros as $empleados): ?>
                                                    <tr style="text-align: center">
                                                        <td><?= $empleados ["id"] ?></td>
                                                        <td><?= $empleados ["codigo"] ?></td>
                                                        <td><?= $empleados ["nombre"] ?></td>
                                                        <td><?= $empleados ["apellidos"] ?></td>
                                                        <td><?= $empleados["celular"] ?></td>
                                                        <td><?= $empleados["correo"] ?></td>
                                                        <td><?= $empleados["edad"] ?></td>
                                                        <td><?= $empleados["cargo"] ?></td>
                                                        <td> <?= $empleados ["contrasena"] ?></td>
                                                        <td>
                                                            <div class="row">
                                                                <a href="../View/trabajadores_editar.php?id=<?= $empleados["id"] ?>">
                                                                    <i style="color: #f7d547" class='bx bx-pencil'></i>
                                                                </a>
                                                                <script type="text/javascript">
                                                                   function ConfirmarDelete(){
                                                                       return confirm("¿Desea eliminar al trabajador?");
                                                                   }

                                                                </script>

                                                                <a href="../Model/M_trabajadores_eliminar.php?id=<?= $empleados["id"] ?>" onclick="return ConfirmarDelete();">
                                                                    <i style="color: red" class='bx bx-trash-alt'></i>
                                                                </a>
                                                            </div>


                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table></center></div>
                                <br/>
                                <br/>
                            </div>
                        </div>
                        <br/>
                    </div>
                
                </form>
                <br/>
                <br/>
        </section>
        <script src="../js/script.js" type="text/javascript"></script>
    </body>
</html>
