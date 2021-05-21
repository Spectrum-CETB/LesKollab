<?php
// session_start
session_start();

// include db connection
include('../config/db.php');

if (isset($_SESSION['email'])) {

  $email = $_SESSION['email'];
  $getUserDetails = "SELECT * FROM `users` WHERE `email` = '$email'";
  $getUserDetailsStatus = mysqli_query($conn, $getUserDetails);
  $getUserDetailsRow = mysqli_fetch_assoc($getUserDetailsStatus);

  $name = $getUserDetailsRow['name'];
} else {

  header('Location: ../index.php?message=Please login first!&status=danger');
}
?>
<?php
    include("../components/common/messages.php");
    ?>
<?php include('../components/common/header.php'); ?>
<?php include('../components/common/navbar.php'); ?>

<div style="width: 100vw;min-height: 100vh;background: url(&quot;https://wallpaperaccess.com/full/983279.jpg&quot;) bottom / cover no-repeat;padding-top: 10vh;">
  <div class="container mt-3" style="width: 100vw;height: auto;margin: 0px;padding: 0px;">
    <div class="row" style="width: 100vw;margin-top: 0px;">

      <div class="col-4" style="padding: 2vw;height: auto;">
        <div class="profile-card" style="border-width: 0px;"><img class="rounded-circle profile-pic" src="../uploads/<?= $name ?>/<?= $getUserDetailsRow['profile'] ?>">
          <h3 class="profile-name" style="background: rgb(255,255,255);color: rgb(0,0,0);"><?= $name ?></h3>
          <ul class="social-list">
            <li><a href="<?= $getUserDetailsRow['github'] ?>"><i class="fab fa-github " style="color: rgb(255,255,255);"></i></a></li>
            <li><a href="<?= $getUserDetailsRow['linkedin'] ?>"><i class="fab fa-linkedin" style="color: rgb(255,255,255);"></i></a></li>
          </ul>
          <?php
          if ($getUserDetailsRow['bio'] != "") {
          ?>
            <div class="card" style="margin-bottom: 20px;">
              <div class="card-body" style="padding-bottom: 20px;margin-bottom: 20px;">
                <p class="card-text"><?= $getUserDetailsRow['bio'] ?></p>
              </div>
            </div>
          <?php
          } else {
          ?>
            <div class="card" style="margin-bottom: 20px;">
              <div class="card-body" style="padding-bottom: 20px;margin-bottom: 20px;">
                <form action="../scripts/add-bio.php" method="post">
                  <div class="form-group">
                    <textarea name="bio" rows="6" cols="40" class="form-control" placeholder="Add a bio :)"></textarea>
                    <input type="hidden" name="email" value="<?= $email ?>" />
                  </div>
                  <button type="submit" class="btn btn-secondary">Add</button>
                </form>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
          <div>
          <p class=" row w-100" style="margin-left:0px">
                <a class="btn m-1 col btn-primary" data-toggle="modal" data-target="#P<?= $getUserDetailsRow['id'] ?>" href="#">Edit  </a>
              </p>
          </div>
        <?php
        $getProjects = "SELECT * FROM `projects` WHERE `email` = '$email'";
        $getProjectsStatus = mysqli_query($conn, $getProjects) or die(mysqli_error($conn));
        if (mysqli_num_rows($getProjectsStatus) > 0) {
        ?>
          <h1 style="text-align: center;color: rgb(255,255,255);">Latest Projects</h1>
          <?php
          while ($getProjectsRow = mysqli_fetch_assoc($getProjectsStatus)) {
            $Pid = $getProjectsRow['id'];
            $getstacks = "SELECT `StackName` from `project_stack`,`stack` where S_id=Sid and P_id=$Pid";
            $getAllstacks = mysqli_query($conn, $getstacks) or die(mysqli_error($conn));
          ?>

            <div class="list-group" style="margin-top: 20px;">
              <a class="list-group-item list-group-item-action flex-column align-items-start" href="#">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1"><?= $getProjectsRow['pname'] ?></h5><small><?= $getProjectsRow['createdAt'] ?></small>
                </div>
                <p class="mb-1">
                  <?php while ($getAllstacksRow = mysqli_fetch_assoc($getAllstacks)) { ?>
                    <?= $getAllstacksRow['StackName'] ?>
                  <?php } ?>
                </p><small class="text-muted"></small>
              </a>
              <p class=" row w-100" style="margin-left:0px">
                <a class="btn m-1 col btn-primary" href="#../scripts/delete-post.php?id=<?= $getProjectsRow['id'] ?>">Delete</a>

                <a class="btn m-1 col btn-primary" data-toggle="modal" data-target="#P<?= $getProjectsRow['id'] ?>" href="#">Edit</a>
              </p>


            </div>
        <?php
          }
        }
        ?>
      </div>
      <!-- get projects of users! -->
      <?php
      $getAllProjects = "SELECT * FROM `projects`";
      $getAllProjectsStatus = mysqli_query($conn, $getAllProjects) or die(mysqli_error($conn));
      while ($getAllProjectsRow = mysqli_fetch_assoc($getAllProjectsStatus)) {
        $userEmail = $getAllProjectsRow['email'];
        $getProfile = "SELECT `name`,`profile` FROM `users` WHERE `email` = '$userEmail'";
        $getProfileStatus = mysqli_query($conn, $getProfile) or die(mysqli_error($conn));
        $getProfileRow = mysqli_fetch_assoc($getProfileStatus);
        $Pid = $getAllProjectsRow['id'];
        $projectName = $getAllProjectsRow['pname'];
        $projectSS   = $getAllProjectsRow['screenshot'];
        $getstacks = "SELECT `StackName` from `project_stack`,`stack` where S_id=Sid and P_id=$Pid";
        $getAllstacks = mysqli_query($conn, $getstacks) or die(mysqli_error($conn));
      ?>
         <div class="col mt-3" style="padding: 0px;height: auto;">

                    <div class="card" style="width: 18rem;">
                      <img src="projects/<?=$projectName?>/<?=$projectSS?>" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><?=$getAllProjectsRow['pname']?></h5>
                        <p class="card-text"><?php while($getAllstacksRow = mysqli_fetch_assoc($getAllstacks)) { ?>
                          <?=$getAllstacksRow['StackName']?>
                          <?php } ?></p>
                        <p><?=$getAllProjectsRow['pdes']?></p>
                        <a href="./checkProject.php?id=<?=$getAllProjectsRow['id']?>" class="btn btn-primary">Project Link</a>
                        <a href="#../scripts/delete-project.php?id=<?=$getAllProjectsRow['id']?>"  class="btn btn-primary confirmDelete">Delete Project</a>
                      </div>
                    </div>
                    </div>
                    
                <?php
                  }
                ?>
            </div>
        </div>
    </div>
<?php include('../components/common/modals.php'); ?>

<!-- edit Projecs -->

<?php
$getProjects = "SELECT * FROM `projects` WHERE `email` = '$email'";
$getProjectsStatus = mysqli_query($conn, $getProjects) or die(mysqli_error($conn));
if (mysqli_num_rows($getProjectsStatus) > 0) {
  while ($getProjectsRow = mysqli_fetch_assoc($getProjectsStatus)) {
    $Pid = $getProjectsRow['id'];
    $getstacks = "SELECT `StackName` from `project_stack`,`stack` where S_id=Sid and P_id=$Pid";
    $getAllstacks = mysqli_query($conn, $getstacks) or die(mysqli_error($conn));
?>

    <div class="modal fade bd-example-modal-lg" id="P<?= $getProjectsRow['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h1 style="font-family: sans-serif;padding: 1vw;">Edit <?= $getProjectsRow['pname'] ?></h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="../scripts/edit-project.php" method="post" enctype="multipart/form-data">
              <label>
                <p class="label-txt">Project Name</p>
                <input type="text" class="input" value="<?= $getProjectsRow['pname'] ?>" name="pname" />
                <input type="hidden" class="input" name="id" value="<?= $getProjectsRow['id'] ?>" />
                <div class="line-box">
                  <div class="line"></div>
                </div>
              </label>
              <label>
                <p class="label-txt">Project Description</p>
                <input type="text" class="input" value="<?= $getProjectsRow['pdes'] ?>" name="pdes" />
                <div class="line-box">
                  <div class="line"></div>
                </div>
              </label>
              <label>
                <p class="label-txt">Project Link</p>
                <input type="text" class="input" value="<?= $getProjectsRow['plink'] ?>" name="plink" />
                <div class="line-box">
                  <div class="line"></div>
                </div>
              </label>
              <label>
                <p class="label-txt">Stack Used <small>(separated by spaces)</small></p>
                <input type="text" id="stack" value=" <?php while ($getAllstacksRow = mysqli_fetch_assoc($getAllstacks)) {
                                                        echo $getAllstacksRow['StackName'];
                                                        echo ' ';
                                                      } ?>" class="input" name="tags" />
                <div class="line-box">
                  <div class="line"></div>
                </div>
                <span id="dstack" style="padding: 0;margin: 0;"></span>
              </label>
              <label>
                <p class="label-txt">Field</p>
                <input type="text" value="<?= $getProjectsRow['field'] ?>" class="input" name="field" />
                <div class="line-box">
                  <div class="line"></div>
                </div>
                <span id="dstack" style="padding: 0;margin: 0;"></span>
              </label>
              <label>
                <p class="label-txt">Screenshots(if you want to change the Screenshot)</p>
                <input type="file" class="form-control" name="screenshot" id="inputGroupFile02" />
                <div class="line-box">
                  <div class="line"></div>
                </div>
                <span id="dstack" style="padding: 0;margin: 0;"></span>
              </label>
              <br>
              <button type="submit">Save Changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>

<?php
  }
}
?>

