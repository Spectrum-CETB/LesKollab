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
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">

  <title>Project Description</title>
  <style>
    .navbar .navbar-brand img {
      width: 90px;
      height: 70px;
      color:white;
    }
    .navbar{
      background-color: #0000003b;
    }

    .navbar .navbar-brand span ,.nav-item {
      font-size: 2rem;
      font-family: 'Aclonica', sans-serif;
    }

    body
    {
      background-color: #052035;
      color:white;
    }
    /*** Table Styles **/
    a:hover
    {
      
      color: #fff;
    }
   

    h2 {
      color: white;
      margin-right: 14%;
    }
    .OE{
      display: inline;
      font-weight: bold;
    }
    .card{
      width:80%;
      margin:auto;
      margin-top: 100px;
      
    }
    .filed{
    background-color: #a10606;
    width: fit-content;
    padding: 6px;
    border-radius: 10px;
    font-weight: bold;
    margin: 15px;
    }
    .stacks{
      display:flex;
      justify-content:space-around;
      margin-bottom:30px;
    }
    .stack{
    background-color: gray;
    width: fit-content;
    padding: 6px;
    border-radius: 10px;
    }
    .color{
      color:gray;
      margin:20px;
    }

  </style>
</head>

<body>

  <nav class="navbar  navbar-dark ">
    <div class="container-fluid">
      <a class="navbar-brand" href="/lesscolab/index.php"><img src="assets/img/logo1.png" alt="not found">
        <span>LesKollab</span></a>
        <h2 class="nav-item active">
              Project Details
         </h2>
    </div>
  </nav>
  
  <?php
  $id = $_GET['id'];
                  $getProject = "SELECT * FROM `projects` WHERE id=$id";
                  $getProjectsStatus = mysqli_query($conn,$getProject) or die(mysqli_error($conn));
                  $getAllProjectsRow = mysqli_fetch_assoc($getProjectsStatus);
                  $userEmail = $getAllProjectsRow['email'];
                  $projectName = $getAllProjectsRow['pname'];
                  $projectDesc = $getAllProjectsRow['pdes'];
                  $projectLink = $getAllProjectsRow['plink'];
                  $projectField = $getAllProjectsRow['field'];
                  $projectSS = $getAllProjectsRow['screenshot'];
                  $getstacks = "SELECT `StackName` from `project_stack`,`stack` where S_id=Sid and P_id=$id";
                  $getAllstacks = mysqli_query($conn, $getstacks) or die(mysqli_error($conn));
                 
                  // echo($userEmail.$projectName.$projectDesc.$projectLink.$projectField.$projectSS);
                ?>
       <div class="container" style="margin-bottom:50px">
         <div class="row">
         <div class="col-lg-6">
         <h2 class="display-4">  <?php print($projectName) ?> </h2>
         <a  href="<?= $projectLink ?>" >  <?= $projectLink ?>  </a>
      </br>
      </br>
      </br>
         <p> <?= $projectDesc?> </p>

<div> <div class="OE"> <img src="https://img.icons8.com/nolan/40/email.png"/> Owner Email :</div> <?=$userEmail ?></div>

         </div>

       <div class="col-lg-6">
    <div class="card">
      <img src=".\projects\<?=$projectName?>\<?=$projectSS?>"/>
  </br>
  <div class="filed"> <?=$projectField?> </div>
  <hr style="color:black; width:90%;  margin:auto;">
  <h5 class="color"> Technologies: </h5>
  <div class="stacks">
  <?php while ($getAllstacksRow = mysqli_fetch_assoc($getAllstacks)) { ?>
    <div class="stack"> <?= $getAllstacksRow['StackName'] ?> </div>
                    
     <?php } ?>
    
  </div>
    </div>
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