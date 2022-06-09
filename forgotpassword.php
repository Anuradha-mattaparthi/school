<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'phpmailer/vendor/autoload.php';

$servername = "localhost";
$username = "Anu";
$password = "a1n2u3$$";
$dbname = "getintouch";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



function getName($n) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $randomString = '';

  for ($i = 0; $i < $n; $i++) {
      $index = rand(0, strlen($characters) - 1);
      $randomString .= $characters[$index];
  }

  return $randomString;
}
?>
<!DOCTYPE html>
<html>


<?php 
  if(isset($_POST['email']) && !empty($_POST['email'])){
       $email=$_POST['email'];


    

      $sql="select * from data where email = '".$email."'";
      $results=mysqli_query($conn,$sql);
      
      $q=mysqli_fetch_assoc($results);
      echo $q['fname'];
      $count=mysqli_num_rows($results);
      
      if($count==1){
        $token=getName(15);
        $resetUrl="http://localhost/phpfiles/yakinsirtask/resetpassword.php?token=".$token;
        //$s="INSERT INTO `data` (`reset_password_token`) VALUES ('".$token."')";
       $s=" UPDATE `data` SET reset_password_token='".$token."' WHERE email = '".$email."'" ;
        $pc= mysqli_query($conn,$s);
        //echo $s;

        if($pc==true)
        {
          header:("http://localhost/phpfiles/signin.php");
        }
        $mail = new PHPMailer(true);
        try {
          //Server settings
          $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
          $mail->isSMTP();                                            //Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
          $mail->Username   = 'anuradha.businesslabs@gmail.com';                     //SMTP username
          $mail->Password   = 'Blabs@2022';                               //SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
          $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
      
          //Recipients
          $mail->setFrom('from@example.com', 'Mailer');
          $mail->addAddress($email, $q["fname"].$q["lname"]);     //Add a recipient
          $mail->addAddress('testblab8@gmail.com');               //Name is optional
          $mail->addReplyTo('info@example.com', 'Information');
          $mail->addCC('cc@example.com');
          $mail->addBCC('bcc@example.com');
      
          //Attachments
      
      
          //Content
          $mail->isHTML(true);                                  //Set email format to HTML
          $mail->Subject = 'Here is the subject';
          $mail->Body    = 'To reset your password <a href="'.$resetUrl.'">click here</a>';
          $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      
          $mail->send();
          echo "Message has been sent";
      } catch (Exception $e) {
          echo 'Message could not be sent. Mailer Error: {$mail->ErrorInfo}';
      }
      }
      }
  ?>

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
                      <h1>Recovery Account</h1>
                  </div>
                      <div class="form-group mt-3">
                          <label>Email id</label>
                          <input type="email" class="form-control" name="email" placeholder="Enter Email">
                      </div>
                      <div class="submit mt-3">
                          <input type="submit" value="submit" class="btn btn-primary">
                      </div>
                  
              </div>
            </div>
          </div>
       </form>
   </div>
</section>
</body>
</html>