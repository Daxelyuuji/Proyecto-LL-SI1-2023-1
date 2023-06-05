

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
        <link href="../CSS/perfil.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/style.css" rel="stylesheet" type="text/css"/>
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
                        <a href="../View/v_canasta.php">
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

            <h2 style="padding: 30px">INVENTARIO DE PRODUCTOS</h2>

            <div class="row g-4">

                <div class="col-auto">
                    <label for="num_registros" class="col-form-label">Mostrar: </label>
                </div>

                <div class="col-auto">
                    <select name="num_registros" id="num_registros" class="form-select">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>

                <div class="col-auto">
                    <label for="num_registros" class="col-form-label">productos </label>
                </div>

                <div class="col-5"></div>

                <div class="col-auto">
                    <label for="campo" class="col-form-label">Buscar: </label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" id="buscar_producto" style="width: 200px" placeholder="Buscar.." oninput="filtrarProductos()">
                </div>
                <div class="col-auto">
                    <center><a class="mi-boton" href="../View/v_producto_nuevo.php" style="background-color: #2196F3" > <i class='bx bx-message-alt-add' style="width: 60px" > Nuevo</i></a></center>
                </div>
            </div>
            <br/>
            <table class="table" id="tabla_productos">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Categoría</th>
                        <th>Id proveedor</th>
                        <th>Proveedor</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php include_once '../admin_productos/tabla.php'; ?>
                </tbody>
            </table>
        </div>

    </section>
        <script src="../js/script.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/filtro.js" type="text/javascript"></script>


</body>

</html>
