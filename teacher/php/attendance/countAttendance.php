<?php
require_once "../php/config/db.php";
$class= $detail_s_class;
$section=$detail_s_section;
$current_time=date("Y");
$countAttendance="SELECT count(distinct date(attendance_date)) as totalNum from attendance where class='$class' and section='$section' and Year(attendance_date)=$current_time";
mysqli_query($con,$countAttendance);

$no=mysqli_fetch_assoc(mysqli_query($con,$countAttendance));



//for checking present num
$email=$detail_s_email;
$sql1="SELECT count(s_attendance) as student_attendance from attendance where s_attendance='P' and email='$email' and Year(attendance_date)='$current_time'";
mysqli_query($con,$sql1);
$result=mysqli_fetch_assoc(mysqli_query($con,$sql1));

?>