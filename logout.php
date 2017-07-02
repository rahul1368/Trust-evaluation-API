<?php
session_start();
include './functions.php';
unset($_SESSION['uemail']);
unset($_SESSION['uid']);
session_destroy();
redirect('./facebook login.php');

?>
