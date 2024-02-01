<?php
require_once "../config/db.php";
$countAdmin_sql="SELECT COUNT(*) as count from admin_table";
$countTeacher_sql="SELECT COUNT(*) as count from teacher_table";
$countStudent_sql="SELECT COUNT(*) as count from student_table";

if($countAdmin_exe=mysqli_query($con,$countAdmin_sql)){
  $countAdmin_row=mysqli_fetch_assoc($countAdmin_exe);
  echo $countAdmin_row['count']."admin<br>";
}


if($countTeacher_exe=mysqli_query($con,$countTeacher_sql)){
  $countTeacher_row=mysqli_fetch_assoc($countTeacher_exe);
  echo $countTeacher_row['count']."teacher<br>";
}
if($countStudent_exe=mysqli_query($con,$countStudent_sql)){
  $countStudent_row=mysqli_fetch_assoc($countStudent_exe);
  echo $countStudent_row['count']."student<br>";
}
?>