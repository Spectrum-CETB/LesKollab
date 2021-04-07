<?php 
// session_start
session_start();
// include db connection
include('../config/db.php');

if(!isset($_SESSION['is_login']))
{
  if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="select * from admin where email='$email' and password='$password'";
    $res=$conn->query($sql);
    if($res->num_rows==1)
    {
      $_SESSION['is_login']=true;
      $_SESSION['mail']=$email;
      echo "<script>location.href='admin_dashboard.php';</script>";
      exit;
    }
    else
    {
      $msg='<div class="alert alert-warning  text-center mt-2" role="alert">***Invalid Credential.***.</div>';
    }
  }
}
else
{
  echo "<script>location.href='admin_dashboard.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>LesKollab</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700">
  <link rel="stylesheet" href="assets/css/Button-Change-Text-on-Hover.css">
  <link rel="stylesheet" href="assets/css/Button-Ripple-Effect-Animation-Wave-Pulse.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  
  <!--Font Awesome CSS-->
  <link rel="stylesheet" href="assets/css/all.min.css">
  
  <!-- For adding Font style -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">  
  <style>
  .form-label
  {
      font-weight:bold;
      font-size:19x;
  }
  </style>
</head>
<body>

<nav class="navbar navbar-light navbar-expand-md py-0" style="background: rgba(255,255,255,0.18);">
    <div class="container-fluid">
        <a class="navbar-brand py-0" href="index.php" style="font-size: 30px;font-family: Aclonica, sans-serif;">
            <img src="../assets/images/logo1.png" alt="" height="80px" width="100px">LesKollab
        </a>
    <div class="collapse navbar-collapse" id="navcol-1">
</nav>
<div class="container">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="text-center">
                <img src="../assets/images/logo1.png"  alt="" height="150px" width="150px;">
            </div> 
            <form action="" method="post">
            <?php if(isset($msg)){echo $msg; }  ?>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary" name="login">Submit</button>
            </form>
        </div>
    </div>
</div>
    
    <div class="col-lg-3"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
  <script src="assets/js/all.min.js"></script>
</body>
</html>

