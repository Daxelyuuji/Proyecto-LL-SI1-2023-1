<?php

$conn = new mysqli("localhost","root","","bd_llauce");
if($conn -> connect_error){
    die('Error de conexion'. $conn ->connect_error);
}
        