<!-- edit Profile -->

<?php
$getProjects = "SELECT * FROM `users` WHERE `email` = '$email'";
$getProjectsStatus = mysqli_query($conn, $getProjects) or die(mysqli_error($conn));
if (mysqli_num_rows($getProjectsStatus) > 0) {
  while ($getProjectsRow = mysqli_fetch_assoc($getProjectsStatus)) {
    $Pid = $getUserDetailsRow['id'];
?>


    <div class="modal fade bd-example-modal-lg" id="P<?= $getUserDetailsRow['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h1 style="font-family: sans-serif;padding: 1vw;">Edit Profile</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="../scripts/edit-profile.php" method="post" enctype="multipart/form-data">
              <label>
                <p class="label-txt">User Name</p>
                <input type="text" class="input" value="<?= $getUserDetailsRow['name'] ?>" name="name" />
                <input type="hidden" class="input" name="id" value="<?= $getUserDetailsRow['id'] ?>" />
                <div class="line-box">
                  <div class="line"></div>
                </div>
              </label>
              <label>
                <p class="label-txt">Email</p>
                <input type="text" class="input" value="<?= $getUserDetailsRow['email'] ?>" name="userEmail" />
                <div class="line-box">
                  <div class="line"></div>
                </div>
              </label>
              <label>
                <p class="label-txt">Github</p>
                <input type="text" class="input" value="<?= $getUserDetailsRow['github'] ?>" name="githublink" />
                <div class="line-box">
                  <div class="line"></div>
                </div>
              </label>
              <label>
                <p class="label-txt">LinkedIn</p>
                <input type="text" class="input" value="<?= $getUserDetailsRow['linkedin'] ?>" name="linkedinLink" />
                <div class="line-box">
                  <div class="line"></div>
                </div>
              </label>
              <label>
                <p class="label-txt">Bio</p>
                <input type="text" value="<?= $getUserDetailsRow['bio'] ?>" class="input" name="bio" />
                <div class="line-box">
                  <div class="line"></div>
                </div>
               
              </label>
              <!-- <label>
                <p class="label-txt">Profile Pic(if you want to change the Profile Pic)</p>
                <input type="file" class="form-control" name="ProfilePic" id="inputGroupFile02" />
                <div class="line-box">
                  <div class="line"></div>
                </div>
                <span id="dstack" style="padding: 0;margin: 0;"></span>
              </label> -->
              <br>
              <button type="submit">Save Changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
    <?php
  }
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.min.js"></script>
<script>
  var inputBox = document.getElementById('stack');
  inputBox.onkeyup = function() {
    stacks = inputBox.value.split(" ")
    document.getElementById('dstack').innerHTML = stacks;

  }
</script>
<script src="assets/js/all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $('.confirmDelete').on('click', function () {
      var href = $(this).attr('href');
      href = href.substring(1);
      console.log(href,typeof(href))
      swal({
      title: "Are you sure?",
      text: "You Want Delete!!",
      icon: "warning",
      buttons: true,
      buttons: ['cancel','Yes'],
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = href;
      } else {

      }
    });
    });
  </script>
<?php include('../components/common/footer.php'); ?>