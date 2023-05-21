<?php
include_once '../Controller/mysql.php';
$correo = $_POST["correo"];
$pass = $_POST["clave"];
$sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND "
        . "AES_DECRYPT(clave, '$pass') = '$pass';";
try {
    conectar();
    $resultado = consultar($sql);
    desconectar();
} catch (Exception $exc) {
    header("location: v_login_admin.php");
}
if (count($resultado) == 1) :
    session_start();
    $_SESSION["acceso"] = "E14007a";
    #var_dump($resultado[0]);
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
                                <a href="v_principal.php">
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
                            <li class="nav-link">
                                <a href="v_trabajadores.php">
                                    <i class='bx bx-wallet icon' ></i>
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
                <div class="text"><center><h2>Bienvenido Administrador</h2></center></div>
                <br/><!-- comment -->
                <div class="container">
                    <br/>
                    <div class="left box-primary">
                        <img class="image1" src="https://pps.whatsapp.net/v/t61.24694-24/343394100_1349711502266831_7172665187624729250_n.jpg?ccb=11-4&oh=01_AdSGnMLjwHFDBaJLZbSA-sl5SI96-sYQ30qm5_kUX-5Gew&oe=64663370" alt="" />
                        <h3 class="username text-center">José Ynoñan Vidaurre</h3>
                        <a href="#" class="btn btn-primary btn-block"><b>Editar foto</b></a>
                    </div>
                    <div class="right tab-content">
                        <form class="form-horizontal" action="actualizar.php">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Nombre y Apellidos</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class= "col-sm-12 has-feedback">
                                    <label for="" class="control-label">Modalidades de trabajo</label>
                                    <select title="Para escolher várias modalidades, segure a tecla Ctrl" alt="Para escolher várias modalidades, segure a tecla Ctrl" name="modalidades[]" class="form-control" multiple="">
                                        <option value="1">Administrador - Empleados</option>
                                        <option value="2">Administrador - Productos</option>
                                        <option value="10">Administrador - Proveedores</option>
                                        <option value="3">Administrador - Notificaciones</option>
                                        <option value="5">Administrador - Ingresos</option>
                                        <option value="18">Desportivo - Natação - Borboleta - 25 metros</option>
                                        <option value="13">Desportivo - Natação - Borboleta - 50 metros</option>
                                        <option value="17">Desportivo - Natação - Costa - 25 metros</option>
                                        <option value="12">Desportivo - Natação - Costa - 50 metros</option>
                                        <option value="19">Desportivo - Natação - Livre - 25 metros</option>
                                        <option value="14">Desportivo - Natação - Livre - 50 metros</option>
                                        <option value="16">Desportivo - Natação - Peito - 25 metros</option>
                                        <option value="11">Desportivo - Natação - Peito - 50 metros</option>
                                        <option value="20">Desportivo - Natação - Revezamento - 4x25 metros</option>
                                        <option value="15">Desportivo - Natação - Revezamento - 4x50 metros</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <a href="editar.php" class="btn btn-primary btn-block" style="width: 100px"><b>EDITAR</b></a>
                            </div>
                        </form>
                    </div>
                </div>

            </section>
            <script src="../js/script.js" type="text/javascript"></script>
        </body>
    </html>
    <?php
else:
    session_start();
    session_destroy();
    header("location: v_login_admin.php?e=user");
endif;
?>
