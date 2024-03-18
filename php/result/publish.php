<?php
if(isset($_GET['title'])){
  $examTitle=$_GET['title'];
  require_once "../config/db.php";
  $checkStatusSql="SELECT * FROM result_teacher_assigned where `status`='Recieved' and `exam_title='$examTitle'`";
  if($checkStatusExe=mysqli_query($con,$checkStatusSql)){
    if(mysqli_num_rows($checkStatusExe)>0){
while($checkStatusResult=mysqli_fetch_assoc($checkStatusExe)){
$assignedId=$checkStatusResult['id'];
$updateMarksStatusSql="UPDATE result_marks set `status`='Published' where assigned_teacher_id='$assignedId'";
if(mysqli_query($con,$updateMarksStatusSql)){
//delete result_teacher_assigned
  echo "updated Success";
}
}
    }
  }
}
?>