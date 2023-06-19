
<!DOCTYPE html>
<!--Autor JOSE y ROY
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <title> Reportes &copy;</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../Imagenes/favicon-32x32.png">
        <link href="../CSS/style.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/analisis.css" rel="stylesheet" type="text/css"/>
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
                            <a href= "">
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
        <section class="home" style="padding: 0px 30px; background-color: khaki;">
            <h2 class="step__title" style="padding: 100px; text-align: center; color: green">ANALISIS - REPORTES<small></small></h2>
            
            <hr/>
            <br/>
            <br/>
            <div style="display: flex; justify-content: center;">
                <div style="margin-right: 20px; width: 33%" >
                    <img src="https://www.aplicacionesdenegocio.com/wp-content/uploads/2021/10/reporte-de-ventas-mercadolibre-mexico.png" style="width: 250px;">
                    <br/>
                    <center><a class="my-button" href="../fpdf/PruebaV.php">Generar Reporte ventas</a></center>
                </div>
                <div style="margin-right: 20px; width: 33%">
                    <img src="https://img.freepik.com/vector-premium/trabajadores-supermercados-haciendo-su-trabajo_23-2148549581.jpg" style="width: 250px;">
                    <br/>
                    <center><a class="my-button" href="../fpdf/PruebaH.php">Generar Reporte Trabajadores</a></center>
                </div>
                <div style="margin-right: 20px; width: 33%">
                    <img src="https://static.vecteezy.com/system/resources/previews/008/102/609/non_2x/basket-with-food-online-purchase-of-food-products-on-the-internet-local-market-and-grocery-store-online-grocery-shopping-food-delivery-services-fashionable-hand-drawn-banner-design-vector.jpg" style="width: 250px;">
                    <br/>
                    <center><a class="my-button" href="../fpdf/PDF_Canasta.php">Generar Reporte Canasta</a></center>
                </div>
            </div>
            <br/>
            <br/>
            <hr/>
        </section>

        <script src="../js/script.js" type="text/javascript"></script>
    </body>
</html>
