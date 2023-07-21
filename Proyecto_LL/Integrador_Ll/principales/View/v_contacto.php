<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <title>Contacto &copy;</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../Imagenes/favicon-32x32.png">
        <link href="../CSS/Contactanos.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body>
        <?php require_once './v_hadder.php'; ?>
        <nav class="Contactanos d-flex">
            <div class="Numeros">
                <h1>Nuestros Canales</h1>
                <p>Si desea comunicarse con nosotros frente a una duda o informacion se puede comunicar mediante los siguientes canales</p>
                <div id="uno" class="row align-items-center">
                    <div class="col">
                        <h4>Número</h4>
                        <p><img src="../Imagenes/telephone.svg" height="50"> ###-###-###</p>
                        <p><b>Horario de Atencion</b></p>
                        <p>De Lunes a Viernes: 7 a.m-10 p.m</p>
                    </div>
                    <div class="col">
                        <h4>Correo</h4>
                        <p><img src="../Imagenes/envelope-at.svg" height="50" /> #########@Hotmail.com</p>
                        <p><b>Horario de Atencion</b></p>
                        <p>De Lunes a Viernes: 7 a.m-5 p.m</p>
                    </div>
                </div>
                <div id="dos" class="row">
                    <div class="col">
                        El horario de atencion de la tienda:<br>
                        <b>Lunes-Domingo:7 a.m.-10 p.m y Feriados de 7 a.m.-11 p.m</b><br>

                    </div>
                    <div class="col">
                        <h4>¡¡Te esperamos!!</h4>
                    </div>
                </div>
            </div>
            <img src="../Imagenes/Imagen_1.jpeg">
        </nav>
        <br/>
        <br/>
        <br/>
        <?php require_once './v_footer.php'; ?>
    </body>
</html>
