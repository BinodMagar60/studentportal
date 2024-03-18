<?php
if(isset($_POST['title'])){
  $examTitle=$_POST['title'];
  require_once "../config/db.php";
  $checkStatusSql="SELECT * FROM result_teacher_assigned where `status`='Recieved' and `exam_title`='$examTitle'";
  if($checkStatusExe=mysqli_query($con,$checkStatusSql)){
    if(mysqli_num_rows($checkStatusExe)>0){
while($checkStatusResult=mysqli_fetch_assoc($checkStatusExe)){
$assignedId=$checkStatusResult['id'];
$updateMarksStatusSql="UPDATE result_marks set `status`='Published' where assigned_teacher_id='$assignedId'";
if(mysqli_query($con,$updateMarksStatusSql)){
//delete result_teacher_assigned
$checkAssignedSql="SELECT * FROM result_teacher_assigned where exam_title='$examTitle'";
if($checkAssignedExe=mysqli_query($con,$checkAssignedSql)){
  if(mysqli_num_rows($checkAssignedExe)>0){
    while($checkAssignedResult=mysqli_fetch_assoc($checkAssignedExe)){
      $targetId=$checkAssignedResult['id'];
      $deleteAssignedSql="DELETE FROM result_teacher_assigned where id=$targetId";
      if(mysqli($con,$deleteAssignedSql)){
        echo "successfull";
      }
    }
  }else{
    echo "no data";
  }
}
}else{
}
}
    }else{
      echo "no data";
    }
  }
}else{
  echo "not set";
}
?>