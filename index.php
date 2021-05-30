<?php
// session_start
session_start();

// include db connection
include('./config/db.php');

if (isset($_SESSION['email'])) {
  header('Location: ./Explore/index.php?message=You have logged in successfully!&status=success');
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
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700">
  <link rel="stylesheet" href="assets/css/Button-Change-Text-on-Hover.css">
  <link rel="stylesheet" href="assets/css/Button-Ripple-Effect-Animation-Wave-Pulse.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/darkmode.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <!--Font Awesome CSS-->
  <link rel="stylesheet" href="assets/css/all.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <!-- For adding Font style -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

  <style>
  
.our-team{
    box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.15);
    text-align: center;
    overflow: hidden;
    position: relative;
    transition: all 0.3s ease-in-out 0s;
}

.our-team .pic:before{
    content: "";
    background: #716a9e;
    position: absolute;
    top: 10px;
    left: 10px;
    bottom: 10px;
    right: 10px;
    opacity: 0.78;
    transform: scale(0);
    transition: all 0.3s ease-in-out 0s;
}

.our-team:hover .pic:before{
    transform: scale(1);
}

.our-team .pic img{
    width: 100%;
    height: auto;
}

.our-team .social{
    list-style: none;
    padding: 0;
    margin: 0;
    width: 100%;
    position: absolute;
    top: 40%;
    opacity: 0;
    transition: all 0.3s ease-in-out 0s;
}

.our-team:hover .social{
    opacity: 1;
}

.our-team .social li{
    display: inline-block;
    position: relative;
    transition: all 0.3s ease-in-out 0s;
}

.our-team .social li:nth-child(1){
    transform: translate3d(22px, -19px, 0px);
}

.our-team:hover .social li:nth-child(1){
    transform: translate3d(62px, -19px, 0px);
}

.our-team .social li:nth-child(2){
    transform: translate3d(36px, 38px, 0px);
}

.our-team:hover .social li:nth-child(2){
    transform: translate3d(36px, 8px, 0px);
}

.our-team .social li:nth-child(3){
    transform: translate3d(-18px, -75px, 0px);
}

.our-team:hover .social li:nth-child(3){
    transform: translate3d(-18px, -46px, 0px);
}

.our-team .social li:nth-child(4){
    transform: translate3d(-5px, -19px, 0px);
}

.our-team:hover .social li:nth-child(4){
    transform: translate3d(-43px, -19px, 0px);
}

.our-team .social li a{
    display: block;
    width: 35px;
    height: 35px;
    line-height: 35px;
    background: #333;
    font-size: 16px;
    color: #fff;
    margin: 0 15px 0 0;
    transform: rotate(45deg);
    transition: all 0.3s ease-in-out 0s;
}

.our-team .social li a:hover{
    line-height: 35px;
    background: #fff;
    color: #333;
    transform: rotate(-45deg);
}

.our-team .social li a i{
    transform: rotate(-45deg);
    transition: all 0.3s ease-in-out 0s;
}

.our-team .social li a:hover i{
    transform: rotate(45deg);
}

.our-team .team-content{
    padding: 15px 10px;
    background: #fff;
    position: relative;
    transition: all 0.3s ease-in-out 0s;
}

.our-team .title{
    font-size: 18px;
    font-weight: 700;
    color: #333;
    text-transform: uppercase;
    margin: 0 0 12px 0;
}

.our-team small{
    display: block;
    font-size: 14px;
    color: #999;
    margin-bottom: 8px;
}

.our-team .team-layer{
    width: 100%;
    padding: 34px 10px;
    background: #f7f7f7;
    border-bottom: 2px solid #716a9e;
    position: absolute;
    bottom: -50px;
    left: 0;
    opacity: 0;
    transition: all 0.3s ease-in-out 0s;
}

.our-team:hover .team-layer{
    bottom: 0;
    opacity: 1;
}

.our-team .team-layer a{
    display: inline-block;
    font-size: 18px;
    font-weight: 700;
    color: #333;
    text-transform: uppercase;
    margin: 0 0 12px 0;
    transition: all 0.3s ease-in-out 0s;
}

