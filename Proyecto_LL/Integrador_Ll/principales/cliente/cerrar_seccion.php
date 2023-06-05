<?php

    session_start();
    header("location: ../View/v_login.php");
    session_destroy();
?>