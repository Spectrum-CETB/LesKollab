<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700">
    <link rel="stylesheet" href="../assets/css/Button-Change-Text-on-Hover.css">
    <link rel="stylesheet" href="../assets/css/Button-Ripple-Effect-Animation-Wave-Pulse.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/darkmode.css">
    <!--Font Awesome CSS-->
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <!-- For adding Font style -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <title> Admin Dashboard</title>
    <style>
    .dark-mode .bg-light
    {
      background-color: #c6bcbc!important;
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
            <li class="nav-item"><a class="nav-link text-white" href="/LesKollab/index.php"
                style="padding-right: 2vw;font-size: 20px;">Home</a></li>
             
            <li class="nav-item"><a class="nav-link text-white" data-toggle="modal" data-target="#modallogin" href="#"
                style="padding-right:2vw;font-size:20px;">Login as User</a></li>
            <!-- Different nav bar link for new LOGIN and REGISTER modals -->
            <li class="nav-item">
        <input type="checkbox" id="toggle" name="checkbox" class="switch" onclick="myfun()"></li>
            <!-- Different nav bar link for new LOGIN and REGISTER modals -->
            
          </ul>
        </div>
    </nav>

<div class="container-fluid">
  <div class="row mt-2">
    <div class="col-sm-2 bg-light sidebar d-print-none">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item "><a href="admin_dashboard.php" class="nav-link <?php if(PAGE=='admin_dashboard'){echo 'active';} ?>"><i class="fas fa-tachometer-alt "></i> Dashboard</a></li>
          <li class="nav-item "><a href="user_messages.php" class="nav-link <?php if(PAGE=='user_messages'){echo 'active';} ?>"><i class="fas fa-comments"></i> User Messages</a></li>
          <li class="nav-item "><a href="generate_report.php" class="nav-link <?php if(PAGE=='generate_report'){echo 'active';} ?>"><i class="fas fa-clipboard "></i> Generate Report</a></li>
          <li class="nav-item"><a href="#" class="nav-link " onclick="confirmation()"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
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

    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
    <script src="../assets/js/all.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    function confirmation(){
    swal({
      title: "Are you sure?",
      text: "You Want to LogOut!!",
      icon: "warning",
      buttons: true,
      buttons: ['cancel','Yes, Log out'],
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "../logout.php";
      } else {
        
      }
    });
    }
  </script>
  <script src="../assets/js/darkmode.js"></script>
</body>
</html>
