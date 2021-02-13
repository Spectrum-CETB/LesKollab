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
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>LesKollab - Explore</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body onload="myFunction()">
    <section>
        <nav class="navbar navbar-light navbar-expand-md fixed-top" style="font-size: 20px;background: rgba(0,0,0,0.4);">
            <div class="container-fluid"><a class="navbar-brand" href="#" style="font-family: 'Titillium Web', sans-serif;font-size: 30px;color: rgb(254,254,254);">LesKollab</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link active text-danger" href="#" style="margin-right: 1vw;"><?=$name?>&nbsp;<i class="fa fa-user-circle-o"></i></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target=".bd-example-modal-lg" href="#" style="color: rgb(197,189,0);margin-right: 1vw;">Post an Idea&nbsp;<i class="fa fa-lightbulb-o"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="../logout.php" style="color: rgb(255,255,251);margin-right: 1vw;">Logout&nbsp;<i class="fa fa-sign-out-alt"></i></a></li>
                    </ul>
                    <!-- <ul class="nav navbar-nav"></ul><button class="btn openBtn" onclick="openSearch()" style="color: rgb(255,255,255);"><i class="fa fa-search" style="color: rgb(255,255,255);"></i></button>--></div>
            </div>
        </nav>
    </section>
    <div style="width: 100vw;min-height: 100vh;background: url(&quot;https://wallpaperaccess.com/full/983279.jpg&quot;) bottom / cover no-repeat;padding-top: 10vh;">
        <div class="container" style="width: 100vw;height: auto;margin: 0px;padding: 0px;">
          <?php
            include("../components/common/messages.php");
          ?>
            <div class="row" style="width: 100vw;margin-top: 0px;">
                <div class="col-4" style="padding: 2vw;height: auto;">
                    <div class="profile-card" style="border-width: 0px;"><img class="rounded-circle profile-pic" src="../uploads/<?=$name?>/<?=$getUserDetailsRow['profile']?>">
                        <h3 class="profile-name" style="background: rgb(255,255,255);color: rgb(0,0,0);"><?=$name?></h3>
                        <ul class="social-list">
                            <li><a href="<?=$getUserDetailsRow['github']?>"><i class="fa fa-github" style="color: rgb(0,0,0);background: rgb(255,255,255);"></i></a></li>
                            <li><a href="<?=$getUserDetailsRow['linkedin']?>"><i class="fa fa-linkedin-square" style="color: rgb(0,0,0);background: rgb(255,255,255);"></i></a></li>
                        </ul>
                        <?php
                          if($getUserDetailsRow['bio'] != "") {
                        ?>
                        <div class="card" style="margin-bottom: 20px;">
                            <div class="card-body" style="padding-bottom: 20px;margin-bottom: 20px;">
                                <p class="card-text"><?=$getUserDetailsRow['bio']?></p>
                            </div>
                        </div>
                        <?php
                          } else {
                        ?>
                        <div class="card" style="margin-bottom: 20px;">
                            <div class="card-body" style="padding-bottom: 20px;margin-bottom: 20px;">
                              <form action="../scripts/add-bio.php" method="post">
                                <div class="form-group">
                                  <textarea name="bio" rows="6" cols="40" class = "form-control" placeholder="Add a bio :)"></textarea>
                                  <input type="hidden" name="email" value = "<?=$email?>"/>
                                </div>
                                <button type="submit" class = "btn btn-secondary">Add</button>
                              </form>
                            </div>
                        </div>
                        <?php
                          }
                        ?>
                    </div>
                    <?php
                      $getProjects = "SELECT * FROM `projects` WHERE `email` = '$email'";
                      $getProjectsStatus = mysqli_query($conn,$getProjects) or die(mysqli_error($conn));
                      if(mysqli_num_rows($getProjectsStatus) > 0) {
                    ?>
                    <h1 style="text-align: center;color: rgb(255,255,255);">Latest Projects</h1>
                    <?php
                      while($getProjectsRow = mysqli_fetch_assoc($getProjectsStatus)) {
                    ?>
        
                    <div class="list-group" style="margin-top: 20px;">
                        <a class="list-group-item list-group-item-action flex-column align-items-start" href="#">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?=$getProjectsRow['pname']?></h5><small><?=$getProjectsRow['createdAt']?></small></div>
                            <p class="mb-1"><?=$getProjectsRow['tags']?></p><small class="text-muted"></small>
                            <a class = "btn btn-primary" href="../scripts/delete-post.php?id=<?=$getProjectsRow['id']?>">Delete</a>
                            </a>
                    </div>
                    <?php
                      }
                    }
                    ?>
                </div>
                <!-- get projects of users! -->
                <?php
                  $getAllProjects = "SELECT * FROM `projects`";
                  $getAllProjectsStatus = mysqli_query($conn,$getAllProjects) or die(mysqli_error($conn));
                  while($getAllProjectsRow = mysqli_fetch_assoc($getAllProjectsStatus)) {
                    $userEmail = $getAllProjectsRow['email'];
                    $getProfile = "SELECT `name`,`profile` FROM `users` WHERE `email` = '$userEmail'";
                    $getProfileStatus = mysqli_query($conn,$getProfile) or die(mysqli_error($conn));
                    $getProfileRow = mysqli_fetch_assoc($getProfileStatus);
                ?>
                  <div class="col" style="padding: 0px;height: auto;">
                      <div class="card" style="margin: 1em;background: rgba(255,255,255,0.92);">
                          <div class="card-body"><img class="rounded-circle" src="../uploads/<?=$getProfileRow['name']?>/<?=$getProfileRow['profile']?>" style="width: 30px;">
                              <h4 class="card-title"><?=$getAllProjectsRow['pname']?></h4>
                              <h6 class="text-muted card-subtitle mb-2"><?=$getAllProjectsRow['tags']?></h6>
                              <p class="card-text"><?=$getAllProjectsRow['pdes']?>&nbsp;<br><a href="./check-project.php?id=<?=$getAllProjectsRow['id']?>">More...</a></p><a class="card-link" href="<?=$getAllProjectsRow['plink']?>" style="font-size: 20px;">Project Link</a></div>
                      </div>
                  </div>
                <?php
                  }
                ?>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h1 style="font-family: sans-serif;padding: 1vw;">Post A Project</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                                <form action = "../scripts/post-project.php" method = "post" enctype="multipart/form-data">
                                    <label>
                                        <p class="label-txt">Project Name</p>
                                        <input type="text" class="input" name = "pname"/>
                                        <input type="hidden" class="input" name = "email" value = "<?=$email?>"/>
                                        <div class="line-box">
                                          <div class="line"></div>
                                        </div>
                                      </label>
                                      <label>
                                        <p class="label-txt">Project Description</p>
                                        <input type="text" class="input" name = "pdes"/>
                                        <div class="line-box">
                                          <div class="line"></div>
                                        </div>
                                      </label>
                                      <label>
                                        <p class="label-txt">Project Link</p>
                                        <input type="text" class="input" name = "plink"/>
                                        <div class="line-box">
                                          <div class="line"></div>
                                        </div>
                                      </label>
                                      <label>
                                        <p class="label-txt">Stack Used <small>(separated by spaces)</small></p>
                                        <input type="text" id="stack" class="input" name = "tags"/>
                                        <div class="line-box">
                                          <div class="line"></div>
                                        </div>
                                        <span id="dstack" style="padding: 0;margin: 0;"></span>
                                      </label>
                                      <label>
                                        <p class="label-txt">Field</p>
                                        <input type="text" class="input" name = "field"/>
                                        <div class="line-box">
                                          <div class="line"></div>
                                        </div>
                                        <span id="dstack" style="padding: 0;margin: 0;"></span>
                                      </label>
                                      <label>
                                        <p class="label-txt">Screenshots(if any)</p>
                                        <input type="file" class="form-control" name="screenshot" id="inputGroupFile02" required/>
                                        <div class="line-box">
                                          <div class="line"></div>
                                        </div>
                                        <span id="dstack" style="padding: 0;margin: 0;"></span>
                                      </label>
                                      <br>
                                      <button type="submit">Post</button>
                                </form>
                        </div>
                        </div>
                </div>
        </div>
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script>
        var inputBox = document.getElementById('stack');
        inputBox.onkeyup = function(){
            stacks = inputBox.value.split(" ")
            document.getElementById('dstack').innerHTML = stacks;

        }
    </script>
    <script src="assets/js/Snackbar.js"></script>
</body>

</html>
