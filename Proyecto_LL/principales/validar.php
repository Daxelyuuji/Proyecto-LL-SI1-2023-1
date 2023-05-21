<?php
    session_start();
    if($_SESSION["acceso"] != "E14007a") {
        session_destroy();
        header("location: login.php?e=access");
    }
?>