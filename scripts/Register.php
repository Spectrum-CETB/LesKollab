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
  $profile = "";
  $bio = "";
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

  if(isset($_POST['user_bio'])) {
    $bio = $_POST['user_bio'];
  }


  if($email != "" && $password != "" && $github != "" && $linkedin != "" && $bio != "") { // if the fields are not empty!

    // check for user
    $checkUser = "SELECT * FROM `users` WHERE `email` = '$email'";
    $checkUserStatus = mysqli_query($conn,$checkUser) or die(mysqli_error($conn));

    if(mysqli_num_rows($checkUserStatus) > 0) { // if the user exists!

      header('Location: ../index.php?message=User already exists!&status=danger');

    } else {

        //Folders for uploading files
        $uploadDirectory = "../uploads/$name/";

        if (!file_exists("$uploadDirectory")) { //if not then create the folder

            mkdir("$uploadDirectory", 0777, true);

        }

        $photo_image = $uploadDirectory.basename(time() .$_FILES["profile"]["name"]);

        $uploadOk = 1;

        $imageFileType = strtolower(pathinfo($photo_image, PATHINFO_EXTENSION));

        if (isset($_POST["submit"])) {
            $checkPhoto = getimagesize($_FILES["profile"]["tmp_name"]);

            if ($checkPhoto !== false) {
                echo "File is an image - " . $checkPhoto["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

      }

      // Check if file already exists
      if (file_exists($photo_image)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }

      // Check file size
      if ($_FILES["profile"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        header('Location: ../index.php?message=Some error occured while uploading your pic!&status=danger');
      // if everything is ok, try to upload file
      } else {
        $profile = basename(time() .$_FILES["profile"]["name"]);
        if (move_uploaded_file($_FILES["profile"]["tmp_name"], $photo_image)) {
          $newPassword = md5(md5($password.$salt));

          // insert user
          $insertUser = "INSERT INTO `users`(`email`,`name`,`password`,`github`,`linkedin`,`profile`,`salt`,`bio` ,`createdAt`) VALUES('$email','$name','$newPassword','$github','$linkedin','$profile','$salt', '$bio','$createdAt')";
          $insertUserStatus = mysqli_query($conn,$insertUser) or die(mysqli_error($conn));

          if($insertUserStatus) { // if user is entered successfully!

            header('Location: ../index.php?message=You have registered successfully!&status=success');

          } else {

            header('Location: ../index.php?message=Unable to register! Try again some time later!&status=danger');

          }
        } else {
          header('Location: ../index.php?message=Unable to upload your profile pic!');
        }
      }
    }

  } else { // if the fields are empty!

    header('Location: ../index.php?message=Please fill the details properly!');

  }
?>
