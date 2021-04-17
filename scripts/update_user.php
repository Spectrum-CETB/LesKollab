<?php
if (isset($_POST['update_user'])) {

    // session_start
    session_start();

    // include db connection
    include('./db.php');

    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['useremail'];
    $glink = $_POST['glink'];
    $llink = $_POST['llink'];
    $user_bio = $_POST['user_bio'];

    $update_query = "UPDATE users SET `name` = '$username', `email`='$email', `github`='$glink', `linkedin` = '$llink', `bio`='$user_bio' WHERE `id` = '$user_id'";
    $update_user_status = mysqli_query($conn, $update_query);

    if ($update_user_status) {
        header('Location: ../Explore/user_info.php?message=Data Updated!');
    } else {
        header('Location: ../Explore/user_info.php?message=Error in updating Data!');
    }
}
