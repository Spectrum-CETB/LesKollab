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
  <link rel="stylesheet" href="../assets/css/Button-Change-Text-on-Hover.css">
  <link rel="stylesheet" href="../assets/css/Button-Ripple-Effect-Animation-Wave-Pulse.css">
  <link rel="stylesheet" href="../assets/css/styles.css">
  
  <!--Font Awesome CSS-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  
  
  <!-- For adding Font style -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">  
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/darkmode.css">
  <style>
  .form-label
  {
      font-weight:bold;
      font-size:19x;
  }
  .loginForm
  {
    padding:20px;
  }
  .dark-mode .form-label
  {
    color: #fff;
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
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link active" href="/LesKollab/index.php"
                style="padding: 8px;padding-right: 2vw;font-size: 20px;">Home</a></li>
            <li class="nav-item"><a class="nav-link active" href="/LesKollab/index.php#about_us"
                style="padding: 8px;padding-right: 2vw;font-size: 20px;">About Us</a></li>
            <li class="nav-item"><a class="nav-link active" href="/LesKollab/index.php#faq"
                style="padding: 8px;padding-right: 2vw;font-size: 20px;">FAQ's</a></li>
            
            <li class="nav-item"><a class="nav-link active" data-toggle="modal" data-target="#modallogin" href="#"
                style="padding-right:2vw;font-size:20px;">Login</a></li>
            <!-- Different nav bar link for new LOGIN and REGISTER modals -->
            <li class="nav-item">
        <input type="checkbox" id="toggle" name="checkbox" class="switch" onclick="myfun()"></li>
            <!-- Different nav bar link for new LOGIN and REGISTER modals -->
            
          </ul>
        </div>
        
    </nav>
<div class="container mt-3 mb-5 pt-2 pb-5">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 loginForm">
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
                    <input type="password" class="form-control" id="pswlogin" name="password" required>
                </div>
                <div>
              <input type="checkbox" id="boxlogin" onclick="box2()">
              <span id="notice2">show password</span>
            </div>
                <button type="submit" class="btn btn-primary" name="login">Login</button>
            </form>
        </div>
    </div>
</div>

<!-- The previous Modal has been separated and thus the courosel has been removed -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="modallogin">


    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title" style="font-family: 'Permanent Marker', cursive;">LOGIN</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="../scripts/Login.php" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email">

            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="password" id="pswlogin1" placeholder="Password">
            </div>
            <div>
              <input type="checkbox" id="boxlogin1" onclick="box1()">
              <span id="notice2">show password</span>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>

        </div>
      </div>
    </div>
  </div>

    
    <!-- Start Footer Section-->
  <div class="footer-distributed pt-5 pb-2 px-0 bg-dark">
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
                  class="fa fa-facebook-f"></i></a>
              <a class="social-button twitter" href="https://www.twitter.com/" target="_blank"><i
                  class="fa fa-twitter"></i></a>
              <a class="social-button linkedin" href="https://www.linkedin.com/" target="_blank"><i
                  class="fa fa-linkedin"></i></a>
              <a class="social-button github" href="https://www.github.com" target="_blank"><i
                  class="fa fa-github"></i></a>
              <a class="social-button instagram" href="https://www.instagram.com/" target="_blank"><i
                  class="fa fa-instagram"></i></a>
              <a class="social-button whatsapp" href="https://web.whatsapp.com/" target="_blank"><i
                  class="fa fa-whatsapp"></i></a>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
 <script>
 function box2()
{

  var password=document.getElementById("pswlogin");
  var x=document.getElementById("boxlogin").checked;
  if(x==true)
  {
    password.type="text";
   
  }
  else
  {
    password.type="password";
    
  }
}
function box1()
{

  var password=document.getElementById("pswlogin1");
  var x=document.getElementById("boxlogin1").checked;
  if(x==true)
  {
    password.type="text";
   
  }
  else
  {
    password.type="password";
    
  }
}
</script>
  <script src="../assets/js/darkmode.js"></script>
</body>
</html>

