<?php

session_start();

$_SESSION = array();
unset($_SESSION['name']);

session_destroy();


  header("Location: login.php");
  exit;

?>