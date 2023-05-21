<?php
    session_start();
    if($_SESSION["acceso"] != "E14007a") {
        session_destroy();
        header("location: ../View/v_login_admin.php?e=access");
    }
?>
