<?php
  // session_start
  session_start();

  // include db connection
  include('../config/db.php');

  if(isset($_SESSION['email'])) {

    $email = $_SESSION['email'];
    $getUserDetails = "SELECT * FROM `users` WHERE `email` = '$email'";
    $getUserDetailsStatus = mysqli_query($conn,$getUserDetails);
    $getUserDetailsRow = mysqli_fetch_assoc($getUserDetailsStatus);

    $name = $getUserDetailsRow['name'];

  } else {

    header('Location: ../index.php?message=Please login first!');

  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Project Details</h1>
    <?php
                  $getProject = "SELECT * FROM `projects` WHERE id=48";
                  $getProjectsStatus = mysqli_query($conn,$getProject) or die(mysqli_error($conn));
                  $getAllProjectsRow = mysqli_fetch_assoc($getProjectsStatus);
                  $userEmail = $getAllProjectsRow['email'];
                  $projectName = $getAllProjectsRow['pname'];
                  $projectDesc = $getAllProjectsRow['pdes'];
                  $projectLink = $getAllProjectsRow['plink'];
                  $projectField = $getAllProjectsRow['field'];
                  $projectSS = $getAllProjectsRow['screenshot'];
                 
                  echo($userEmail.$projectName.$projectDesc.$projectLink.$projectField.$projectSS);
                ?>

        <div class="container">
        <h1>Hello</h1>
        <div class="card" style="width: 18rem;">
            <img src="projects/<?=$projectName?>/<?=$projectSS?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Project Name : <?php print($projectName) ?></h5>
                <h5 class="card-title">Project Field : <?php print($projectField) ?></h5>
                <p class="card-text">Description <br><?php print($projectDesc) ?></p>
                <a href="/lesscolab/Explore/index.php" class="btn btn-primary">Add More Projects</a>
            </div>
            </div>
        </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>