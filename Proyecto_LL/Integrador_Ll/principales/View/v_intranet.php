<?php
include_once '../Controller/mysql.php';
include_once '../Model/validar-intra.php';
//codigo source arreglado
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Intranet &copy;</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../Imagenes/favicon-32x32.png">
        <link href="../CSS/style.css" rel="stylesheet" type="text/css"/>
        
        <link href="../CSS/perfil.css" rel="stylesheet" type="text/css"/>
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                padding: 10px;
                text-align: center;
                border: 1px solid #ccc;
            }

        </style>
    </head> 
    <?php
    // moverlo a una clase model(en realidad es controller)
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        if ($error == "incorrecto") {
            echo "<h2>El usuario o contraseña no son correctos</h2>";
        }
        if ($error == "vacio") {
            echo "Campos vacios";
        }
    }
    ?>   
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
                            <a href= "v_trabajadores.php">
                                <i class='bx bx-user-plus icon' ></i>
                                <span class="text nav-text">Trabajadores</span>
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
            <div class="text"><center><h2 style="padding: 50px">Bienvenido Administrador "Alex Llauce"</h2></center></div>
            <br/><!-- comment -->
            <center><div class="container" style="text-align: center; width: 100% ; padding: 0px 100px">
                    <center><div class="left box-primary" style="width: 30%">
                            <br/>
                            <img class="image1" style="width: 150px; height: 150px" src="https://us.123rf.com/450wm/gmast3r/gmast3r1411/gmast3r141100350/33865095-hombre-de-negocios-icono-de-perfil-retrato-masculino-plana.jpg?ver=6" sty />
                            <br/>
                            <h3 class="username text-center" style="padding: 20px">Alex Llauce Santisteban</h3>
                            <a href="#" class="btn-primary btn-block" style="padding: 6px 10px"><b>Editar foto</b></a>
                        </div></center>

                    <center><div class="left box-primary" style="width: 70% ">
                            <div style="width: 100%; padding: 70px 20px">
                                <center><table style="text-align: center">
                                        <tr style="background-color: #FFA500">
                                            <th colspan="5">Datos de Administrador</th>
                                        </tr>
                                        <tr style="background-color: #FFD200">
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Edad</th>
                                            <th>Correo</th>
                                            <th>Telelfono</th>
                                        </tr>
                                        <tr>
                                            <td>Alex </td>
                                            <td>Llauce Santisteban</td>
                                            <td>25</td>
                                            <td>minimarketllauce14@gmail.com</td>
                                            <td>972 087 792</td>
                                        </tr>
                                    </table></center>
                            </div>
                            <div style="padding: 20px">
                                <a href="#" type="submit" name="editar" style="padding: 5px 20px; background-color: #2196F3; border: 0px; color: #FFF">Editar</a>
                            </div>
                        </div></center>
                    <br/>
                </div>
            </center>

        </section>
        <script src="../js/script.js" type="text/javascript"></script>
    </body>
</html>