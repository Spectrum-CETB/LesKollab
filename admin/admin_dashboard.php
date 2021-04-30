<?php 
include('../config/db.php');
session_start(); 
define('PAGE','admin_dashboard');
include('header.php');
if($_SESSION['is_login'])
{
    $rmail = $_SESSION['mail'];
}
else
{  
    header("Location:admin_login");
}

?>

<div class="col-lg-10 mt-3" >
    <div class="row">
        <div class="col-lg-4 col-sm-12">
            <div class="card text-white bg-success mb-3 me-3 text-center">
                <h4 class="card-header  text-dark" style="font-weight:bold;"><i class="fas fa-project-diagram"></i> Projects</h4>
                <div class="card-body">
                <?php 
                    $sql1="select count(id) from projects";
                    $res1=$conn->query($sql1);
                    $row1=$res1->fetch_row();
                    $submitrequest1 = $row1[0];
                ?>
                    <h3 class="card-title"><?php echo $submitrequest1; ?></h3>
                    <a href="downloadproject.php" class="btn btn-warning" style="color:#fff;">Download</a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-sm-12">
            <div class="card text-white bg-danger mb-3 text-center">
                <h4 class="card-header  text-dark" style="font-weight:bold;"><i class="fas fa-users"></i> Users</h4>
                <div class="card-body">
                <?php 
                    $sql2="select count(id) from users";
                    $res2=$conn->query($sql2);
                    $row2=$res2->fetch_row();
                    $submitrequest2 = $row2[0];
                ?>
                    <h3 class="card-title"><?php echo $submitrequest2; ?></h3>
                    <a href="downloaduser.php" class="btn btn-warning" style="color:#fff;">Download</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-12">
            <div class="card text-white bg-primary mb-3 text-center">
                <h4 class="card-header  text-dark" style="font-weight:bold;"><i class="fas fa-comments"></i> Messages</h4>
                <div class="card-body">
                <?php 
                    $sql3="select count(id) from contact";
                    $res3=$conn->query($sql3);
                    $row3=$res3->fetch_row();
                    $submitrequest3 = $row3[0];
                ?>
                    <h3 class="card-title"><?php echo $submitrequest3; ?></h3>
                    <a href="downloadcontact.php" class="btn btn-warning" style="color:#fff;">Download</a>
                </div>
            </div>
        </div>
    </div>
</div>
