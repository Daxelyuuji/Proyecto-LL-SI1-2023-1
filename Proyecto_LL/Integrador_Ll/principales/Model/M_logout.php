<?php
session_start();
session_destroy();
header("location: ../View/v_login_admin.php?e=logout");
?>