<!DOCTYPE html>  
<!-- Autor: José
    Esta vista sirve para ingresar un producto nuevo a la canasta (Administrador)-->
<html class="es">
    <head>
        <title>Nuevo Producto &copy;</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../Imagenes/favicon-32x32.png">
        <link href="../CSS/style.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/carrito_procesar.css" rel="stylesheet" type="text/css"/>
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
        <section class="home" >

            <br/>
            <br/>
            <center>
                <form class="form-register" method="post" action="../Model/M_canasta_procesar.php">
                    <h2 style="padding: 40px; color: #FFA500">NUEVO PRODUCTO</h2>
                    <br/>
                    <div class="form-register__header">
                        <ul class="progressbar">
                            <li class="progressbar__option active">Paso 1</li>
                            <li class="progressbar__option">Paso 2</li>
                            <br/>
                    </div>
                    <div class="form-register__body">
                        <div class="step active" id="step-1">
                            <div class="step__header">
                                <h2 class="step__title">Canasta <small>( Paso 1)</small></h2>
                            </div>
                            <div class="step__body">
                                <label for="producto"> Nombre de Producto </label><br/>
                                <br/>
                                <input type="text"  name="producto"  class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="step__body">
                                <span class="input-group-text" id="basic-addon1">Precio </span><br/>
                                <br/>
                                <input type="text"  name="precio"  class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            </div>

                            <div class="step__footer">
                                <button type="button" class="step__button step__button--next" data-to_step="2" data-step="1">Siguiente</button>
                            </div>
                        </div>

                        <div class="step" id="step-2">
                            <div class="step__header">
                                <h2 class="step__title">Canasta <small>( Paso 2)</small></h2>
                            </div>
                            
                            <div class="step__body">
                                <span class="input-group-text" id="basic-addon1">Cantidad</span><br/>
                                <br/>
                                <input type="number"  name="cantidad"  class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
                                <br/><!-- comment -->
                                
                                <span class="input-group-text" id="basic-addon1">Metodo de pago</span><br/>
                                <br/>
                                <input type="text"  name="metodopago"  class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                            
                            <div class="step__footer">
                                <button type="button" class="step__button step__button--back" data-to_step="1" data-step="2">Regresar</button>
                                <button type="submit" class="step__button step__button--back"  name="btn-agregar" id="btn-agregar">Registrar</button>                        
                            </div>
                        </div>
                    </div>
                </form></center>
            <br/>
            <br/>
        </section>
        <script src="../js/script.js" type="text/javascript"></script>
        <script src="../js/register.js" type="text/javascript"></script>
    </body>
</html>
