<?php






?>

<!DOCTYPE html>
<html>
<head>
	<title>Search Data</title>
</head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
   <link href="css/bootstrap.css" rel="stylesheet" />
  <link href="css/bootstrap-theme.css" rel="stylesheet" />
<style>
	body{
		background-color: whitesmoke;

	}
	input{
		width: 100%;
		height: 5%;
		border:1px;
		border-radius: 05px;
		padding: 8px 15px 8px 15px;
		margin: 10px 0px 15px 0px;
		box-shadow:1px 1px 2px 1px grey;
	}
</style>
<body>
	<div class="container">
<div class="row">
   <div class="col-md-6">
	<center>
			<h2>SEARCH  BOOKING  DATA</h2>
		<form action="" method="POST">
			<input type="text" name="id" placeholder="Enter Your Id To Search" autocomplete="off" /><br>
			<input type="submit" name="search_booking_data" value="Search Data">
		</form>
		<?php
$connection = mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'users');
if (isset($_POST['search_booking_data']))
{
	$id=$_POST['id'];
	$query="SELECT * FROM booking_s WHERE id='$id'";
	$query_run=mysqli_query($connection,$query);
    
    while($row =mysqli_fetch_array($query_run))
    {
     ?>
      <form action="" method="POST">

      <input type="hidden" readonly name="id" value="<?php echo $row['id']?>"><br>
      
      <input type="text" readonly name="username" value="<?php echo $row['username']?>"/><br>
     
      <input type="text"  readonly name="email" value="<?php echo $row['email']?>"/><br>
 
      <input type="text" readonly name="date" value="<?php echo $row['date']?>"/><br>
     
      <input type="text" readonly name="timeslot" value="<?php echo $row['timeslot']?>"/><br>

      <input type="text" readonly name="report" value="<?php echo $row['report']?>"/><br>

      <input type="text" readonly name="report" value="<?php echo $row['search_url']?>"/><br>

      <button type="button" class="btn btn-xs btn-success">Print Data in PDF</button>
      </form>
     <?php

    }

}
		?>
	
</center>
	</div>


	   <div class="col-md-6">
	<center>
			<h2>SEARCH  REGISTRATION DATA</h2>
		<form action="" method="POST">
			<input type="text" name="id" placeholder="Enter Your Id To Search" autocomplete="off" /><br>
			<input type="submit" name="search_reg_data" value="Search Data">
		</form>
		<?php
$connection = mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'users');
if (isset($_POST['search_reg_data']))
{
	$id=$_POST['id'];
	$query="SELECT * FROM students WHERE id='$id'";
	$query_run=mysqli_query($connection,$query);
    
    while($row =mysqli_fetch_array($query_run))
    {
     ?>
      <form action="" method="POST">

      <input type="hidden" name="id" value="<?php echo $row['id']?>"><br>
    

      <input type="text" readonly name="username" value="<?php echo $row['username']?>"/><br>
   
      <input type="text" readonly name="email" value="<?php echo $row['email']?>"/><br>
 
      <input type="password" readonly name="password "value="<?php echo $row['password']?>"/><br>
     
      <input type="text"  readonly name="year" value="<?php echo $row['year']?>"/><br>

      <input type="text"  readonly name="course" value="<?php echo $row['course']?>"/><br>

      <button type="button" class="btn btn-xs btn-success">Print Data in PDF</button>
      </form>
     <?php

    }

}
		?>
	
</center>
	</div>
</div>
</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https:maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="js/bootstrap.min.js"></script>	
</body>
</html>