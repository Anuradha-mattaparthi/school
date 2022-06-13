 <?php
 $data="";
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
  //$first_name=$last_name=$tag_line=$description=$price=$location=$file_to_upload=$skills="";
  $query = "SELECT * FROM `data`  WHERE `id`='".$_GET['id']."'";
  //echo "SELECT email,pass FROM `data` WHERE email = '$email' && pass = '$password'";
  //echo $query;
  $results=mysqli_query($conn,$query);
 //echo $results;
  $data=mysqli_fetch_assoc($results);
   $fn = $data['fname'];
   $ln= $data["lname"];
  $d = $data["dob"];
  $sn= $data["sname"];
  $cn = $data["cname"];
   $fa= $data["fathername"];
  $mo = $data["mothername"];
   $em= $data["email"];
  $cem = $data["cemail"];
  $pas= $data["pass"];
  $cpas = $data["cpass"];
  

  if(isset($_POST['submit'])) {
  
 
  //$type_of_person= $_POST["type_of_person"];
  $fname = $_POST["fname"];
   $lname= $_POST["lname"];
  $dob = $_POST["dob"];
  $sname= $_POST["sname"];
  $cname = $_POST["cname"];
   $fathername= $_POST["fathername"];
  $mothername = $_POST["mothername"];
   $email= $_POST["email"];
  $cemail = $_POST["cemail"];
  $pass= $_POST["pass"];
  $cpass = $_POST["cpass"];
//$sql = "INSERT INTO data (fname,lname,type_of_person,dob,sname,cname,fathername,mothername,email,cemail,pass,cpass) VALUES ('$fname','$lname','$type_of_person','$dob','$sname','$cname','$fathername','$mothername','$email','$cemail','$pass','$cpass')";
  $sql="UPDATE `data` set fname='$fname',lname='$lname',dob='$dob',sname='$sname',cname='$cname',fathername='$fathername',mothername='$mothername',email='$email',cemail='$cemail' WHERE `id`='".$_GET['id']."'";
//echo $sql;
if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>manage form</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="style.css">
</head>
<body>

<section>
  <div class="container">
  
        <form  method="post" enctype="multipart/form-data">
             <div class="row">
            <div class="col-md-6 offset-md-3" >
              <div class="card mt-5 p-5">
                  <div class="text-center">
                    <h1>Manage</h1>
                  </div>
                     <div class="form-group">
                        	<label>Type of person</label>
                        	<select class="form-control" name="type_of_person" placeholder="Type of person" value="<?php=$type_of_person ?>">
                        		<option disabled>Teacher</option>
                        		<option disabled>Student</option>
                        	</select>
                           </div>
                        <div class="form-group mt-3">
                        	<label>FirstName</label>
                        	<input type="text" class="form-control" name="fname" placeholder="Enter FirstName" value="<?= $fn ?>">
                        </div>
                        <div class="form-group mt-3">
                        	<label>LastName</label>
                        	<input type="text" class="form-control" name="lname"placeholder="Enter LastName" value="<?=$ln?>">
                        </div>
                        <div class="form-group mt-3">
                        	<label>DOB</label>
                        	<input type="date" class="form-control" name="dob"placeholder="Enter DOB" value="<?=$d?>">
                        </div>
                        <div class="form-group mt-3">
                        	<label>SchoolName</label>
                        	<input type="text" class="form-control" name="sname"placeholder="Enter SchoolName" value="<?=$sn?>">
                        </div>
                        <div class="form-group mt-3">
                        	<label>CollegeName</label>
                        	<input type="text" class="form-control" name="cname"placeholder="Enter CollegeName" value="<?=$cn?>">
                        </div>
                        <div class="form-group mt-3">
                        	<label>FatherName</label>
                        	<input type="text" class="form-control" name="fathername"placeholder="Enter FatherName" value="<?=$fa?>">
                        </div>
                        <div class="form-group mt-3">
                        	<label>MotherName</label>
                        	<input type="text" class="form-control" name="mothername"placeholder="Enter Mothername" value="<?=$mo?>">
                        </div>
                        <div class="form-group mt-3">
                        	<label>Email</label>
                        	<input type="email" class="form-control" name="email" required placeholder="Enter Email " value="<?=$em?>">
                        </div>
                        <div class="form-group mt-3">
                        	<label>ConfirmEmail</label>
                        	<input type="email" class="form-control" name="cemail" required placeholder="Enter ConfirmEmail" value="<?=$cem?>">
                        </div>
                        <div class="form-group mt-3">
                        	<label>Password</label>
                        	<input type="password" class="form-control" name="pass" required placeholder="Enter Password" value="<?=$pas?>">
                        </div>
                        <div class="form-group mt-3">
                        	<label>Confirmpassword</label>
                        	<input type="password" class="form-control" name="cpass" required placeholder="Enter Confirm Password" value="<?=$cpas?>">
                        </div>
                        <div class="submit mt-3">
                        <input type="submit" value="submit" name="submit" class="btn btn-primary">
                        </div> 
                    </div>
               </div>
           </div>
        </form>
  </div>
</section>
</body>
</html>