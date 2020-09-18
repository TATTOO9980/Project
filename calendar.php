<?php
session_start();


function build_calendar($month,$year){
$mysqli=new mysqli('localhost','root','','users');
$stmt=$mysqli->prepare("SELECT * FROM booking_s WHERE MONTH(date)=? AND YEAR(date)=?");
$stmt->bind_param('ss',$month,$year);

$bookings=array();
  if($stmt->execute()){
$result=$stmt->get_result();
  if($result->num_rows>0){
    while ( $row=$result->fetch_assoc()) {
      $bookings[]=$row['date'];
    }
    $stmt->close();
  }

  }

  

  $daysOfWeek = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
  $firstDayOfMonth= mktime(0,0,0,$month,1,$year);

  $numberDays=date('t',$firstDayOfMonth);

  $dateComponents=getdate($firstDayOfMonth);

  $monthName=$dateComponents['month'];
  $dayOfWeek=$dateComponents['wday'];
  $dateToday=date('Y-m-d');

   $calendar="<table class='table table-bordered'>";
   $calendar.="<center><h2>$monthName $year</h2><hr>";

   $calendar.="<a class='btn btn-xs btn-danger' href='?month=".date('m',mktime(0,0,0,$month-1,1,$year))."&year=".date('Y',mktime(0,0,0,$month-1,1,$year))."'>Previous Month</a>";

   $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."' class='sticky-top'>Current Month</a>";

   $calendar.="<a class='btn  btn-xs btn-success' href='?month=".date('m',mktime(0,0,0,$month+1,1,$year))."&year=".date('Y',mktime(0,0,0,$month+1,1,$year))."'>Next Month</a></center><br>";

   $calendar.="<tr>";
   foreach ($daysOfWeek as $day) {
     $calendar.="<th class='header'> $day</th>";
   }

   $calendar.="</tr><tr>";
  if ($dayOfWeek>0) {
   for ($i=0; $i<$dayOfWeek; $i++) { 
     $calendar.="<td></td>";
   }
  }
  $currentDay=1;
  $month=str_pad($month,2,"0",STR_PAD_LEFT);
  while ($currentDay<=$numberDays) {
    if ($dayOfWeek==7) {
      $dayOfWeek=0;
      $calendar.="</tr><tr>";
    }

    $currentDayRel=str_pad($currentDay,2,"0",STR_PAD_LEFT);
    $date="$year-$month-$currentDayRel";
    $dayname=strtolower(date('I',strtotime($date)));
    $eventnum=0;
    $today=$date==date('Y-m-d')?"today" : "";
    if ($date<date('Y-m-d')) {
      $calendar.="<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>N/A</button>";

    }
    else
    {
       $calendar.="<td class='$today'><h4>$currentDay</h4><a href='book.php?date=".$date."' class='btn btn-success btn-xs'>Book</a>";
    }

    $calendar.="</td>";
    $currentDay++;
    $dayOfWeek++;
  }
  if ($dayOfWeek!=7) {
    $remainingDays=7-$dayOfWeek;
    for ($i=0; $i<$remainingDays; $i++) { 
    $calendar.="<td></td>";
    }

  }
  $calendar.="</tr>";
  $calendar.="</table>";
   echo $calendar;
}
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
   <link href="css/bootstrap.css" rel="stylesheet" />
  <link href="css/bootstrap-theme.css" rel="stylesheet" />
  <title></title>
  <style>
    table{
      table-layout: fixed;
    }
    td{
      width: 33%;
    }
    .today{
      background: yellow;
    }
  </style>
</head>
<body>
 
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php
          $dateComponents=getdate();
          $month=$dateComponents['mon'];
          $year=$dateComponents['year'];
          echo build_calendar($month,$year);
        ?>
  </div>
  </div>
  </div>
 
<script src="jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>