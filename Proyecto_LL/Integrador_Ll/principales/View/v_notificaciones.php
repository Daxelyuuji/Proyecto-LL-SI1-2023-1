
<!DOCTYPE html>
<!--Autor JOSE y ROY
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <title> Notificaciones &copy;</title>
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
        <section class="home" style=" width: 80%;; " >
            <h2 class="step__title" style="padding: 50px; text-align: center; color: blue">NOTIFICACIONES<small></small></h2>
            <div style="padding: 0px 20px">
                <?php
// Configuración de la cuenta de correo
                $hostname = '{imap.gmail.com:993/ssl}INBOX'; // Servidor IMAP y carpeta
                $username = 'minimarketllauce14@gmail.com'; // Nombre de usuario del correo
                $password = 'cqgtkvzwumbbqoki'; // Contraseña del correo
// Conexión al servidor IMAP
                $inbox = imap_open($hostname, $username, $password) or die('No se pudo conectar al servidor IMAP: ' . imap_last_error());

// Obtener los correos electrónicos
                $emails = imap_search($inbox, 'ALL');
// Verificar si hay correos electrónicos disponibles
                if ($emails) {
                    // Invertir el orden de los correos electrónicos para mostrar los más recientes primero
                    $emails = array_reverse($emails);

                    // Mostrar los correos electrónicos en la página web
                    foreach ($emails as $email_number) {
                        $overview = imap_fetch_overview($inbox, $email_number, 0);

                        // Decodificar el encabezado del asunto y convertirlo a UTF-8
                        $subject = imap_utf8($overview[0]->subject);

                        // Decodificar el encabezado del remitente y convertirlo a UTF-8
                        $from = utf8_decode(imap_utf8($overview[0]->from));

                        $date = $overview[0]->date;

                        echo '<div style="border: 1px solid #ccc; padding: 10px 50px; margin-bottom: 10px; background-color: khaki">';
                        echo '<h3>' . $subject . '</h3>';
                        echo '<br/>';
                        echo '<p style="float: left;"><strong>De:</strong> ' . $from . '</p>';
                        echo '<br/>';
                        echo '<p style="float: left;"><strong>Fecha:</strong> ' . $date . '</p>';
                        echo '<br/>';
                        // Generar el enlace para ver el mensaje completo
                        $message_link = sprintf('https://mail.google.com/mail/u/0/#inbox/%s', $overview[0]->uid);
                        echo '<p><a href="' . $message_link . '">Ver mensaje completo</a></p>';

                        // Marcar el correo electrónico como leído (opcional)
                        imap_setflag_full($inbox, $email_number, '\\Seen');

                        echo '</div>';
                    }
                }

// Cerrar la conexión al servidor IMAP
                imap_close($inbox);
                ?>


                <br/><!-- comment -->
                <br/><!-- comment -->
                <br/>
            </div>
        </section>

        <script src="../js/script.js" type="text/javascript"></script>
    </body>
</html>
