<?php
require 'validation.php';

?>
<!DOCTYPE html>
<html>
<head><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet" />
  <link href="css/bootstrap-theme.css" rel="stylesheet"/>
  <title></title>
  <style>
    
  </style>
</head>
<body>

  <div class="container">
  <div class="row">
   
  <div class="col-md-6">
<center><h2 class="text-success">LOGIN HERE</h2></center>
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
  
  <div class="form-group">
    <label><b>Email</b></label>
    <input type="email" name="email"  required autocomplete="off" class="form-control">
  </div>
  <hr class="mb-3">
  <button type="submit" name="submit" class="btn btn-block btn-success">Login</button>
   <center><a href="forgot_password.php" target="_blank">Forgot Password?</a></center>
 </form>
</div>
</div>
</div>
<script src="jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
