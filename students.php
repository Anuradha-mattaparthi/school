<!DOCTYPE html>
<html>
<head>
	<title>student</title>
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="container">

<?php

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
$users = mysqli_query($conn,"SELECT * FROM `data` where  type_of_person='student'");
?>

<table class="table table-striped">
    <thead>
      <tr>

        <th>Type of person</th>
        <th>Id</th>
		    <th>FirstName</th>
        <th>LastName</th>
        <th>Email</th>
        <th>Action</th>
         
      </tr>
    </thead>
    <tbody>
    	<?php
    	while ($results = mysqli_fetch_assoc($users)) { ?>

    		<tr>
         <td><?=$results['type_of_person']?></td> 
         <td><?=$results['id']?></td>
				<td><?=$results['fname']?></td>
        <td><?=$results['lname']?></td>
		        <td><?=$results['email']?></td>
		        <td><button class="btn-lg btn-success"><a href="manage.php?id=<?=$results['id']?> ">Manage</a></button></td>
		     </tr>
    	 	
    	<?php } ?>
      
     
	</tbody>
  </table>

</div>
</body>
</html>