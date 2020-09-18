<?php

error_reporting(0);
$conn = mysqli_connect('localhost','root','','users');
if(isset($_POST['submit'])){

$email =mysqli_real_escape_string($conn,$_POST['email']);
$query = "select * from password_reset WHERE  email ='$email'";
$run =mysqli_query($conn,$query);
if(mysqli_num_rows($run)>0){
	$row = mysqli_fetch_array($run);
$db_email = $row['email'];
$db_id = $row['id'];
$token= uniqid(md5(time())); //This is a random token
$query ="INSERT INTO  password_reset(id,email,token) VALUES (NULL,'$email','$token')";

if(mysqli_query($conn,$query)){
	$to= $db_email;
	$subject="Password reset link";
	$message="Click <a href='https://'YOUR_WEBSITE.com/reset_password.php?token=$token'>Here</a> to reset your password.";
  $headers="MIME-Version 1.0:"."\r\n";
  $headers="Content-type=text/html;charset=UTF_8"."\r\n";

 mail($to,$subject,$message,$headers);
 $msg ="<div class='alert alert-success'>Password reset link has been sent to your email.</div>";
}else{
	$msg ="<div class='alert alert-danger'>User not found.</div>";
}
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
  <link href="css/bootstrap.css" rel="stylesheet" />

<link href="css/bootstrap-theme.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="style.css">


  <style>


  </style>

</head>
<body>
 

<div class="container">
  <div class="login-box" style="max-width: 1500px;">
  <div class="row">
<div class="col-md-6 col-md-offset-3">
   <center> <h1>Forgot Password</h1></center>
  <form action="" method="post">
   <hr class="mb-3">
   
  <div class="form-group">
    <label><b> Enter Email</b></label>
    <input type="email" name="email" class="form-control" required autocomplete="off">
  </div>
  <?php if (isset($msg)){echo $msg;}?>
  <hr class="mb-3">
  <div class="form-group">
  <button name = "submit" type="submit" class="btn btn-block btn-primary">Submit</button>
  </div>
 </form>
</div>
</div>
</div>
</div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>