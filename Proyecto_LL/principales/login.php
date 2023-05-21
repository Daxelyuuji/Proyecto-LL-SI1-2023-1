<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <title> Login &copy;</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../Imagenes/favicon-32x32.png">
        <link href="../CSS/Principal.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/login.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body   >
       
        <?php require_once './header.php'; ?>
        <nav class="login">
            <br/>
            <br/>
            <center>

                <br/>
                <h1 style="text-align: center">Acceso al sistema</h1>
                <form style="max-width: 400px; margin: 0 auto;" method="POST" action="intranet.php" border='1'>
                    <div class="form-floating mb-3 mt-3">
                        <input type="email" class="form-control" id="correo" name="correo" required>
                        <label for="correo">Correo Electronico</label>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control" id="clave" placeholder="Colocar contraseña" name="clave">
                        <label for="clave">Contraseña</label>
                    </div>
                    <p style="text-align: center">
                        <button type="submit" class="btn btn-success">Ingresar</button>                        
                    </p> 
                    <a href="registro_usuario.php">  No tienes cuenta. Registrate</a>
                </form>
                <?php if (isset($_GET["e"])) : ?>
                    <div class="alert alert-danger">
                        <?=
                        $_GET["e"] == "user" ?
                                "Credenciales inválidas " : ""
                        ?>
                        <?=
                        $_GET["e"] == "logout" ?
                                "Sesión cerrada " : ""
                        ?>
                        <?=
                        $_GET["e"] == "access" ?
                                "Requiere acceso " : ""
                        ?>
                    </div>
                <?php endif; ?>
            </center>
            <br/>
            <br/>
            <br/>
        </nav>
        <?php require_once './footer.php'; ?>
    </body>
</html>