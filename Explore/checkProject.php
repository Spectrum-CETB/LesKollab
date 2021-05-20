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
    <link rel="stylesheet" href="../assets/css/styles.css">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <title>Project Description</title>
  <style>
    .navbar .navbar-brand img {
      width: 10vw;
      height: 10vh;
    }

    .navbar .navbar-brand span {
      font-size: 2rem;
    }

    body
    {
      background-color: #4bafd6;
    }
    /*** Table Styles **/
    a:hover
    {
      color: #fff;
    }
    .table-fill {
      background: white;
      border-radius: 3px;
      border-collapse: collapse;
      height: 320px;
      margin: auto;
      width: 100%;
      padding: 5px;
      width: 100%;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
      animation: float 5s infinite;
    }

    th {
      color: #D5DDE5;
      ;
      background: #1b1e24;
      border-bottom: 4px solid #9ea7af;
      border-right: 1px solid #343a45;
      font-size: 23px;
      font-weight: 100;
      padding: 24px;
      text-align: left;
      text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
      vertical-align: middle;
    }

    th:first-child {
      border-top-left-radius: 3px;
    }

    th:last-child {
      border-top-right-radius: 3px;
      border-right: none;
    }

    tr {
      border-top: 1px solid #C1C3D1;
      border-bottom: 1px solid #C1C3D1;
      color: #666B85;
      font-size: 16px;
      font-weight: normal;
      text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
    }

    tr:hover td {
      background: #06678e;
      color: #FFFFFF;
      border-top: 1px solid #22262e;
    }

    tr:first-child {
      border-top: none;
    }

    tr:last-child {
      border-bottom: none;
    }

    tr:nth-child(odd) td {
      background: #EBEBEB;
    }

    tr:nth-child(odd):hover td {
      background: #06678e;
    }

    tr:last-child td:first-child {
      border-bottom-left-radius: 3px;
    }

    tr:last-child td:last-child {
      border-bottom-right-radius: 3px;
    }

    td {
      background: #FFFFFF;
      padding: 20px;
      text-align: left;
      vertical-align: middle;
      font-weight: 600;
      color:black;
      font-size: 18px;
      text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
      border-right: 1px solid #C1C3D1;
    }

    td:last-child {
      border-right: 0px;
    }

    th.text-left {
      text-align: left;
    }

    th.text-center {
      text-align: center;
    }

    th.text-right {
      text-align: right;
    }

    td.text-left {
      text-align: left;
    }

    td.text-center {
      text-align: center;
    }

    td.text-right {
      text-align: right;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/lesscolab/index.php"><img src="assets/img/logo1.png" alt="not found">
        <span>LesKollab</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                 
                  // echo($userEmail.$projectName.$projectDesc.$projectLink.$projectField.$projectSS);
                ?>

  <div class="container col-lg-7 px-0">
    <div class="card ">
      <img src="projects/<?=$projectName?>/<?=$projectSS?>" class="card-img-top" alt="...">
    </div>
    <div>
      <table class="table-fill">

        <tbody class="table-hover">
          <tr>
            <td class="text-left">Project_Name</td>
            <td class="text-left">
              <?php print($projectName) ?>
            </td>
          </tr>
          <tr>
            <td class="text-left">Project_Field</td>
            <td class="text-left">
              <?php print($projectName) ?>
            </td>
          </tr>
          <tr>
            <td class="text-left">Description</td>
            <td class="text-left">
              <?php print($projectDesc) ?>
            </td>
          </tr>
          <tr>
            <td class="text-left">Owner_Email</td>
            <td class="text-left">
              <?php print($userEmail) ?>
            </td>
          </tr>
          <tr>
            <td class="text-left">Project_Link</td>
            <td class="text-left"><a href="<?= $projectLink ?>" class="mb-2 pb-2">
                <h5 class="card-text mb-2">Click Here </h5>
              </a></td>
          </tr>
          <tr>
            <td class="text-center" colspan="2"> <a href="/lesscolab/Explore/index.php" class="btn btn-primary">Add More Projects</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

 <!-- Start Footer Section-->
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