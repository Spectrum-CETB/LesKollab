<?php

  // session start
  session_start();

  // include db connection
  include('./db.php');

  // declare variables
  $email = "";
  $password = "";

  // get form data
  if(isset($_POST['email'])) {
    $email = $_POST['email'];
  }

  if(isset($_POST['password'])) {
    $password = $_POST['password'];
  }

  if($email != "" && $password != "") { // if the fields are not empty!

    // check user!
    $checkUser = "SELECT * FROM `users` WHERE `email` = '$email'";
    $checkUserStatus = mysqli_query($conn,$checkUser) or die(mysqli_error($conn));
    $checkUserRow = mysqli_fetch_assoc($checkUserStatus);

      if(mysqli_num_rows($checkUserStatus) > 0) { // if user exists!

        $dbPassword = $checkUserRow['password'];
        $salt = $checkUserRow['salt'];

        $newPassword = md5(md5($password.$salt));

        if($newPassword == $dbPassword) { // password matches with db!

          $_SESSION['email'] = $email;
          header('Location: ../Explore/index.php?message=Logged in successfully!&status=success');

        } else { // if password is incorrect!

          header('Location: ../index.php?message=The password is incorrect!&status=danger');

        }

      } else {

        header('Location: ../index.php?message=Sorry user doesnt exist! Please Register!&status=danger');

      }

  } else { // if the fields are empty!

    header('Location: ../index.php?message=Please fill the form properly!');

  }
?>
