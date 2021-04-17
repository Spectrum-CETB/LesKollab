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
    <?php
    include("../components/common/messages.php");
    ?>
    <div class="container mt-2">
        <div class="border p-4 rounded">
            <div class="form-inline my-4">
                <a href="../uploads/<?= $name ?>/<?= $getUserDetailsRow['profile'] ?>" target="_blank">
                    <img src="../uploads/<?= $name ?>/<?= $getUserDetailsRow['profile'] ?>" alt="profile_pic" class="rounded" width="100px">
                </a>
                <h2 class="ml-4 text-center text-light">Hi, <?= $name ?></h2>
                <a href="<?= $getUserDetailsRow['github'] ?>" target="_blank"><i class="fa fa-github ml-4" style="font-size:30px; color: rgb(0,0,0);background: rgb(255,255,255);"></i></a>
                <a href="<?= $getUserDetailsRow['linkedin'] ?>" target="_blank"><i class="fa fa-linkedin-square ml-4" style="font-size:30px;  color: rgb(0,0,0);background: rgb(255,255,255);"></i></a>
            </div>


            <h5 class="text-danger mb-3">*After making changes on your data, Press <span class="badge badge-primary">Update</span> button to update.</h5>

            <form action="../scripts/update_user.php" method="post">
                <input type="hidden" name="user_id" value="<?= $getUserDetailsRow['id'] ?>">
                <label>
                    <p class="label-txt">Name <small class="text-danger">(You can't change name.)</small></p>
                    <input type="text" class="input" name="username" value="<?= $getUserDetailsRow['name'] ?>" readonly required />
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label>
                    <p class="label-txt">Email <small class="text-danger">(You can't change email address.)</small></p>
                    <input type="email" class="input" name="useremail" value="<?= $getUserDetailsRow['email'] ?>" readonly required />
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label>
                    <p class="label-txt">Github Link</p>
                    <input type="text" class="input" name="glink" value="<?= $getUserDetailsRow['github'] ?>" required />
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label>
                    <p class="label-txt">LinkedIn Link</p>
                    <input type="text" class="input" name="llink" value="<?= $getUserDetailsRow['linkedin'] ?>" required />
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label>
                    <p class="label-txt">Bio</small></p>
                    <input type="text" class="input" name="user_bio" value="<?= $getUserDetailsRow['bio'] ?>" required />
                    <!-- <textarea class="input" name="user_bio" rows="2" value="<?= $getUserDetailsRow['bio'] ?>"  required></textarea> -->
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>

                <br>
                <button type="submit" class="btn-block" name="update_user">Update</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.min.js"></script>
<script>
    var inputBox = document.getElementById('stack');
    inputBox.onkeyup = function() {
        stacks = inputBox.value.split(" ")
        document.getElementById('dstack').innerHTML = stacks;

    }

    document.title = "LesKollab - User Info";
</script>
<script src="assets/js/Snackbar.js"></script>

<?php include("../components/common/footer.php") ?>