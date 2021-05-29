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
<!doctype html>
<html lang="en">

<head>
<style>
body {
	margin-bottom: 67px;
	overflow-x: hidden;
	background: #111111;
	font-weight: bold;
}

nav {
	width: 100vw;
}

form {
	background: #111111;
}

.custom_class {
	border-radius: 4%;
}

input {
	color: white;
}

.hello_class {
	display: grid;
	place-items: center
}


.input {
	background: #ac3e3e;
	border-radius: 10px;
}

textarea {
	color: white;
}

.input:focus {
	border: 1px solid #ac3e3e;
	background-color: #4E4E4E;
}

p {
	color: white;
	float: left;
	font-size: 18px;
	margin-bottom: 10px;
}
.follow_class a i {
	color: black;
	height: 40px;
	width: 40px;
	background: #d9a507;
	line-height: 40px;
	cursor: pointer;
	transition: .5s
}

.follow_class a i:hover {
	animation: Social-Icons-Flipping .70s;
	color: #d9a507;
	background: black;
	box-shadow: 0 0 15px #d9a507;
	transform: scale(.9);
}

@keyframes Social-Icons-Flipping {
	0% {
		transform: rotate(0)
	}
	100% {
		transform: rotate(360deg)
	}
}

button.butn {
	width: 100px;
	border: 1px solid white;
	color: black;
	background: white !important;
}

button.butn:hover {
	border: 1px solid #ac3e3e;
	color: white;
	background: black !important;
}

</style></head><body>
<div style="width: 100vw;min-height: 100vh;background:#111111;padding-top: 10vh;">
    <?php
    include("../components/common/messages.php");
    ?>
    <div class="container mt-2">
        <div class="border p-4 custom_class">
            <div class="form-inline my-2 hello_class">
                <a href="../uploads/<?= $name ?>/<?= $getUserDetailsRow['profile'] ?>" target="_blank" class="rounded-circle border p-2 image" >
                    <img src="../uploads/<?= $name ?>/<?= $getUserDetailsRow['profile'] ?>" alt="profile_pic" class="rounded-circle" height="145px" width="150px">
                </a>
                <h2 class="mt-4 text-center text-light">Hi, <?= $name ?></h2>
                </div>    
                <div class="text-center my-4 text-light follow_class">Follow me on
                <a class="rounded-circle" href="<?= $getUserDetailsRow['github'] ?>" target="_blank"><i class="fa fa-github ml-3 rounded-circle" style="font-size:30px; "></i></a>
                <a href="<?= $getUserDetailsRow['linkedin'] ?>" target="_blank"><i class="fa fa-linkedin ml-3 rounded-circle" style="font-size:30px;"></i></a>
                </div>


            <h5 class="text-danger mb-3 text-center">*After making changes on your data, Press <span class="badge badge-primary">Update</span> button to update.</h5>

            <form action="../scripts/update_user.php" method="post">
                <input type="hidden" name="user_id" value="<?= $getUserDetailsRow['id'] ?>">
                <label>
                    <p>Name <small class="text-danger">(You can't change name.)</small></p>
                    <input type="text" class="input" name="username" value="<?= $getUserDetailsRow['name'] ?>" readonly required />
                </label>
                <label>
                    <p>Email <small class="text-danger">(You can't change email address.)</small></p>
                    <input type="email" class="input" name="useremail" value="<?= $getUserDetailsRow['email'] ?>" readonly required />
                </label>
                <label>
                    <p>Github Link</p>
                    <input type="text" class="input" name="glink" value="<?= $getUserDetailsRow['github'] ?>" required />
                </label>
                <label>
                    <p>LinkedIn Link</p>
                    <input type="text" class="input" name="llink" value="<?= $getUserDetailsRow['linkedin'] ?>" required />
                </label>
                <label>
                    <p>Bio</small></p>
		    <input type="text" class="input" spellcheck="false" name="user_bio" value="<?= $getUserDetailsRow['bio'] ?>" required />
<!--                     <textarea class="input" name="user_bio" rows="2" value="<?= $getUserDetailsRow['bio'] ?>"  required></textarea> -->
                </label>

                <br>
                <button type="submit" class="butn" name="update_user">Update</button>
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

    
</body>
</html>
