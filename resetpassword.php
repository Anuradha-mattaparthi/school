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
<?php
  $servername = "localhost";
  $username = "Anu";
  $password = "a1n2u3$$";
  $dbname = "getintouch";
  // Create connection
  $conn = new mysqli($servername, $username, $password,$dbname);
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


 $sql="select * from data where reset_password_token='{$_GET['token']}'";
  $results=mysqli_query($conn,$sql);
    
  $q=mysqli_fetch_assoc($results);
  $count=mysqli_num_rows($results);

   
  if(isset($_GET['token']) && !empty($_GET['token']) && $count>0){
  
if(isset($_POST['submit']))
{
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
 $quer = "UPDATE `data` SET pass= '$password',cpass='$cpassword',reset_password_token='' WHERE reset_password_token='$q[reset_password_token]'" ;
 // UPDATE `data` SET `pass` = 'anuradha',`reset_password_token` = ''  WHERE `data`.`reset_password_token` = 'anuradha';
 //echo $quer;
 $p= mysqli_query($conn,$quer);

}
  
?>


  <div class="container">
    <form  method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6 offset-md-3" >
          <div class="card mt-5 p-5">
            <div class="text-center">
	            <h1>Reset Password</h1>
              <div class="form-group mt-3">
                <label>New Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
              </div>
              <div class="form-group mt-3">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="cpassword" placeholder="Enter Confirm Password">
              </div>
              <div class="submit mt-3">
              <input type="submit" value="submit" name="submit" class="btn btn-primary">
              </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<?php 

}else{
  echo "<h2>Invalid Token</h2>";
}?>
</section>
</body>
</html>