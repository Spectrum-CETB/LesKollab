<?php
  session_start();
  session_unset($_SESSION['email']);
  session_destroy();
  header('Location: ./index.php?message=You have logged out successfully!&status=success');
?>
