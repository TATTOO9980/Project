<?php
session_start();
require_once 'process.php';

?>
<!DOCTYPE html>
<html>
<head>
  <title>Home Page</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https:maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet" />
  <link href="css/bootstrap-theme.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="style.css">
<style>

a:hover{
  text-decoration: none;
}


</style>
</head>
<body>

<div class="container">
  <div class="row">
   
  <div class="col-md-6" style="position: relative;">
  
  <center><h2 class="text-danger">REGISTER HERE</h2></center>
   <form action="process.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id;?>">
  <hr class="mb-3">
  <div class="form-group">
    
    <label><b>Username</b></label>

    <input type="text" name="username" class="form-control" required autocomplete="off" placeholder="First Name Only"
      value="<?php echo $username;?>">
  </div>
  <div class="form-group">
    <label><b>Password</b></label>
    <input type="password" name="password" class="form-control" required autocomplete="off" value="<?php echo $password;?>">

  </div>

  <div class="form-group">
    <label><b>Email</b></label>
    <input type="email" name="email" class="form-control" required autocomplete="off" value="<?php echo $email;?>">
  </div>
  
  <hr class="mb-3">
  <?php
  if ($update == true):
    ?> 
  <button type="submit" class="btn btn-block btn-warning" name="update">Update</button>

  <?php else:
  ?> 
  <button type="submit" class="btn btn-block btn-primary" name="register">Register</button>
<?php endif?>
 <center><a href="login.php"  target="_blank">Already Registered?Login</a></center>
</form>
</div>

  </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https:maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
