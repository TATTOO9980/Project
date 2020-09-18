<?
session_start();

function current_url()
{
	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$validURL=str_replace("&","&amp;",$url);
	return $validURL;
}
echo "Page URL is : ".current_url();
?>

<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https:maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet" />
  <link href="css/bootstrap-theme.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="style.css">
	<title>Students url</title>
</head>
<body><center>
	<div class="col-md-6" style="background: rgb(230,230,230,0.5);height: 300px;">
	<form action="" method="GET">
		<p>
<label for="searchterm">Enter URL to search</label><br>
<input type="search" name="searchterm" id="searchterm" class="form-control" autocomplete="off"><br>
<input type="submit" name="search" id="search" value="Search" class="form-control btn btn-block btn-primary"><br>
</p>
</form>
<?php if(isset($_GET['searchterm'])){?>
	<center><h2>URL searches by this student in this session</h2></center>
  <table class="table table-bordered">
  			
	<p class="text-success">The student searched for: <b><?php echo $_GET['searchterm'];?></b>.</p>
<?php } ?>
</table>
</div>

</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https:maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>