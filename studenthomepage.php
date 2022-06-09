<?php
session_start();
//echo $_SESSION['email'];
 $servername = "localhost";
$username = "Anu";
$password = "a1n2u3$$";
$dbname = "getintouch";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
$id=$_SESSION['id'];

$us = mysqli_query($conn,"SELECT * FROM `data`WHERE id='$id'");
  //echo "SELECT * FROM `data`WHERE id='$id'";
  $re=mysqli_fetch_assoc($us);
  
if((isset($_SESSION['email'])) && $_SESSION['email'] != ''){
  //if($re['type_of_person']=='Teacher'){
 
    ?>
  
<!DOCTYPE html>
<html>
<head>
	<title>home page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
   
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
     
      <li><a href="signout.php">logout</a></li>

    </ul>
  </div>
</nav>
<div class="text-center">
	<button class="btn-lg btn-success"><a href="forgotpassword.php">Forgot password</a></button>

  </div>
   <?php// var_dump($_SESSION['email']); ?>
</body>
</html>
<?php
//} else{
 // header("location: studenthomepage.php");
//}
?>
<?php
} else{
  header("location: signin.php");
}
?>