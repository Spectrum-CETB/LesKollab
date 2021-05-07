<?php
    // session start
    session_start();

    // include db connection
    include('./db.php');

    // get id of the post!
    $postId = $_GET['id'];

    if($postId != "") {

        // delete post
        $deletePost = "DELETE FROM `projects` WHERE `id` = '$postId'";
        $deletePostStatus = mysqli_query($conn,$deletePost) or die(mysqli_error($conn));

        if($deletePostStatus) { // if delete successful!

            header('Location: ../Explore/index.php?message=Project deleted Sucessfully !&status=success');

        } else {

            header('Location: ../Explore/index.php?message=Unable to delete project !&status=danger');

        }

    } else {

        header('Location: ../Explore/index.php?message=Please select a post to delete!');
    
    }
?>