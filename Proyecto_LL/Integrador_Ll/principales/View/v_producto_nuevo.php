<!DOCTYPE html>
<html class="es">
    <head>
        <title>Nuevo Producto &copy;</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../Imagenes/favicon-32x32.png">
        <link href="../CSS/style.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/nuevoPro.css" rel="stylesheet" type="text/css"/>
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
    <section class="home" >

        <br/>
        <br/>
        <center>
            <form class="form-register" method="POST" action="../Model/M_producto_procesar.php" enctype="multipart/form-data">

                <div class="form-register__header">
                    <ul class="progressbar">
                        <li class="progressbar__option active">Paso 1</li>
                        <li class="progressbar__option">Paso 2</li>
                        <br/>
                </div>
                <div class="form-register__body">
                    <div class="step active" id="step-1">
                        <div class="step__header">
                            <h2 class="step__title">Nuevo Producto <small>( Paso 1)</small></h2>
                        </div>
                        <div class="step__body">
                            <label>Producto</label><br/>
                            <br/>
                            <input type="text" class="form-control" name="producto" required>
                        </div>
                        <div class="step__body">   
                            <label>Imagen</label><br/>
                            <br/>
                            <input type="file" class="form-control-file" name="imagen" required>
                        </div>
                        <div class="step__body">
                            <label>Precio S/.</label><br/>
                            <br/>
                            <input type="number" class="form-control" name="precio" step="0.01" required>

                        </div>

                        <div class="step__footer">
                            <button type="button" class="step__button step__button--next" data-to_step="2" data-step="1">Siguiente</button>
                        </div>
                    </div>

                    <div class="step" id="step-2">
                        <div class="step__header">
                            <h2 class="step__title">Información de Producto <small>( Paso 2)</small></h2>
                        </div>
                        <div class="step__body">
                            <label>Stock</label><br/>
                            <br/>
                            <input type="number" class="form-control" name="stock" required>
                        </div>
                        <div class="step__body">
                            <span class="input-group-text" id="basic-addon1">Categoria</span><br/>
                            <br/>
                            <select class="step__body" name="categoria" required>
                                <option value="Bebidas" selected="selected">Bebidas</option>
                                <option value="Viveres">Viveres</option>
                                <option value="Limpieza">Limpieza</option>
                            </select>
                        </div>
                        <div class="step__body">
                            <span class="input-group-text" id="basic-addon1">Id Proveedor</span><br/>
                            <br/>
                            <input type="number"  name="idproveedor"  class="form-control" required>
                        </div>
                        <div class="step__body">
                            <span class="input-group-text" id="basic-addon1">Proveedor</span><br/>
                            <br/>
                            <input type="text"  name="proveedor"  class="form-control" required>
                        </div>
                        <div class="step__footer">
                            <button type="button" class="step__button step__button--back" data-to_step="1" data-step="2">Regresar</button>
                            <button type="submit" class="step__button step__button--back"  name="btn-agregar" id="btn-agregar">Enviar</button>                        
                        </div>
                    </div>
                </div>
            </form></center>
        <br/>
        <br/>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function mostrarMensaje(titulo, mensaje, tipo) {
            Swal.fire({
                title: titulo,
                text: mensaje,
                icon: tipo,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Aceptar'
            });
        }
    </script>
    <script src="../js/script.js" type="text/javascript"></script>
    <script src="../js/register.js" type="text/javascript"></script>
</body>
</html>
