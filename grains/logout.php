<?php
session_start();

unset($_SESSION['login']);
unset($_SESSION['session_cust_userid']);
unset($_SESSION['session_cust_username']);

session_destroy();
header('location:index.php');

?>