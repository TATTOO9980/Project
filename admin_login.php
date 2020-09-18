<?php

require('connection.inc.php');
require('functions.inc.php');
if (isset($_POST['submit']))
{
	$username=get_safe_value($con,$_POST['username']);
	$password=get_safe_value($con,$_POST['password']);
	$msg='';
	$sql="select * from admin_users where username='$username' and password='$password'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	if ($count>0) {
		$_SESSION['ADMIN_LOGIN']='yes';
		$_SESSION['ADMIN_USERNAME']=$username;
		header('location:admin.php');
		header('location:searchtxtbox.php');
		die();
	}else{
      $msg="Please enter correct login details";
	}
}

?><!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https:maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet" />
  <link href="css/bootstrap-theme.css" rel="stylesheet" />
	<title>Admin Login Page</title>
</head>
<body style="background-image:url(admin.png);opacity: 1.5;">

	<div class="container" style="margin-left:200px;">
		<div class="sufee-login align-content-center flex-wrap">
  <div class="row">
   
  <div class="col-md-6">
    <div style="padding: 20px;"> 
   <center><h2 class="text-success">Welcome Admin</h2></center>
  </div>
  <form action="" method="post">
   <hr class="mb-3">
  <div class="form-group">
    <label><b>Username</b></label>
    <input type="text" name="username" class="form-control" required autocomplete="off">
  </div>
  <div class="form-group">
    <label><b>Password:
</b></label>
    <input type="password" name="password" class="form-control" required autocomplete="off">

  </div>
  
  <hr class="mb-3">
  <button type="submit" name="submit" class="btn btn-flat btn-block btn-success m-b-30 m-t-30">SIGN IN</button>
   <center><a href="forgot_password.php" target="_blank">Forgot Password?</a></center>
 </form>
 <div class="field_error" style="color: red;margin-top: 15px;"><?php echo $msg ?></div>
</div>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https:maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="js/smooth-scroll.js"></script>
<script src="jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
var	scroll=new SmoothScroll('a[href*="#"]');
</script>
</body>
</html>



