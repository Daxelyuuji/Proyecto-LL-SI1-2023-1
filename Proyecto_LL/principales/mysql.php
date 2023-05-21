
<?php
include_once '../conexion/configuracion.php';
$cnx = "";

function conectar() {
    global $cnx;
    $cnx = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
    mysqli_query($cnx, "set names utf8");
}

function desconectar() {
    global $cnx;
    $cnx = mysqli_close($cnx);    
}
# SELECT
function consultar(string $sql) {
    global $cnx;
    $bolsa = mysqli_query($cnx, $sql);
    $salida = array();
    if ($bolsa != null) {
        while ($row = mysqli_fetch_assoc($bolsa)) {
            $salida[] = $row;
        }
        mysqli_free_result($bolsa);
    } else {
        $salida = false;
    }
    unset($row);
    return $salida;
}
# INSERT, UPDATE y DELETE
function ejecutar(string $sql) {
    global $cnx;
    $exito = mysqli_query($cnx, $sql);
    if ($exito) {
        return true;
    } else {
        return false;
    }
}


function trimInside($varnombre){
$nombres = trim($varnombre);
    while(strpos($nombres, "  ") !== false){
    $nombres = str_replace("  ", " ", $nombres);
    }
return $nombres=ucwords(strtolower (trim($nombres))) ;

}






