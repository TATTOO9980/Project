<?php

error_reporting(0);
$conn= mysqli_connect('localhost','root','','users');

if(isset($_GET['token'])){
$token=mysqli_real_escape_string($conn,$_GET['token']);
$query="SELECT * FROM password_reset WHERE token='$token'";
$run=mysqli($conn,$query);
if (mysql_num_rows($run)>0) {
  $row=mysqli_fetch_array($run);
   $email=$row['email'];
  $token=$row['token'];
  
}else{
  header("location:index.php");
}
}





if(isset($_POST['submit'])){
  $password=mysqli_real_escape_string($conn,$_POST['password']);
   $confirmpassword=mysqli_real_escape_string($conn,$_POST['confirmpassword']);
$options=['cost'=>11];
$hashed=password_hash($password,PASSWORD_BCRYPT,$options);
if ($password!=$confirmpassword) {
  $msg="<div class='btn btn-danger'>Passwords do not match</div>";
}elseif (strlen($password)<6) {
  $msg="<div class='btn btn-danger'>Password should exceed 6 characters</div>";
}else{
  $query="UPDATE users set password='$hashed' WHERE email='$email'";
  mysqli_query($conn,$query);
  $query="DELETE  FROM password_reset WHERE  email='$email'";
  mysqli_query($conn,$query);
   $msg="<div class='btn btn-success'>Password Updated.</div>";
}
}
?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
  
	<link href="css/bootstrap.css" rel="stylesheet"/>
  <link href="css/bootstrap-theme.css" rel="stylesheet"/>
</head>
<body>
	<div class="container">
  <div class="login-box" style="max-width: 1500px;">
  <div class="row">
<div class="col-md-6 col-md-3-offset">
  <center><h1>Password Reset</h1></center>
  <form action="" method="post">
   <hr class="mb-3">
   
   <div class="form-group">
    <label for="">Email</label>
    <input type="text" readonly class="form-control" name="" value="<?php echo $email; ?>">
  </div>
  <div class="form-group">
    <label for="">Password</label>
    <input type="password" name="password" class="form-control" required autocomplete="off">
  </div>
  <div class="form-group">
    <label for="">Confirm Password</label>
    <input type="password" name="confirmpassword" class="form-control" required autocomplete="off">
  </div>
  <?php if (isset($msg)){echo $msg;}?>
  <div class="form-group">
  <hr>
  <button name = "submit" type="submit" class="btn btn-block btn-primary">Reset Password</button>
  </div>
 </form>
</div>
</div>
</div>
</div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>