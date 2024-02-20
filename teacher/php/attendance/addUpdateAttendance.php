<?php
require_once "../../../php/config/db.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
  $currentDate=date('Y-m-d');
  $numberOfData=$_POST['numofData'];
  $i=1;
while($i<=$numberOfData){
  $id=$_POST['s_id'.$i];
  $name=$_POST['s_name'.$i];
  $email=$_POST['s_email'.$i];
  $class=$_POST['s_class'.$i];
  $section=$_POST['s_section'.$i];
if(isset($_POST['attendance'.$i])){
$attendance=$_POST['attendance'.$i];
}else{
  $attendance="A";
}
// echo $id.$name.$email.$class.$section.$attendance;
$checkAttendance="SELECT * from attendance where email='$email' and class='$class' and section='$section' and date(attendance_date)='$currentDate'";
$checkAttendanceExe=mysqli_query($con,$checkAttendance);
if(mysqli_num_rows($checkAttendanceExe)>0){
$checkAttendanceResult=mysqli_fetch_assoc($checkAttendanceExe);
$checkDate=date('Y-m-d',strtotime($checkAttendanceResult['attendance_date']));
if($checkDate==$currentDate){
  $updateAttendance= "UPDATE attendance SET s_attendance='$attendance' where email='$email' and class='$class' and section='$section'and date(attendance_date)='$currentDate'";
    if(mysqli_query($con,$updateAttendance)){
      echo "updated";
    }else{
      echo "querry error";
    }
}
else{
  if(isset($id,$name,$email,$class,$section,$attendance)){

    $addAttendance= "INSERT INTO attendance(name,email,class,section,s_attendance,student_id) VALUES ('$name','$email','$class','$section','$attendance','$id')";
    if(mysqli_query($con,$addAttendance)){
      echo "new";
    }else{
      echo "querry error";
    }
  }else{
    echo "not set";
  }
}
}else{
  if(isset($id,$name,$email,$class,$section,$attendance)){

    $addAttendance= "INSERT INTO attendance(name,email,class,section,s_attendance,student_id) VALUES ('$name','$email','$class','$section','$attendance','$id')";
    if(mysqli_query($con,$addAttendance)){
      echo "created";
    }else{
      echo "querry error";
    }
  }else{
    echo "not set";
  }
}

$i++;
}
header("location:../../html/dashboard.php");
      exit();
}else{
  echo "not submitted";
}
?>