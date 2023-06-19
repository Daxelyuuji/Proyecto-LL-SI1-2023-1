<?php
session_start();
session_destroy();
header("location: ../View/v_login.php?e=logout1");
?>