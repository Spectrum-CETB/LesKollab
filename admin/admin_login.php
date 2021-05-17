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
  <style>
  .form-label
  {
      font-weight:bold;
      font-size:19x;
  }
  
/* new footer */
.footer-distributed {
  background: #666;
  box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
  box-sizing: border-box;
  width: 100%;
  text-align: left;
  font: bold 16px sans-serif;
  padding: 55px 50px;
}

.footer-distributed .footer-left,
.footer-distributed .footer-center,
.footer-distributed .footer-right {
  display: inline-block;
  vertical-align: top;
}

/* Footer left */



/* The company logo */

.footer-distributed h3 {
  color: #ffffff;
  font: normal 36px 'Open Sans', cursive;
  margin: 0;
}

.footer-distributed h3 span {
  color: aqua;
}

/* Footer links */

.footer-distributed .footer-links {
  color: #ffffff;
  margin: 20px 0 12px;
  padding: 0;
}

.footer-distributed .footer-links a {
  display: inline-block;
  line-height: 1.8;
  font-weight: 400;
  text-decoration: none;
  color: inherit;
}

.footer-distributed .footer-company-name {
  color: #222;
  font-size: 14px;
  font-weight: normal;
  margin: 0;
}

/* Footer Center */



.footer-distributed .footer-center .inner-footer-center i {
  background-color: red !important;
  color: #ffffff;
  font-size: 25px;
  width: 38px;
  height: 38px;
  border-radius: 50%;
  text-align: center;
  line-height: 42px;
  margin: 10px 15px;
  vertical-align: middle;
}

.footer-distributed .footer-center i.fa-envelope {
  font-size: 17px;
  line-height: 38px;
}

.footer-distributed .footer-center p {
  display: inline-block;
  color: #ffffff;
  font-weight: 400;
  vertical-align: middle;
  margin: 0;
}

.footer-distributed .footer-center p span {
  display: block;
  font-weight: normal;
  font-size: 14px;
  line-height: 2;
}

.footer-distributed .footer-center p a {
  color: lightseagreen;
  text-decoration: none;
  ;
}

.footer-distributed .footer-links a:before {
  content: "|";
  font-weight: 300;
  font-size: 20px;
  left: 0;
  color: #fff;
  display: inline-block;
  padding-right: 5px;
}

.footer-distributed .footer-links .link-1:before {
  content: none;
}

/* Footer Right */


.footer-distributed .footer-company-about {
  line-height: 20px;
  color: #fff;
  font-size:1rem;
  font-weight: normal;
  margin: 0;
}

.footer-distributed .footer-company-about span {
  display: block;
  color: #ffffff;
  font-size: 1.5rem;
  font-weight: bold;
  margin-bottom: 20px;
  margin-top: 2vh;
}


/* If you don't want the footer to be responsive, remove these media queries */

@media (max-width: 880px) {

  .footer-distributed {
    font: bold 14px sans-serif;
  }

  .footer-distributed .footer-left,
  .footer-distributed .footer-right {
    display: block;
    width: 100%;
    text-align: center;
  }

  .footer-distributed .footer-center i {
    margin-left: 0;
  }

  .footer-distributed .footer-center
  {
    display: block;
    width: 100%;
    text-align: center;
  }
.footer-center .inner-footer-center
{
 width:90%;
 margin:auto;
 text-align: center; 
}
.footer-distributed .footer-company-about span {
  margin-bottom:2vh;
  margin-top: 7vh;
}
.footer-distributed .footer-company-about
{
  margin-bottom:5vh;
}
}


/* css for social media icons */

.rounded-social-buttons {
  text-align: center;
}

.rounded-social-buttons .social-button {
  display: inline-block;
  position: relative;
  cursor: pointer;
  width: 2.5rem;
  height: 2.5rem;
  border: 0.125rem solid transparent;
  padding: 0;
  text-decoration: none;
  text-align: center;
  color: #fefefe;
  font-size: 1.2rem;
  font-weight: normal;
  line-height: 2em;
  border-radius: 1.6875rem;
  transition: all 0.5s ease;
  margin-right: 0.25rem;
  margin-bottom: 0.25rem;
}

.rounded-social-buttons .social-button:hover, .rounded-social-buttons .social-button:focus {
  -webkit-transform: rotate(360deg);
      -ms-transform: rotate(360deg);
          transform: rotate(360deg);
}

.rounded-social-buttons .fa-twitter,.rounded-social-buttons .fa-facebook-f,.rounded-social-buttons .fa-linkedin,.rounded-social-buttons .fa-instagram ,.rounded-social-buttons .fa-github ,.rounded-social-buttons .fa-whatsapp {
  font-size: 20px;
}

.rounded-social-buttons .social-button.facebook {
  background: #3b5998;
}

.rounded-social-buttons .social-button.facebook:hover, .rounded-social-buttons .social-button.facebook:focus {
  color: #3b5998;
  background: #fefefe;
  border-color: #3b5998;
}

.rounded-social-buttons .social-button.twitter {
  background: #55acee;
}

.rounded-social-buttons .social-button.twitter:hover, .rounded-social-buttons .social-button.twitter:focus {
  color: #55acee;
  background: #fefefe;
  border-color: #55acee;
}

.rounded-social-buttons .social-button.linkedin {
  background: #007bb5;
}

.rounded-social-buttons .social-button.linkedin:hover, .rounded-social-buttons .social-button.linkedin:focus {
  color: #007bb5;
  background: #fefefe;
  border-color: #007bb5;
}

.rounded-social-buttons .social-button.github {
  background: black;
}

.rounded-social-buttons .social-button.github:hover, .rounded-social-buttons .social-button.github:focus {
  color: black;
  background: #ffff;
  border-color: black;
}

.rounded-social-buttons .social-button.instagram {
  background: #d52c79;
}

.rounded-social-buttons .social-button.instagram:hover, .rounded-social-buttons .social-button.instagram:focus {
  color: #125688;
  background: #fefefe;
  border-color: #125688;
}
.rounded-social-buttons .social-button.whatsapp {
  background:#4ced69;
}
.rounded-social-buttons .social-button.whatsapp:hover, .rounded-social-buttons .social-button.whatsapp:focus {
  color:#4ced69;
  background: #fefefe;
  border-color:#4ced69 ;
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
<div class="container mb-5">
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
                <button type="submit" class="btn btn-primary" name="login">Login</button>
            </form>
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
 
</body>
</html>

