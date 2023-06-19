<?php 
    session_start();
    require_once '../Controller/conexion/config.php';
    
    if(isset($_SESSION['correo'])){

        $correo = $_SESSION['correo'];

        $sql = "SELECT * FROM registro WHERE correo = '$correo'";
        $resultado = $conn->query($sql);

        while ($row = $resultado->fetch_assoc()) {

            $nombre = $row['nombre'];
            $apellidos = $row['apellidos'];
            $correo = $row['correo'];
            $telefono = $row['telefono'];
            $direccion = $row['direccion'];
            $edad = $row['edad'] ;
            $genero = $row['genero'] ;
        }     
    }
    else{
        header("location: ../principales/login.php");  
    }
?> 
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <title> Datos_Cliente &copy;</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../Imagenes/favicon-32x32.png">
        <link href="../CSS/Productos.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/Estilo_Usuario.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body class="inge">
        <?php require_once '../cliente/header.php'; ?>
    <div class="info">
        <article class="inicio">
            <div style="padding: 0px 90px"><img src="../Imagenes/usuario.png" width="200" class="arriba" style="padding: 0px 30px"></div>
            <div style="padding: 0px 63px"><table class="superior">
                <tr>
                    <th>Nombres</th>
                    <td><?php echo $nombre;?></td>
                </tr>
                <tr>
                    <th>Apellidos</th>
                    <td><?php echo $apellidos ?></td>
                </tr>
                <tr>
                    <th>Correo Electronico</th>
                    <td><?php echo $correo ?></td>
                </tr>
                <tr>
                    <th>Edad</th>
                    <td><?php echo $edad ?></td>
                </tr>
                <tr>
                    <th>Genero</th>
                    <td><?php echo $genero?></td>
                </tr>

                </table></div>
            <br/><!-- comment -->
            <div><img src="../Imagenes/celular.png" width="40"><br/>
                <p> <?php echo $telefono ?></p></div>
            <hr/>
            <div><img src="../Imagenes/correo.png" width="40"> <br/>
                <p>  <?php echo " ". $correo ?></p></div>
            <hr/>
            <img src="../Imagenes/ubicacion.png" width="40"> <br/>
            <p> <?php echo "  ".$direccion ?></p>
            <hr/>
        </article>
    </div>
    <?php require_once '../cliente/footer.php'; ?>
</body>
</html>