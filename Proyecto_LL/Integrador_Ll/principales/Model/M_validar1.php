<?php
    session_start();
    if($_SESSION["jose"] != "77210858") {
        session_destroy();
        header("location: ../View/v_login.php?e=access");
    }
?>
