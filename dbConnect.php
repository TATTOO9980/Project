<?php
$serverName = 'localhost';
$user = 'root';
$password = '';
$db = 'users';


$conn = mysqli_connect("$serverName", "$user", "$password" ,"$db");

if (mysqli_connect_error()) {
	echo 'Connection failed'.mysqli_connect_error();
	die();
}
?>