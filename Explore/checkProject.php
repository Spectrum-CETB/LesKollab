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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <title>Hello, world!</title>
  <style>
    .navbar  .navbar-brand img
    {
        width:10vw;
        height:10vh;
    }
    .navbar  .navbar-brand span
    {
      font-size:2rem;
    }
  </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/lesscolab/index.php"><img src="assets/img/logo1.png" alt="not found"> <span>LesKollab</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/"></a>
        </li>

      </ul>
    </div>
  </div>
</nav>
  <h1 class="text-center">Project Details</h1>
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
                 
                  // echo($userEmail.$projectName.$projectDesc.$projectLink.$projectField.$projectSS);
                ?>

  <div class="container col-lg-6">
    <div class="card mb-3">
      <img src="projects/<?=$projectName?>/<?=$projectSS?>" class="card-img-top" alt="...">
      <div class="card-body">
        <br>
        <h3 class="card-title">Project Name</h3>
        <p> <?php print($projectName) ?></p>
        <h3 class="card-title">Project Field</h3>
        <p><?php print($projectField) ?></p>
        <h3 class="card-text">Description </h3>
        <p>
          <?php print($projectDesc) ?>
        </p>
        <h3 class="card-text">Email of the Owner </h3>
        <p>
          <?php print($email) ?>
        </p>
        <a href="<?php $projectLink ?>"  class="mb-2 pb-2"> <h5 class="card-text mb-2">Project Link </h5></a>
        <a href="/lesscolab/Explore/index.php" class="btn btn-primary">Add More Projects</a>
      </div>
      
    </div>
  </div>



  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>