.our-team .team-layer a:hover{
    color: #716a9e;
}

.our-team .post{
    display: block;
    font-size: 14px;
    color: #999;
    text-transform: capitalize;
}
@media screen and (max-width: 600px) {
      
      .switch{
          position: relative;
        top:1.5rem;}
      }
      
      @media screen and (max-width: 460px) {
      
     
     .img-container {
    width: 90px;}
    }

@media only screen and (max-width: 990px){
    .our-team{ margin-bottom: 35px; }
}@charset "utf-8";
/* CSS Document */

  /* css for hover effect */
  .nav .nav-item:hover
  {
    background-color: #00719d;
    color: #fff !important;
    border-radius:30px;
    transition:1s;
  }
  .navbar-light .navbar-nav .nav-link.active:hover, .navbar-light .navbar-nav .show>.nav-link:hover
  {
    color: #fff !important;
  }
  a:hover , #projectbutton:hover
  {
    border-radius:30px;
    transition:1s;
  }
  
  </style>

</head>

<body onLoad="myFunction()">
   <!-- Back to top button -->
   <a id="button" style="text-decoration:none"></a>
   <div class=" text-center outer">
        <div id="mypage">
            <!-- <img src="2.png" alt="Loading" /> -->
       </div>
    </div>
  <div class="ajheader container-fluid px-0">
    <nav class="navbar navbar-light navbar-expand-xl py-0">
      <!-- <img src="assets/images/logo1.png" alt="" height="70px" width="100px"> -->
      <div class="container-fluid"><a class="navbar-brand py-0" href="index.php"
          style="font-size: 30px;font-family: Aclonica, sans-serif;"><img class="img-container" 
                src="assets/images/logo1.png" alt="">LesKollab</a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle
            navigation</span><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link active" href="index.php"
                style="padding: 8px;padding-right: 2vw;font-size: 20px;">Home</a></li>
            <li class="nav-item"><a class="nav-link active" href="#about_us"
                style="padding: 8px;padding-right: 2vw;font-size: 20px;">About Us</a></li>
            <li class="nav-item"><a class="nav-link active" href="#faq"
                style="padding: 8px;padding-right: 2vw;font-size: 20px;">FAQ's</a></li>
            <li class="nav-item"><a class="nav-link active" data-toggle="modal" data-target="#modalcontact" href="#"
                style="padding: 8px;padding-right: 2vw;font-size: 20px;">Contact Us</a></li>
            <li class="nav-item"><a class="nav-link active" data-toggle="modal" data-target="#modallogin" href="#"
                style="padding: 8px;padding-right:2vw;font-size:20px;">Login</a></li>
            <!-- Different nav bar link for new LOGIN and REGISTER modals -->
            <li class="nav-item"><a class="nav-link active " data-toggle="modal" data-target="#modalregister" href="#"
                style="padding: 8px;padding-right:2vw;font-size:20px;">Register</a></li>
            
            <li class="nav-item2" style="padding-left: 8px;">  <input type="checkbox" id="toggle" name="checkbox" class="switch" onclick="myfun()"></li>
            
          </ul>
        </div>
    </nav>
    <?php
      include("components/common/messages.php");
      ?>
    <div class="container-fluid mt-4">
      <div class="jumbotron" style="background:none;z-index:-2">
        <div>
          <h2>Have Some Pending Projects?</h2>
          <i>
            <h5>Need Someone's help to complete it?</h5> <br>
            <p>Ideas reshape the world, but there's always a staring and learning point.<br> It's time to redefine the
              way we learn.</p>
            Learnt a new skill, but have no one to work on a starting project with?<br>
            Thought of an idea but don't have the necessar tech stacks?<br>
            Search for people to collaborate with, or propose a project and let collaborators find you.<br />
            With LesKollab, it's time to implement and learn things on the get go, but not alone anymore!</p>
          </i>
          <br><br><br><br>
          <button type="button" id="projectbutton" class="btn btn-outline-warning">Find a Project
            Partner</button>

        </div>

      </div>
    </div>
  </div>

  <!-- 1st jumbotron end -->

  <div class="container ">
    <div class="jumbotron" style="background-color:#f6fafd;" id="about_us">
      <div>
        <h2 class="text-center">About Us</h2>
        <i>
          <br>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore<br>
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip<br>
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br>
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat<br>
            non proident, sunt in culpa qui officia deserunt mollit anim id est laborum!</p>
        </i>
      </div>
    </div>
  </div>
  <!-- end of 2nd jumbotron -->

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

          <form action="./scripts/Login.php" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email">

            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="password" id="pswlogin" placeholder="Password">
            </div>
            <div>
              <input type="checkbox" id="boxlogin" onclick="box2()">
              <span id="notice2">show password</span>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>

        </div>
      </div>
    </div>
  </div>

  <!-- Similar New Modal for REGISTER -->

  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="modalregister">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title" style="font-family: 'Permanent Marker', cursive;">REGISTER</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="./scripts/Register.php" method="post" enctype="multipart/form-data">
            <div class="form-group">

              <label for="exampleInputEmail1">Email address <span style="color:red;">*</span></label>
              <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email" required>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Name <span style="color:red;">*</span></label>
              <input type="text" class="form-control" name="name" id="exampleInputPassword1" placeholder="Full name"
                required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password <span style="color:red;">*</span> <span>(should have minimum 8
                  characters)</span></label>
              <input type="password" name="password" id="psw" class="form-control form-control-user" min="6"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                required>

              <div id="message" class="mt-2">
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
              <input type="password" name="password2" id="psw2" class="form-control form-control-user"
                placeholder="Repeat Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                required>
              <div class="mt-2">
                <input type="checkbox" id="boxsignup" onclick="box1()">
                <span id="notice1">show password</span>
              </div>
              <div id="message2" class="mt-2">
                <b>
                  <p id="passwordmatch" class="invalid">Passwords didn't match</p>
                </b>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">GitHub <span style="color:red;">*</span></label>
              <input type="text" class="form-control" name="github" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter github profile link" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">LinkedIn <span style="color:red;">*</span></label>
              <input type="text" class="form-control" name="linkedin" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="Enter linkedin profile link" required>
            </div>
            <label for="inputGroupFile02">Profile Photo <span style="color:red;">*</span></label>
            <br>
            <div class="input-group mb-3">
              <input type="file" class="form-control" name="profile" id="inputGroupFile02" required>
              <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>

            <div class="form-group">
              <label for="user_bio">Bio <span style="color:red;">*</span></label>
              <textarea class="form-control" id="user_bio" name="user_bio" rows="3" placeholder="Add a Bio :)"
                required></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" id="registerBtn" disabled>Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- similar modal for contact  -->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="modalcontact">


    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title" style="font-family: 'Permanent Marker', cursive;">Contact Us</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="./scripts/contact.php" method="POST">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control" name="cname" id="" placeholder="Enter Your Name" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" name="email" id="" placeholder="Enter email" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Phone Number</label>
              <input type="contact" class="form-control" name="contact" id="contact" placeholder="Enter you phone number"
                required onkeypress="return onlyNumberKey(event)">
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="msg" name="msg" rows="3" placeholder="Enter your message"
                required></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

        </div>
      </div>
    </div>
  </div>
  </div>
  </div>

  <!-- our teams start -->
  <div class="demo mb-5 pb-5">
        <div class="container">
            <div class="row text-center">
                <h1 class="heading-title mb-3 py-3"> Meet Our Team </h1>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-11">
                    <div class="our-team">
                        <div class="pic">
                            <img src="images/person-2.jpg" alt=""/>
                            <ul class="social">
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-github"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h3 class="title">Williamson</h3>
                            <small class="post">web developer</small>
                            <small>Email: <b>mail@example.com</b></small>
                        </div>
                        <div class="team-layer">
                            <a href="#">Williamson</a>
                            <span class="post">web developer</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-11">
                    <div class="our-team">
                        <div class="pic">
                            <img src="images/Sam-Revilter.jpg" alt=""/>
                            <ul class="social">
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-github"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h3 class="title">kristina</h3>
                            <small class="post">Web Designer</small>
                            <small>Email: <b>mail@example.com</b></small>
                        </div>
                        <div class="team-layer">
                            <a href="#">kristina</a>
                            <span class="post">Web Designer</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="images/team4-large.jpg" alt=""/>
                            <ul class="social">
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-github"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h3 class="title">Steve Thomas</h3>
                            <small class="post">web developer</small>
                            <small>Email: <b>mail@example.com</b></small>
                        </div>
                        <div class="team-layer">
                            <a href="#">Steve Thomas</a>
                            <span class="post">web developer</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="images/Affluent-Women-Mailing-Lists.jpg" alt=""/>
                            <ul class="social">
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-github"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h3 class="title">Miranda joy</h3>
                            <small class="post">Web Designer</small>
                            <small>Email: <b>mail@example.com</b></small>
                        </div>
                        <div class="team-layer">
                            <a href="#">Miranda joy</a>
                            <span class="post">Web Designer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- our teams end -->

    <!-- faq start -->
