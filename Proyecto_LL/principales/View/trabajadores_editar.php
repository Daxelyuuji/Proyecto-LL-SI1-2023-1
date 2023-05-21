<?php
include_once '../Controller/mysql.php';
$id = $_GET["id"];
try {
    conectar();
    $sql = "SELECT * FROM empleados WHERE id = $id";
    $registros = consultar($sql);
    $empleados = $registros[0];
    desconectar();
} catch (Exception $e) {
    die($e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Editar Empleados &copy;</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="../Imagenes/favicon-32x32.png">
        <link href="../CSS/Principal.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/editar-p.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body class="editar">
        <?php require_once './v_hadder.php'; ?>
        <div class="sises">
            <center>
                <h2 style="color: green">Actualizar empleados</h2>
                <br/>
                <form action="../Model/M_trabajadores_procesar.php" method="post">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Código</span>
                            <input type="text"  name="codigo" class="form-control" value="<?= $empleados["codigo"] ?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <input type="hidden" name="id" class="form-control" value="<?= $empleados["id"] ?>">
                    </div>

                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Nombres</span>
                            <input type="text"  name="nombre" value="<?= $empleados["nombre"] ?>" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Apellidos</span>
                            <input type="text"  name="apellidos" value="<?= $empleados["apellidos"] ?>" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Celular</span>
                            <input type="text"  name="celular" value="<?= $empleados["celular"] ?>" class="form-control"  maxlength="9" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Correo Electronico</span>
                            <input type="email"  name="correo" value="<?= $empleados["correo"] ?>" class="form-control"  placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Edad</span>
                            <input type="number"  name="edad" value="<?= $empleados["edad"] ?>" class="form-control"  placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Puesto</span>
                            <input type="text"  name="cargo" value="<?= $empleados["cargo"] ?>" class="form-control"  placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Contraseña</span>
                            <input type="password"  name="contrasena" value="<?= $empleados["contrasena"] ?>" class="form-control"  placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <br />
                    <button class="btn btn-success" type="submit">Actualizar</button>
                    <a class="btn btn-primary" href="./v_trabajadores.php">Cancelar</a>
                </form>
                <br/>
        </div>
        <br/>
        <?php require_once './v_footer.php'; ?>
    </body>
</html>