
<?php
include_once '../Model/M_validar.php';
include_once '../Controller/mysql.php';
try {
    conectar();
} catch (Exception $ex) {
    die($ex->getMessage());
}
$registros = consultar("SELECT * FROM canasta");
# var_dump($registros);
?>



<!DOCTYPE html>
<html class="es">
    <head>
        <title>Nuevo Producto &copy;</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../Imagenes/favicon-32x32.png">
        <link href="../CSS/style.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/canasta.css" rel="stylesheet" type="text/css"/>
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
                            <a href="../View/v_principal.php">
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
                <form class="form-register" method="post" action="#" style="text-align: center">

                    <div class="form-register__header">
                        <ul class="progressbar">
                            <li class="progressbar__option active">Paso 1</li>
                            <li class="progressbar__option">Paso 2</li>
                            <li class="progressbar__option "> Paso 3 </li>
                            <br/>
                    </div>
                    <div class="form-register__body">
                        <div class="step active" id="step-1">
                            <div class="step__header">
                                <h2 class="step__title"> Canasta <small>( Paso 1)</small></h2>
                            </div>
                            <div class="container-fluid" style="color: green" >
                                <center> <h1 class="text nav-text">COMPRA</h1></center>
                                <div style="display:flex; " class="row">
                                    <center><a class="mi-boton" href="v_canasta_nuevo.php"> AGREGAR</a></center>
                                </div>
                                <div class="row">

                                    <center> <table id="miTabla" class="tablas" border="1" WIDTH="100%" style="color: black" >
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th id="2" >Nombre de Producto</th>
                                                    <th>Precio</th>
                                                    <th>Cantidad</th>
                                                    <th>Total de compra (S/)</th>
                                                    <th colspan="1"><center>Accion</center></th>
                                            </tr>
                                            </thead>

                                            <tbody style="text-align: center">
                                                <?php $total = 0; ?>
                                                <?php foreach ($registros as $canasta) : ?>

                                                    <tr style="text-align: center">
                                                        <td><?= $canasta ["id"] ?></td>
                                                        <td><?= $canasta ["producto"] ?></td>
                                                        <td> S/ <?= $canasta ["precio"] ?></td>
                                                        <td ><?= $canasta ["cantidad"] ?></td>
                                                        <td>  S/ <?= number_format($canasta ["cantidad"] * $canasta ["precio"], 2) ?></td>

                                                        <td>
                                                            <a href="../Model/M_canasta_eliminar.php?id=<?= $canasta["id"] ?>"">
                                                                <i style="color: red" class='bx bx-trash-alt'></i>
                                                            </a>

                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $total = $total + ($canasta ["cantidad"] * $canasta ["precio"]);
                                                    ?>

                                                <?php endforeach; ?>



                                            <br/>
                                            </tbody>
                                            <tbody style="text-align: center">
                                                <tr>
                                                    <td colspan="4">Total</td>

                                                    <td>S/ <?= $total ?></td>
                                                    <td><a href="../Model/M_canasta_vaciar.php">
                                                            <i style="color: red" class='bx bx-trash-alt'> Cancelar</i>
                                                        </a></td></td>
                                                </tr>


                                            </tbody>
                                        </table></center>

                                    <br/>
                                </div>
                            </div>

                            <div class="step__footer">
                                <button type="button" class="step__button step__button--next" data-to_step="2" data-step="1">Siguiente</button>
                            </div>
                        </div>

                        <div class="step" id="step-2">
                            <div class="step__header">
                                <h2 class="step__title">Canasta<small>( Paso 2)</small></h2>
                            </div>
                            <div class="row">
                                <center> <table id="miTabla" class="tablas" border="1" WIDTH="100%" style="color: black" >
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th id="2" >Nombre de Producto</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th>Precio Total</th>
                                            </tr>
                                        </thead>

                                        <tbody style="text-align: center">

                                            <?php foreach ($registros as $canasta) : ?>

                                                <tr style="text-align: center">
                                                    <td><?= $canasta ["id"] ?></td>
                                                    <td><?= $canasta ["producto"] ?></td>
                                                    <td> S/ <?= $canasta ["precio"] ?></td>
                                                    <td ><?= $canasta ["cantidad"] ?></td>
                                                    <td>  <?= number_format($canasta ["cantidad"] * $canasta ["precio"], 2) ?></td>
                                                </tr>

                                            <?php endforeach; ?>
                                        <br/>
                                        </tbody>
                                        <tbody style="text-align: center">
                                            <tr>
                                                <td colspan="4">Total</td>
                                                <td>S/ <?= $total ?></td>
                                            </tr>


                                        </tbody>
                                    </table></center>

                                <br/>
                            </div>
                            <div class="step__footer">
                                <button type="button" class="step__button step__button--back" data-to_step="1" data-step="2">Regresar</button>
                                <button type="button" class="step__button step__button--next" data-to_step="3" data-step="2">Siguiente</button>

                            </div>
                        </div>
                        <div class="step" id="step-3">
                            <div class="step__header">
                                <h2 class="step__title">Canasta - Confirmar <small> ( Paso 3)</small></h2>
                            </div>
                            <br/><!-- comment -->
                            <br/>
                            <hr/>
                            <br/>
                            <h2>¿Desea registra la compra?</h2>
                            <br/><!-- comment -->
                            <hr/>
                            <div class="step__footer">
                                <button type="button" class="step__button step__button--back" data-to_step="2" data-step="3">Regresar</button>
                                <button type="submit" class="step__button step__button--back"  name="btn-agregar" id="btn-agregar">Registrar</button>                        
                            </div>
                        </div>

                    </div>
                    </div>
                </form></center>
            <br/>
            <br/>
        </section>
        <script src="../js/calcular.js" type="text/javascript"></script>
        <script src="../js/script.js" type="text/javascript"></script>
        <script src="../js/register.js" type="text/javascript"></script>
    </body>
</html>
