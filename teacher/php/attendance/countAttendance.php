<?php
require_once "../../../php/config/db.php";
$class= 'One';
$section='A';
$countAttendance="SELECT count(distinct date(attendance_date)) as totalNum from attendance where class='$class' and section='$section'";
mysqli_query($con,$countAttendance);

$no=mysqli_fetch_assoc(mysqli_query($con,$countAttendance));
echo $no['totalNum'];



//for checking present num
$test1='fsdasaf@gmail.com';
$test2='binod@gmail.com';
$sql1="SELECT count(s_attendance) as 1Present from attendance where s_attendance='P' and email='$test1'";
mysqli_query($con,$sql1);
$test1n=mysqli_fetch_assoc(mysqli_query($con,$sql1));
echo $test1n['1Present'];

$sql2="SELECT count(s_attendance) as 2Present from attendance where s_attendance='P' and email='$test2'";
mysqli_query($con,$sql2);
$test3n=mysqli_fetch_assoc(mysqli_query($con,$sql2));
echo $test3n['2Present'];
?>