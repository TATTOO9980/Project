<?php
session_start();
require 'validation.php';

?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Page</title>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet" />
  <link href="css/bootstrap-theme.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="style.css">
<style>
  input{
  width:80%
  height:5px;
  border:1px;
  border-radius: 05px;
  padding:8px 15px 8px 15px;
  margin:10px 0px 15px 0px;
  box-shadow:1px 1px 2px 1px gray;
}
</style>
</head>
<body>
  <?php require_once 'process.php';?>
  <?php
    if (isset($_SESSION['message'])):?>
     <div class="alert alert-<?=$_SESSION['msg_type']?>">
     <?php
        echo $_SESSION['message'];
        unset ($_SESSION['message']);
     ?>
   </div>
  <?php endif; ?>
  
   <div class="container">
  <?php
   $mysqli= new mysqli('localhost','root','','users') or die(mysqli_error($mysqli));
   $result= $mysqli->query("SELECT * FROM students") or die($mysqli->error);
  
  ?>
<nav class="navbar navbar-dark bg-light">
  <form class="form-inline ml-auto">
    <input class="form-control mr-sm-2" type="search" placeholder="Search User" aria-label="Search">
   <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><a href="admin_login.php" target="_blank">Search</a></button>
  </form>
</nav>
  <div class="row">
    <center>
    <div class="col-md-12" style="font-size: 16px;">
      <center><h2>Registration Details</h2></center>
  <table class="table table-bordered">
  <thead>
    <tr>
      <th>Username</th>
      <th>Password</th>
      <th>Email</th>
      <th>Year</th>
      <th>Course</th>
    
      
      <th colspan="2">Action</th>
    </tr>
  </thead>
  <?php
    while ($row=$result->fetch_assoc()):?> 
     <tr>
       <td><?php echo $row['username'];?></td>
       <td><?php echo $row['password'];?></td>
       <td><?php echo $row['email'];?></td>
        <td><?php echo $row['year'];?></td>
       <td><?php echo $row['course'];?></td>
       
       
       <td>
         <a href="index.php?edit=<?php echo $row['id'];?>" class="btn btn-info" style="width:100%;">Edit</a>
         <a href="admin.php?delete=<?php echo $row['id'];?>" class="btn btn-danger" style="width:100%;">Delete</a>
         
       </td>
     </tr>
  <?php endwhile; ?>  
</table>
  </div>
</center>
<?php
function pre_r($array){
    echo '<pre>';
    print_r($array);
     echo '</pre>';
   }
?>
    <?php
   $mysqli= new mysqli('localhost','root','','users') or die(mysqli_error($mysqli));
   $result= $mysqli->query("SELECT * FROM booking_s") or die($mysqli->error);
  ?>
  <center>
  <div class="col-md-12" style="font-size: 16px;">
     <center> <h2>Booking Details</h2></center>
  <table class="table table-bordered">
  <thead>
   <center> <tr>
      <th>Username</th>
      <th>Email</th>
      <th>Date</th>
      <th>Timeslot</th>
       <th>Report</th>
       <th>URL</th>
      <th colspan="3">Action</th>
    </tr></center>
  </thead>
  <?php
    while ($row=$result->fetch_assoc()):?> 
     <tr>
       <td><?php echo $row['username'];?></td>
       <td><?php echo $row['email'];?></td>
       <td><?php echo $row['date'];?></td>
       <td><?php echo $row['timeslot'];?></td>
        <td><?php echo $row['report'];?></td>
       <td><?php echo $row['search_url'];?></td>
       <td>
       <a href="book.php?edit=<?php echo $row['id'];?>" class="btn btn-xs btn-info" style="width:100%;">Edit</a>
         <a href="admin.php?delete=<?php echo $row['id'];?>" class="btn btn-danger" style="width:100%;">Delete</a>
         <a href="admin.php?print=<?php echo $row['id'];?>" class="btn btn-secondary" style="width:100%;">Print Data</a>
       </td>
     </tr>
  <?php endwhile; ?>  
</table>
  </div>
  </center>
</div>
</div>
</div>
<script src="jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>