<?php
// session_start
session_start();

// include db connection
include('./config/db.php');

if (isset($_SESSION['email'])) {
  header('Location: ./Explore/index.php?message=You have logged in successfully!');
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>LesKollab</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700">
  <link rel="stylesheet" href="assets/css/Button-Change-Text-on-Hover.css">
  <link rel="stylesheet" href="assets/css/Button-Ripple-Effect-Animation-Wave-Pulse.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <!--Font Awesome CSS-->
  <link rel="stylesheet" href="assets/css/all.min.css">
  <style>
    .ajheader {
      
      background: url("assets/img/bg.png");
      background-size: cover;
      background-repeat: no-repeat
    }
  </style>
</head>

<body onLoad="myFunction()">
  <div class="ajheader container-fluid">
    <nav class="navbar navbar-light navbar-expand-md" style="background: rgba(255,255,255,0.18);">
      <div class="container-fluid"><a class="navbar-brand" href="#"
          style="font-size: 30px;font-family: Aclonica, sans-serif;">LesKollab</a><button data-toggle="collapse"
          class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
            class="navbar-toggler-icon"></span></button>
        <?php
      include("components/common/messages.php");
      ?>
        <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link active" href="#about_us"
                style="padding: 8px;padding-right: 3vw;font-size: 20px;">About Us</a></li>
            <li class="nav-item"><a class="nav-link active" data-toggle="modal" data-target=".bd-example-modal-lg"
                href="#" style="padding-right: 3vw;font-size: 20px;">Login / Register</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid mt-5">
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
          <button type="button" class="btn btn-outline-warning" style="font-size:1.5em;font-weight:bold">Find a Project
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

  <!-- Start Footer Section-->
  <footer class="container-fluid bg-dark text-center">
    <div class="container">
      <div class="row py-3">
        <div class="col-md-6 mt-2">
          <span class="pr-2 text-white ">Follow us on:</span>
          <a href="https://github.com/Spectrum-CETB/LesKollab" target="_blank" class="pr-2">
            <i class="fab fa-github" style="color:#fff;background-color:black;"></i></a>
        </div>
        <div class="col-md-6">
          <p class="text-white mt-2">Copyright &copy
            <?php echo date('Y'). " "; ?>LesKollab
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- End Footer Section-->

  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <button data-target="#carouselExampleIndicators" data-slide-to="0" type="button"
              class="btn btn-outline-info btn-lg active">Login</button>
            <button data-target="#carouselExampleIndicators" data-slide-to="1" type="button"
              class="btn btn-outline-warning btn-lg">Register</button>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <form action="./scripts/Login.php" method="post">
                  <div class="form-group">
                    <br>
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                      aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                      else.</small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                      placeholder="Password">
                  </div>
                  <br>
                  <button type="submit" class="btn btn-primary">Login</button>
                </form>
              </div>
              <div class="carousel-item">
                <form action="./scripts/Register.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <br>
                    <label for="exampleInputEmail1">Email address <span style="color:red;">*</span></label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                      aria-describedby="emailHelp" placeholder="Enter email" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                      else.</small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Name <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="name" id="exampleInputPassword1"
                      placeholder="Full name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password <span style="color:red;">*</span> <span>(should have
                        minimum 6 characters)</span></label>
                    <input type="password" class="form-control" name="password" min="6" id="exampleInputPassword1"
                      placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">GitHub <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="github" id="exampleInputEmail1"
                      aria-describedby="emailHelp" placeholder="Enter github profile link" required>
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
                  <button type="submit" class="btn btn-primary">Register</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/Button-Ripple-Effect-Animation-Wave-Pulse.js"></script>
  <script src="assets/js/Snackbar.js"></script>
  <script src="assets/js/all.min.js"></script>
  <script>
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })
  </script>
</body>

</html>