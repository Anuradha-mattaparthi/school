<?php
session_start();

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

if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  // $us = mysqli_query($conn,"SELECT * FROM `data`");
  // $re=mysqli_fetch_assoc($us);
  // $id=$re['id'];
  $login_query = "SELECT * FROM `data` WHERE email = '$email' && pass = '$password'";
  //echo "SELECT email,pass FROM `data` WHERE email = '$email' && pass = '$password'";
  //echo $login_query;
  $results=mysqli_query($conn,$login_query);

  $q=mysqli_fetch_assoc($results);

  $count=mysqli_num_rows($results);

if($count==1)
{
$_SESSION['email']=$email;
$_SESSION['id']=$q['id'];
header("location: teacherhomepage.php");
}else{
$error = 'please enter username and password';
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>signup form</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="style.css">
 
</head>
<body>
<section>
  <div class="container">
        <form  method="post" enctype="multipart/form-data" action="">
          <div class="row">
            <div class="col-md-6 offset-md-3" >
              <div class="card mt-5 p-5">
                  <div class="text-center">
	                    <h1>Login</h1>
                    </div>
                    
                      <div class="form-group mt-3">
                         <label>Email</label>
                              <input type="email" class="form-control" name="email" placeholder="Enter Email ">
                      </div>
                      <div class="form-group mt-3">
                        <label>password</label>
                          <input type="password" class="form-control" name="password" placeholder="Enter Password">
                      </div>
                      <div class="submit mt-3 text-center">
                         <input type="submit" value="submit" name="login" class="btn btn-primary">
                       </div>
                       <div class="row">
                        <div class="col-md-8">
                       <div style="margin-top: 18px;">Don't Have an account?<a href="signup.php">Create New Account</a></div>
                     </div>
                      <div class="col-md-4">
                <div style="margin-top: 18px;">ForgotPassword?<a href="forgotpassword.php">clickhere</a></div>
                      </div>
                      </div>
                  </div>
              </div>
            </div>
          
        </form>
  </div>
</section>
</body>
</html>
