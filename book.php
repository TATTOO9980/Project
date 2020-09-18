<?php
require_once 'validation.php';
require_once 'process.php';
session_start();
if(isset($_GET['date']))
{
$date=$_GET['date'];
}

if(isset($_POST['submit'])){

$name=$_POST['name'];
$email=$_POST['email'];
$timeslot=$_POST['timeslot'];
$mysqli=new mysqli('localhost','root','','users');
$stmt=$mysqli->prepare("INSERT INTO booking_s(username,timeslot,email,date)VALUES(?,?,?,?)");
$stmt->bind_param('ssss',$username,$timeslot,$email,$date);
$stmt->execute();
$msg="<div class='alert alert-success'>Booking Sucessful</div>";
$stmt->close();
$mysqli->close();
}
$duration=30;
$cleanup=0;
$start="08:00";
$end="17:00";
function timeslots($duration,$cleanup,$start,$end){
  $start=new DateTime($start);
  $end=new DateTime($end);
  $interval=new DateInterval("PT".$duration."M");
  $cleanupInterval= new DateInterval("PT".$cleanup."M");
  $slots=array();


   for($intStart=$start;$intStart<$end;$intStart->add($interval)->add($cleanupInterval)){
    $endPeriod=clone $intStart;
    $endPeriod->add($interval);
    if ($endPeriod>$end) {
      break;
    }
    $slots[]=$intStart->format("H:iA")."-".$endPeriod->format("H:iA");
   }
   return $slots;
}
?>
<html lang="en">
<html>
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
   <link href="css/bootstrap.css" rel="stylesheet" />
  <link href="css/bootstrap-theme.css" rel="stylesheet" />
  <title></title>
  
</head>
<body>
  <?php
  if(isset($_SESSION['email'])){

  ?>
  <a href="logout.php" class="center">Log Out</a>

  <div class="container">
    <h1 class="text-center">Book for Date:<?php echo date('d/m/Y',strtotime($date));?></h1><hr>

    <div class="row">
      <div class="col-md-12">
       <?php echo isset($msg)?$msg:"";?> 
      </div>
    <?php $timeslots=timeslots($duration,$cleanup,$start,$end);
foreach ($timeslots as $ts){
  ?>
  
<div class="col-md-2">

  <div class="form-group">
    <button class="btn btn-success book" data-timeslot="<?php echo $ts;?>"><?php echo $ts;?></button>
  </div>
</div>
<?php } ?>
</div>
  </div>
 <div id ="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!---Modal Content-------->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Booking: <span id="slot"></span></h4>  
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-md-12">
          <form action="" method="post">

            <div class="form-group">
              <label for="">Timeslot</label>
              <input required type="text"  readonly name="timeslot" id="timeslot" class ="form-control">
            </div>
            <div class="form-group">
              <label for="">Name</label>
              <input required type="text"  readonly value="<?php echo 'username';?>" name="name" class ="form-control" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input required type="email"   readonly value="<?php echo $row['username'];?>" name="email" class ="form-control" autocomplete="off">
            </div>
           <div class="form-group-pull-right">
             <button class=" btn-block btn-primary" type="submit" name="submit">Submit</button>
           </div> 
          </form>
        </div>
      </div>  
      </div>
    </div>
</div>
 </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https:maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
  $(".book").click(function(){
 var timeslot=$(this).attr('data-timeslot');
  $("#slot").html(timeslot);
  $("#timeslot").val(timeslot);
  $("#myModal").modal("show");

  })

</script>
<?php 

}
else{
 header('location:index.php');
}
?>
</body>
</html>