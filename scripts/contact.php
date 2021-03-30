<?php

// session start
session_start();

// include db connection
include('./db.php');

// declare variables
$email = "";
$name = "";
$number = "";
$msg = "";

// get form data
if(isset($_POST['email'])) {
    $email = $_POST['email'];
  }

  if(isset($_POST['name'])) {
    $name = $_POST['name'];
  }

  header('Location: ../index.php?message=Thank You for Contacting us');

?>