<div class="faqsection container-fluid px-0 " id="faq">
  <h1 class="text-center py-4">FAQ's</h1>
    <div class="container col-lg-6 col-sm-11 px-0 mx-auto">
    <section class="Accordion">
  <ul class="Accordion__tabs">
    <li class="Accordion__tab" onclick="toggleAccordion(this)">
      <div class="Accordion__tab__headline">
        <h4>Lorem ipsum dolor sit amet</h4><span class="icon"></span>
      </div>
      <div class="Accordion__tab__content">
        <div class="wrapper">
          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor 
          </p>
        </div>
      </div>
    </li>
    <li class="Accordion__tab" onclick="toggleAccordion(this)">
      <div class="Accordion__tab__headline">
        <h4>dolor sit amet</h4><span class="icon"></span>
      </div>
      <div class="Accordion__tab__content">
        <div class="wrapper">
          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
          </p>
          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
          </p>
        </div>
      </div>
    </li>
    <li class="Accordion__tab" onclick="toggleAccordion(this)">
      <div class="Accordion__tab__headline">
        <h4>ipsum dolor sit amet</h4><span class="icon"></span>
      </div>
      <div class="Accordion__tab__content">
        <div class="wrapper">
          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
          </p>
        </div>
      </div>
    </li>
    <li class="Accordion__tab" onclick="toggleAccordion(this)">
      <div class="Accordion__tab__headline">
        <h4>Lorem ipsum</h4><span class="icon"></span>
      </div>
      <div class="Accordion__tab__content">
        <div class="wrapper">
          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. 
          </p>
        </div>
      </div>
    </li>
  </ul>
