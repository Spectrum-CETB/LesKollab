<?php

  // session_start
  session_start();

  // include db connection
  include('./db.php');

  // declare variables
  $name = "";
  $id = "";
  $userEmail = "";
  $githublink = "";
  $linkedinLink = "";
  $bio = "";
  

  // get form data
  if(isset($_POST['name'])) {
    $name = $_POST['name'];
  }

  if(isset($_POST['id'])) {
    $id = $_POST['id'];
  }

  if(isset($_POST['userEmail'])) {
    $userEmail = $_POST['userEmail'];
  }

  if(isset($_POST['githublink'])) {
    $githublink = $_POST['githublink'];
  }

  if(isset($_POST['linkedinLink'])) {
    $linkedinLink = $_POST['linkedinLink'];
  }

  if(isset($_POST['bio'])) {
    $bio = $_POST['bio'];
  }
  


  if( $name != "" && $userEmail != "" && $githublink != "" && $bio != "" && $linkedinLink != "") { // if the fields are not empty!
       
        $updateProject = "UPDATE `users` SET name='$name', email='$userEmail', github='$githublink', linkedin='$linkedinLink' , bio='$bio'  WHERE id=$id ";
        $updateProjectStatus = mysqli_query($conn,$updateProject) or die(mysqli_error($conn));

        if($updateProjectStatus) { // insert into the database!

          header('Location: ../Explore/index.php?message=Profile edited Successfully!&status=success');

        } else {

          header('Location: ../Explore/index.php?message=Unable to edit Profile!&status=danger');

        }

      }
else { //fields are not empty!

    header('Location: ../Explore/index.php?message=Please fill the details properly!&status=danger');

  }
?>
