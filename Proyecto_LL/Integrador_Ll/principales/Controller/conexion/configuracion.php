<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_llauce";



$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>

<?php
date_default_timezone_set("America/Lima");
define("DB_HOST", "localhost");
define("DB_USER", "root");   # Usuario root
define("DB_PASSWORD", "");   # Sin contraseña
define("DB_NAME", "bd_llauce");   # Nombre de la base de datos
define("DB_PORT", "3306");
?> 