<?php
  session_start();
  unset($_SESSION['role']);
  unset($_SESSION['id']);
  unset($_SESSION['username']);
  unset($_SESSION['IS_LOGIN']);
  // Redirect to the login page:
  header('Location: login.php');
  die();
?>
