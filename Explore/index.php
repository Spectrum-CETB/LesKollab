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

  header('Location: ../index.php?message=Please login first!');
}
?>

<?php include("../components/common/header.php") ?>
<?php include("../components/common/navbar.php") ?>
<?php include("../components/common/modals.php") ?>


<div style="width: 100vw;min-height: 100vh;background: url(&quot;https://wallpaperaccess.com/full/983279.jpg&quot;) bottom / cover no-repeat;padding-top: 10vh;">
  <div class="container" style="width: 100vw;height: auto;margin: 0px;padding: 0px;">
    <?php
    include("../components/common/messages.php");
    ?>
    <div class="row" style="width: 100vw;margin-top: 0px;">
      <div class="col-4" style="padding: 2vw;height: auto;">
        <div class="profile-card" style="border-width: 0px;"><img class="rounded-circle profile-pic" src="../uploads/<?= $name ?>/<?= $getUserDetailsRow['profile'] ?>">
          <h3 class="profile-name" style="background: rgb(255,255,255);color: rgb(0,0,0);"><?= $name ?></h3>
          <ul class="social-list">
            <li><a href="<?= $getUserDetailsRow['github'] ?>"><i class="fa fa-github" style="color: rgb(0,0,0);background: rgb(255,255,255);"></i></a></li>
            <li><a href="<?= $getUserDetailsRow['linkedin'] ?>"><i class="fa fa-linkedin-square" style="color: rgb(0,0,0);background: rgb(255,255,255);"></i></a></li>
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
        <?php
        $getProjects = "SELECT * FROM `projects` WHERE `email` = '$email'";
        $getProjectsStatus = mysqli_query($conn, $getProjects) or die(mysqli_error($conn));
        if (mysqli_num_rows($getProjectsStatus) > 0) {
        ?>
          <h1 style="text-align: center;color: rgb(255,255,255);">Latest Projects</h1>
          <?php
          while ($getProjectsRow = mysqli_fetch_assoc($getProjectsStatus)) {
          ?>

            <div class="list-group" style="margin-top: 20px;">
              <a class="list-group-item list-group-item-action flex-column align-items-start" href="#">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1"><?= $getProjectsRow['pname'] ?></h5><small><?= $getProjectsRow['createdAt'] ?></small>
                </div>
                <p class="mb-1"><?= $getProjectsRow['tags'] ?></p><small class="text-muted"></small>
                <a class="btn btn-primary" href="../scripts/delete-post.php?id=<?= $getProjectsRow['id'] ?>">Delete</a>
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
      $getAllProjectsStatus = mysqli_query($conn, $getAllProjects) or die(mysqli_error($conn));
      while ($getAllProjectsRow = mysqli_fetch_assoc($getAllProjectsStatus)) {
        $userEmail = $getAllProjectsRow['email'];
        $getProfile = "SELECT `name`,`profile` FROM `users` WHERE `email` = '$userEmail'";
        $getProfileStatus = mysqli_query($conn, $getProfile) or die(mysqli_error($conn));
        $getProfileRow = mysqli_fetch_assoc($getProfileStatus);
      ?>
        <div class="col" style="padding: 0px;height: auto;">
          <div class="card" style="margin: 1em;background: rgba(255,255,255,0.92);">
            <div class="card-body"><img class="rounded-circle" src="../uploads/<?= $getProfileRow['name'] ?>/<?= $getProfileRow['profile'] ?>" style="width: 30px;">
              <h4 class="card-title"><?= $getAllProjectsRow['pname'] ?></h4>
              <h6 class="text-muted card-subtitle mb-2"><?= $getAllProjectsRow['tags'] ?></h6>
              <p class="card-text"><?= $getAllProjectsRow['pdes'] ?>&nbsp;<br><a href="./check-project.php?id=<?= $getAllProjectsRow['id'] ?>">More...</a></p><a class="card-link" href="<?= $getAllProjectsRow['plink'] ?>" style="font-size: 20px;">Project Link</a>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</div>


<!-- </div> -->
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
<script src="assets/js/Snackbar.js"></script>

<?php include("../components/common/footer.php") ?>