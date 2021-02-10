<?php

  // session_start
  session_start();

  // include db connection
  include('./db.php');

  // declare variables
  $pname = "";
  $email = "";
  $pdes = "";
  $plink = "";
  $tags = "";
  $field = "";
  $createdAt = date('m-d-Y H:i');

  // get form data
  if(isset($_POST['pname'])) {
    $pname = $_POST['pname'];
  }

  if(isset($_POST['email'])) {
    $email = $_POST['email'];
  }

  if(isset($_POST['pdes'])) {
    $pdes = $_POST['pdes'];
  }

  if(isset($_POST['plink'])) {
    $plink = $_POST['plink'];
  }

  if(isset($_POST['tags'])) {
    $tags = $_POST['tags'];
  }

  if(isset($_POST['field'])) {
    $field = $_POST['field'];
  }

  if($email != "" && $pname != "" && $pdes != "" && $plink != "" && $tags != "" && $field != "") { // if the fields are not empty!
    //Folders for uploading files
    $uploadDirectory = "../Explore/projects/$pname/";

    if (!file_exists("$uploadDirectory")) { //if not then create the folder

        mkdir("$uploadDirectory", 0777, true);

    }

    $photo_image = $uploadDirectory.basename($_FILES["screenshot"]["name"]);

    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($photo_image, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
        $checkPhoto = getimagesize($_FILES["screenshot"]["tmp_name"]);

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
    if ($_FILES["screenshot"]["size"] > 500000) {
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
      header('Location: ../Explore/index.php?message=Some error occured while uploading your pic!');
    // if everything is ok, try to upload file
    } else {
      $screenshot = basename($_FILES["screenshot"]["name"]);
      if (move_uploaded_file($_FILES["screenshot"]["tmp_name"], $photo_image)) {

        // insert into the database!
        $insertProject = "INSERT INTO `projects`(`email`,`pname`,`pdes`,`plink`,`screenshot`,`tags`,`field`,`createdAt`) VALUES('$email','$pname','$pdes','$plink','$screenshot','$tags','$field','$createdAt')";
        $insertProjectStatus = mysqli_query($conn,$insertProject) or die(mysqli_error($conn));

        if($insertProjectStatus) { // insert into the database!

          header('Location: ../Explore/index.php?message=Project added!');

        } else {

          header('Location: ../Explore/index.php?message=Unable to add project!');

        }

      } else {

        header('Location: ../Explore/index.php?message=Unable to upload the screenshots');

      }
  }
} else { //fields are not empty!

    header('Location: ../Explore/index.php?message=Please fill the details properly!');

  }
?>
