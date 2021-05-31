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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

  <title>Project Description</title>
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/darkmode.css">
  <style>
    .navbar .navbar-brand img {
      width: 90px;
      height: 70px;
      color:white;
    }
    .navbar{
      background-color: #0000003b;
    }

    .navbar .navbar-brand span ,.nav-item,h1 {
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

<nav class="navbar navbar-dark navbar-expand-md py-0 bg-dark">
      <!-- <img src="assets/images/logo1.png" alt="" height="70px" width="100px"> -->
      <div class="container-fluid">
        <a class="navbar-brand py-0" href="/LesKollab/index.php" style="font-size: 30px;font-family: Aclonica, sans-serif;">
            <img src="../assets/images/logo1.png" alt="" height="80px" width="100px">LesKollab
        </a>
        
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle
            navigation</span><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link active" href="/LesKollab/index.php"
                style="padding: 8px;padding-right: 2vw;font-size: 20px;">Home</a></li>
            <li class="nav-item"><a class="nav-link active" href="/LesKollab/index.php"
                style="padding: 8px;padding-right: 2vw;font-size: 20px;">Dashboard</a></li>
            
            <li class="nav-item"><a class="nav-link active"  href="../logout.php"
                style="padding-right:4vw;font-size:20px;">LogOut</a></li>
            <!-- Different nav bar link for new LOGIN and REGISTER modals -->
            <li class="nav-item">
        <input type="checkbox" id="toggle" name="checkbox" class="switch" onclick="myfun()"></li>
            <!-- Different nav bar link for new LOGIN and REGISTER modals -->
            
          </ul>
        </div>
        
    </nav>
    <h1 class="text-center my-2 py-2">Project Details</h1>
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
       <div class="container" style="margin-bottom:50px; margin-top:50px">
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
      <img style="height:200px" src=".\projects\<?=$projectName?>\<?=$projectSS?>"/>
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

 



       <div class="footer-distributed mt-5 pt-5 pb-2 px-0 bg-dark">
    <div class="container px-2">

      <div class="row">
        <div class="col-lg-7 col-sm-11">
          <div class="footer-left">

            <h3>Lesk<span>ollab</span></h3>

            <p class="footer-links">
              <a href="/LesKollab/index.php" class="link-1">Home</a>
              <a href="/LesKollab/index.php#about_us">About</a>
              <a href="/LesKollab/index.php#faq">FAQs</a>
            </p>

          
          </div>

        </div>
        <div class="col-lg-5 col-sm-11">
          <div class="footer-right text-center">

            <p class="footer-company-about">
              <span>About the company</span>
              Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus
              vehicula sit amet.
            </p>

            <div class="rounded-social-buttons my-2">
              <a class="social-button facebook" href="https://www.facebook.com/" target="_blank"><i
                  class="fab fa-facebook-f"></i></a>
              <a class="social-button twitter" href="https://www.twitter.com/" target="_blank"><i
                  class="fab fa-twitter"></i></a>
              <a class="social-button linkedin" href="https://www.linkedin.com/" target="_blank"><i
                  class="fab fa-linkedin"></i></a>
              <a class="social-button github" href="https://www.github.com" target="_blank"><i
                  class="fab fa-github"></i></a>
              <a class="social-button instagram" href="https://www.instagram.com/" target="_blank"><i
                  class="fab fa-instagram"></i></a>
              <a class="social-button whatsapp" href="https://web.whatsapp.com/" target="_blank"><i
                  class="fab fa-whatsapp"></i></a>
            </div>


          </div>

        </div>
      </div>


    </div>
    <div class="container-fluid bg-dark px-1 text-center">
        <p class="text-white mt-2">Copyright &copy
          <?php echo date('Y'). " "; ?>LesKollab<span><a href="/LesKollab/admin/admin_login.php" class="btn btn-secondary"
              style="margin-left:10px;">Admin Login</a></span>
        </p>
  </div>
  </div>
  <script src="../assets/js/darkmode.js"></script>

  <!-- Optional JavaScript; choose one of the two! -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>


</body>

</html>