<?php
session_start();
session_destroy();
header('Location: /puskesmas/admin/login.php');
?>