</section>
    </div>
  </div>
    <!-- faq ends -->
  <!-- wave start -->
  <div class="container-fluid px-0">
    <footer>
      <svg viewBox="0 0 120 20">
        <defs>
          <mask id="xxx">
            <circle cx="7" cy="12" r="40" fill="#fff" />
          </mask>

          <filter id="goo">
            <feGaussianBlur in="SourceGraphic" stdDeviation="2" result="blur" />
            <feColorMatrix in="blur" mode="matrix" values="
           1 0 0 0 0  
           0 1 0 0 0  
           0 0 1 0 0  
           0 0 0 13 -9" result="goo" />
            <feBlend in="SourceGraphic" in2="goo" />
          </filter>
          <path id="wave"
            d="M 0,10 C 30,10 30,15 60,15 90,15 90,10 120,10 150,10 150,15 180,15 210,15 210,10 240,10 v 28 h -240 z" />
        </defs>

        <use id="wave3" class="wave" xlink:href="#wave" x="0" y="-2"></use>
        <use id="wave2" class="wave" xlink:href="#wave" x="0" y="0"></use>


        <g class="gooeff">
          <circle class="drop drop1" cx="20" cy="2" r="1.8" />
          <circle class="drop drop2" cx="25" cy="2.5" r="1.5" />
          <circle class="drop drop3" cx="16" cy="2.8" r="1.2" />
          <use id="wave1" class="wave" xlink:href="#wave" x="0" y="1" />

          <!-- g mask="url(#xxx)">
    <path   id="wave1"  class="wave" d="M 0,10 C 30,10 30,15 60,15 90,15 90,10 120,10 150,10 150,15 180,15 210,15 210,10 240,10 v 28 h -240 z" />
    </g>
  </g -->

      </svg>


    </footer>
  </div>
  <!-- wave end -->

 <!-- Start Footer Section-->
  <div class="footer-distributed pt-5 pb-2 px-0 bg-dark">
    <div class="container px-2">

      <div class="row">
        <div class="col-lg-7 col-sm-11">
          <div class="footer-left">

            <h3>Lesk<span>ollab</span></h3>

            <p class="footer-links">
              <a href="index.php" class="link-1">Home</a>
              <a href="#about_us">About</a>
              <a href="#faq">FAQs</a>
              <a href="#" data-toggle="modal" data-target="#modallogin">Login</a>
              <a href="#" data-toggle="modal" data-target="#modalregister">Register</a>
              <a href="#" data-toggle="modal" data-target="#modalregister">Contact</a>
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
          <?php echo date('Y'). " "; ?>LesKollab<span><a href="admin/admin_login.php" class="btn btn-secondary"
              style="margin-left:10px;">Admin Login</a></span>
        </p>
  </div>
  </div>
  <!--End Footer Section-->




  <div class="modal fade bd-example-modal-lg project" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h2>Register your interests to find a project partner</h2>
          <form action="#" method="post">

            <div class="multi_select_box interested_areas form-group">
              <label for="interested_areas">Areas Interested</label>
              <br>
              <select class="multi_select interested_areas" multiple data-selected-text-format="count > 3">
                <option value="Webd">Webd</option>
                <option value="Appd">Appd</option>
                <option value="ML">ML</option>
                <option value="Frontend">Frontend</option>
                <option value="Backend">Backend</option>
                <option value="Data Science">Data Science</option>
              </select>
            </div>

            <div class="multi_select_box technologies form-group">
              <label for="technologies">Technologies Interested</label>
              <br>
              <select class="multi_select technologies" multiple data-selected-text-format="count > 3">
                <option value="HTML">HTML</option>
                <option value="CSS">CSS</option>
                <option value="Django">Django</option>
                <option value="Node.js">Node.js</option>
                <option value="PHP">PHP</option>
                <option value="REST">REST</option>
              </select>
            </div>

            <div class="form-group">
              <label for="experiencelevel">Expereince</label>
              <input type="number" class="form-control" name="experiencelevel" id="experience"
                placeholder="Enter in years Ex: 3">
            </div>

            <div class="form-group ">
              <label for="project-level"> Project Level Looking for</label>
              <br>
              <select id="project-level" name="project-level">
                <option value="beginner">Beginner Level</option>
                <option value="intermediate">Intermediate Level</option>
                <option value="advanced">Advanced Level</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Find a Partner</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
  <!-- <script src="assets/js/Button-Ripple-Effect-Animation-Wave-Pulse.js"></script> -->
  <!-- <script src="assets/js/Snackbar.js"></script> -->
  <script src="assets/js/all.min.js"></script>
  <script>
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })
  </script>
  <script>
    $(document).ready(function () {
      $('.multi_select.interested_areas').selectpicker();
    })
    $(document).ready(function () {
      $('.multi_select.technologies').selectpicker();
    })
  </script>

    <!--Only Number Checking in Contact Us Form-->
    <script>
        function onlyNumberKey(evt)
        {
            var x=(evt.which) ? evt.which : evt.keyCode
            if(x > 31 && (x < 48 || x > 57))
            {
                return false;
            }
            return true;
        }
    </script>


  <script src="assets/js/register.js"></script>
  <script src="assets/js/darkmode.js"></script>
  <script src="assets/js/faq.js"></script>
    <script>
        $(document).ready(function(){
            console.log("ready")
            $('#mypage').fadeOut(4000);
            $('.outer').fadeOut(4000);
        });
    </script>
     <script>
      var btn = $('#button');
$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});
    </script>
</body>

</html>
