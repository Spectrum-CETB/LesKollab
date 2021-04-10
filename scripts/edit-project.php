<?php

  // session_start
  session_start();

  // include db connection
  include('./db.php');

  // declare variables
  $pname = "";
  $id = "";
  $pdes = "";
  $plink = "";
  $tags = "";
  $field = "";

  // get form data
  if(isset($_POST['pname'])) {
    $pname = $_POST['pname'];
  }

  if(isset($_POST['id'])) {
    $id = $_POST['id'];
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
  

  function addStackToProject($stackname,$Projectid,$conn) {
   
    $getStackid = "SELECT * from `stack` where StackName='$stackname'";
    $stackId_ifExist = mysqli_query($conn,$getStackid) or die(mysqli_error($conn));
    if ($stackId_ifExist->num_rows != 0){   //if there is already stack with this name
      $data=mysqli_fetch_assoc($stackId_ifExist);
      $stackid=$data['Sid'];
      $insertProject_stack = "INSERT INTO `project_stack` Values($Projectid,$stackid)";
      //echo $insertProject_stack;
      $insertProjectStatus = mysqli_query($conn,$insertProject_stack) or die(mysqli_error($conn));
      return $insertProjectStatus;
    }
    else{                                                               // if there is no stack with this name
      $stack = "INSERT INTO `stack` (`StackName`) Values('$stackname')";  //insert the stack name 
      $insertstack = mysqli_query($conn,$stack) or die(mysqli_error($conn));
      $getStackid = "SELECT * from `stack` where StackName='$stackname'";
      $stackId_ifExist = mysqli_query($conn,$getStackid) or die(mysqli_error($conn));
      $data=mysqli_fetch_assoc($stackId_ifExist);
      $stackid=$data['Sid'];
      $insertProject_stack = "INSERT INTO `project_stack` Values($Projectid,$stackid)";
      $insertProjectStatus = mysqli_query($conn,$insertProject_stack) or die(mysqli_error($conn));
      return $insertProjectStatus;
    }
  }

  function removestacksofproject($id,$conn){
    $remove="DELETE from `project_stack` WHERE P_id=$id";
    $insertstack = mysqli_query($conn,$remove) or die(mysqli_error($conn));
  }

  if( $pname != "" && $pdes != "" && $plink != "" && $tags != "" && $field != "") { // if the fields are not empty!
    //Folders for uploading files
    if(!empty($_FILES["screenshot"]["name"])){        // if the user upload new screenshot

    $uploadDirectory = "../Explore/projects/$pname/";

     if (!file_exists("$uploadDirectory")) { //if not then create the folder
         mkdir("$uploadDirectory", 0777, true);
     }

    $photo_image = $uploadDirectory.basename(time() .$_FILES["screenshot"]["name"]);

    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($photo_image, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
        $checkPhoto = getimagesize($_FILES["screenshot"]["tmp_name"]);

        if ($checkPhoto !== false) {
            echo "File is an image - " . $checkPhoto["mime"] . ".";
            $uploadOk = 1;
        } else {
          $message= "File is not an image.";
            $uploadOk = 0;
        }

      }

    // Check if file already exists
    if (file_exists($photo_image)) {
      $message= "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["screenshot"]["size"] > 500000) {
      $message= "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      $message= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      header("Location: ../Explore/index.php?message=$message");
    // if everything is ok, try to upload file
    } else {
      $screenshot = basename(time() .$_FILES["screenshot"]["name"]);
      if (move_uploaded_file($_FILES["screenshot"]["tmp_name"], $photo_image)) {

        // update into the database!
       
        $updateProject = "UPDATE `projects` SET pname='$pname', pdes='$pdes', plink='$plink' , field='$field' , screenshot='$screenshot' WHERE id=$id ";
        $updateProjectStatus = mysqli_query($conn,$updateProject) or die(mysqli_error($conn));

        removestacksofproject($id,$conn);      //remove the relation betwen stacks and project
        $stacks = explode(" ", $tags);    //get array of stacks 
        for( $i=0; $i<count($stacks); $i++){
        if($stacks[$i] !=' ' && $stacks[$i] != null ){
           // echo $stacks[$i];
         $insrtStacks= addStackToProject($stacks[$i],$id ,$conn); //try t insert stack with prject id in Project Stack table
        } 
        }

        if($updateProjectStatus &&   $insrtStacks) { // insert into the database!

          header('Location: ../Explore/index.php?message=Project edited Successfully!');

        } else {

          header('Location: ../Explore/index.php?message=Unable to edit project!');

        }

      } else {

        header('Location: ../Explore/index.php?message=Unable to upload the screenshots');

      }
  }
}else{              // if the user not upload screenshot

    $updateProject = "UPDATE `projects` SET pname='$pname', pdes='$pdes', plink='$plink' , field='$field' WHERE id=$id ";
    $updateProjectStatus = mysqli_query($conn,$updateProject) or die(mysqli_error($conn));

    removestacksofproject($id,$conn);
    $stacks = explode(" ", $tags);    //get array of stacks 
    for( $i=0; $i<count($stacks); $i++){
    if($stacks[$i] !=' ' && $stacks[$i] != null ){
      //  echo $stacks[$i];
     $insrtStacks= addStackToProject($stacks[$i],$id ,$conn); //try t insert stack with prject id in Project Stack table
    } 
    }
    if($updateProjectStatus &&   $insrtStacks) { // insert into the database!

        header('Location: ../Explore/index.php?message=Project edited Successfully!');

      } else {

        header('Location: ../Explore/index.php?message=Unable to edit project!');

      }

    }

 } 
else { //fields are not empty!

    header('Location: ../Explore/index.php?message=Please fill the details properly!');

  }
?>
