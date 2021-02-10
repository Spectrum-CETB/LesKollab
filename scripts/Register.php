<?php

  // session start
  session_start();

  // include db connection
  include('./db.php');

  // declare variables
  $email = "";
  $name = "";
  $password = "";
  $github = "";
  $linkedin = "";
  $salt = uniqid();
  $createdAt = date('m-d-Y H:i');

  // get variables from the form
  if(isset($_POST['email'])) {
    $email = $_POST['email'];
  }

  if(isset($_POST['name'])) {
    $name = $_POST['name'];
  }

  if(isset($_POST['password'])) {
    $password = $_POST['password'];
  }

  if(isset($_POST['github'])) {
    $github = $_POST['github'];
  }

  if(isset($_POST['linkedin'])) {
    $linkedin = $_POST['linkedin'];
  }

  if($email != "" && $password != "" && $github != "" && $linkedin != "") { // if the fields are not empty!

    // check for user
    $checkUser = "SELECT * FROM `users` WHERE `email` = '$email'";
    $checkUserStatus = mysqli_query($conn,$checkUser) or die(mysqli_error($conn));

    if(mysqli_num_rows($checkUserStatus) > 0) { // if the user exists!

      header('Location: ../index.php?message=User already exists!');

    } else {

      $newPassword = md5(md5($password.$salt));

      // insert user
      $insertUser = "INSERT INTO `users`(`email`,`name`,`password`,`github`,`linkedin`,`salt`,`createdAt`) VALUES('$email','$name','$newPassword','$github','$linkedin','$salt','$createdAt')";
      $insertUserStatus = mysqli_query($conn,$insertUser) or die(mysqli_error($conn));

      if($insertUserStatus) { // if user is entered successfully!

        header('Location: ../index.php?message=You have registered successfully!');

      } else {

        header('Location: ../index.php?message=Unable to register! Try again some time later!');

      }

    }

  } else { // if the fields are empty!

    header('Location: ../index.php?message=Please fill the details properly!');

  }
?>
