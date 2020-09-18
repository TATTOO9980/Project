<?php  
//header('location:index.php');

$mysqli= new mysqli('localhost','root','','users') or die(mysqli_error($mysqli));
$id=0;
$update=false;
$username ="";
$password = "";
$email ="";

if (isset($_POST['register'])) {
$username =$_POST['username'];
$password = $_POST['password'];
$email =$_POST['email'];

 $mysqli->query("INSERT INTO students(username,password,email)VALUES('$username','$password','$email')")or die ($mysqli->error);
   $_SESSION['message']= "Record has been saved!";
   $_SESSION['msg_type']= "success";

   header("location: index.php");
}

if (isset($_GET['delete'])) {
	$id=$_GET['delete'];
	$mysqli->query("DELETE FROM students WHERE id=$id") or die($mysqli->error());
	$_SESSION['message']="Record has been deleted!";
    $_SESSION['msg_type']="danger";

   header("location: admin.php");
}
if (isset($_GET['edit'])){
	$id=$_GET['edit'];
	$update=true;
	$result=$mysqli->query("SELECT * FROM students WHERE id=$id")or die($mysqli->error());
	if(count($result)==1){
		$row= $result->fetch_array();
		$username=	$row['username'];
		$password=	$row['password'];
		$email=	$row['email'];
}
	}
	if (isset($_POST['update'])){
	  $id=$_POST['id'];
	    $username=$_POST['username'];
		$password=$_POST['password'];
		$email=	$_POST['email'];
	    $mysqli->query("UPDATE students SET username='$username',password='$password',email='$email' WHERE id=$id")or die($mysqli->error);
		$_SESSION['message']= "Record has been updated!";
        $_SESSION['msg_type']= "warning";

        header("location: admin.php");
		
}
?>
