<?php
echo "This ", "string ", "was ", "made ", "with multiple parameters.";

$servername   = "localhost";
$database = "leskollab";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
  echo "Connected successfully";

// declare variables
$email = "";
$name = "";
$number = 0;
$msg = "";


// get form data
if(isset($_POST['email'])) {
    $email = $_POST['email'];
  }

  if(isset($_POST['cname'])) {
    $name = $_POST['cname'];
  }
  
  if(isset($_POST['number'])) {
    $number = $_POST['number'];
  }
  if(isset($_POST['msg'])) {
    $msg = $_POST['msg'];
  }


    // insert user
    // $insertUser = "INSERT INTO `contact`(`name`,`email`,`number`,`msg`) VALUES(`$name`,`$email`,`$number`,`$msg`)";
    $result = mysqli_query($conn,"INSERT INTO contact (name,email,number,msg) VALUES ('$name','$email','$number','$msg')");
    if($result)
    {
      header('Location: ../index.php?message=Thank You for Contacting us&status=success');
    }
    else
    {
      header('Location: ../index.php?message=Unable to Contact! Try again some time later!&status=danger');
    }
    

?>