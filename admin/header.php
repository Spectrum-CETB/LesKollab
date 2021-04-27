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
    <!--Font Awesome CSS-->
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <!-- For adding Font style -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <title> Admin Dashboard</title>
</head>
<body>
<nav class="navbar navbar-light bg-light navbar-expand-md py-0" >
    <div class="container-fluid">
        <a class="navbar-brand py-0" href="index.php" style="font-size: 30px;font-family: Aclonica, sans-serif;">
            <img src="../assets/images/logo1.png" alt="Logo" height="80px" width="100px">LesKollab
        </a>
    <div class="collapse navbar-collapse" id="navcol-1">
</nav>
<div class="container-fluid">
  <div class="row mt-2">
    <div class="col-sm-2 bg-light sidebar d-print-none">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item "><a href="admin_dashboard.php" class="nav-link <?php if(PAGE=='admin_dashboard'){echo 'active';} ?>"><i class="fas fa-tachometer-alt "></i> Dashboard</a></li>
          <li class="nav-item "><a href="user_messages.php" class="nav-link <?php if(PAGE=='user_messages'){echo 'active';} ?>"><i class="fas fa-comments"></i> User Messages</a></li>
          <li class="nav-item"><a href="../logout.php" class="nav-link "><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
    <script src="../assets/js/all.min.js"></script>
</body>
</html>
