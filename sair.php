<?php
session_start();
session_unset();
session_destroy();
header('Location:/pastelaria/usuario/login.php');
exit;
?>
