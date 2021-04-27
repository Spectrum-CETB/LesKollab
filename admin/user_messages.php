<?php 
include('../config/db.php');
session_start(); 
define('PAGE','user_messages');
include('header.php');
if($_SESSION['is_login'])
{
    $rmail = $_SESSION['mail'];
}
else
{  
    header("Location:admin_login");
}
$sql="Select * from contact";
$res=$conn->query($sql);
if($res->num_rows == 0)
{ 
    $msg='<div class="alert alert-warning  text-center mt-2" role="alert" style="margin-left:150px;">***No Message found.***.</div>';
    echo $msg;
}
else
{
    ?>
    <div class="col-lg-10 mt-3" >
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">E-Mail</th>
                            <th scope="col">Contact No.</th>
                            <th scope="col">Message</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
<?php               while($row=$res->fetch_assoc())
                    {     ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $row['id'] ?></th>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['number'] ?></td>
                            <td width=30%;><?php echo $row['msg'] ?></td>
                            <td>
                                <form action="" method="GET">
                                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo $row['email']; ?>" target="_blank" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Reply"><i class="fas fa-reply-all"></i></a>
                                    <button type="submit" class="btn btn-danger" name="delete" value="delete" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Message"><i class="fas fa-trash-alt"></i></button>
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                </form>
                            </td>
                        </tr>
                    </tbody>
        <?php       }    ?>
                </table>
            </div>
        </div>
    </div>
<?php   
    
}
if(isset($_GET['delete']))
{
    $id=$_REQUEST['id'];
    $sqli="delete from contact where id='$id'";
    $result=$conn->query($sqli);
    if($result==TRUE)
    {
         ?> <meta http-equiv="refresh" content= "0;URL=?closed" />
<?php }
    else
        echo "Unable to Delete";
}
?>
