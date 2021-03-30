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

    // insert user
    $insertUser = "INSERT INTO `contact`(`name`,`email`,`number`,`msg`) VALUES(`$name`,`$email`,`$number`,`$msg`)";
    $insertUserStatus = mysqli_query($conn,$insertUser);

    if($insertUserStatus) { 

        header('Location: ../index.php?message=Unable to Contact! Try again some time later!');
        
    } else {
        
        header('Location: ../index.php?message=Thank You for Contacting us');

    }
  

?>