<?php

  // session_start
  session_start();

  // include db connection
  include('./db.php');

  // declare variables
  $bio = "";
  $email = "";

  // get form data
  if(isset($_POST['bio'])) {
    $bio = $_POST['bio'];
  }

  if(isset($_POST['email'])) {
    $email = $_POST['email'];
  }

  if($bio != "") { // if the field is not empty!

    // update users bio
    $updateBio = "UPDATE `users` SET `bio` = '$bio' WHERE `email` = '$email'";
    $updateBioStatus = mysqli_query($conn,$updateBio) or die(mysqli_error($conn));

    if($updateBioStatus) {
        header('Location: ../Explore/index.php?message=Bio added!');
    } else {
      header('Location: ../Explore/index.php?message=Unable to add bio!');
    }

  } else { // field is empty!

    header('Location: ../Explore/index.php?message=Please fill the details!');

  }
?>
