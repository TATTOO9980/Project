<?php

require 'dbConnect.php';

if(isset($_POST['submit'])){

$username =$_POST['username'];
$password = $_POST['password'];
$email =$_POST['email'];
$s = "SELECT * FROM  students WHERE username ='$username' && password='$password' && email='$email'";
$result = mysqli_query($conn,$s);
$num = mysqli_num_rows($result);
if($num == 1){
$_SESSION['email']= $email;
    $msg="<div class='alert alert-success'>Login Successful</div>";
	header('location:home.php');
	
}else{
	
	header('location:index.php');
	$msg="<div class='alert alert-danger'>Session expired</div>";
	
}
}
?>