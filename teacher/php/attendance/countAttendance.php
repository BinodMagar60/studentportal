<?php
require_once "../php/config/db.php";
// $class= 'One';
// $section='A';
$current_time=date("Y");
// $countAttendance="SELECT count(distinct date(attendance_date)) as totalNum from attendance where class='$class' and section='$section'";
// mysqli_query($con,$countAttendance);

// $no=mysqli_fetch_assoc(mysqli_query($con,$countAttendance));
// echo $no['totalNum'];



//for checking present num
$email=$detail_s_email;
// $test2='binod@gmail.com';
$sql1="SELECT count(s_attendance) as student_attendance from attendance where s_attendance='P' and email='$email' and Year(attendance_date)='$current_time'";
mysqli_query($con,$sql1);
$result=mysqli_fetch_assoc(mysqli_query($con,$sql1));
// echo $test1n['1Present'];

// $sql2="SELECT count(s_attendance) as 2Present from attendance where s_attendance='P' and email='$test2'";
// mysqli_query($con,$sql2);
// $test3n=mysqli_fetch_assoc(mysqli_query($con,$sql2));
// echo $test3n['2Present'];
// ?>