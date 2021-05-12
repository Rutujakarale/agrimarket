<?php
session_start();

unset($_SESSION['login']);
unset($_SESSION['session_cust_id']);
unset($_SESSION['session_cust_name']);
unset($_SESSION['adminlogin']);
unset($_SESSION['session_admin_id']);
unset($_SESSION['session_admin_name']);


session_destroy();
header('location:index.php');

?>