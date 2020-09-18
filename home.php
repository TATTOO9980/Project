<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Main user's page</title>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet" />
  <link href="css/bootstrap-theme.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="style.css">


  <style>

  </style>

<?php


?>

</head>
<body>
   
  <nav class="navbar navbar-expand-lg navbar-light bg-dark stickied-top" class="disabled;">
  <a class="navbar-brand" href="#"style="color: white;font-size: 50px; font-weight: bolder;"><span style="color: red;font-size: 50px;">Java</span>&<span style="color: red;font-size: 50px;">T</span>ech Computers.
    <sub style="font-size: 18px;"><div style="margin-left: 120px;padding-bottom: 10px;"><i>...you want more? We'll give you all of it.</i></sub></div></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: white;font-weight: bold;">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: white;font-weight: bold;">Profiles</a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="#"style="color: white;font-weight: bold;">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php" style="color: white;font-weight: bold;">Logout<span  style="color: red;"></span></a>
      </li>
     
    </ul>
  </div>
</nav>
<br>
           <div class="col-md-12">
           <?php echo isset($msg)?$msg:"";?> 
           </div>
            <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h4 style="color: #fff;" >Register User</h4>
                  <p style="color: #fff;">Register to Login.</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="index.php" class="small-box-footer">More info-><i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
              <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h4 style="color: #fff;">View Lab Slots</h4>
                  <p style="color: #fff;">Access the Calendar.</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="calendar.php" class="small-box-footer">More info-><i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h4 style="color: #fff;">Book Lab Slot</h4>
                  <p style="color: #fff;">Confirm booking details.</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="book.php" class="small-box-footer">More info-><i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h4 style="color: #fff;">Submit Reports</h4>
                  <p style="color: #fff;">Student Activity Reports.</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="reports.php" class="small-box-footer">More info-><i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

          </div>
        

  
</div>
<script src="jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>