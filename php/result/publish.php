<?php
if(isset($_POST['examTitle'])){
  $examTitle=$_POST['examTitle'];
  require_once "../config/db.php";
  echo $examTitle;
  $checkStatusSql="SELECT * FROM result_teacher_assigned where `status`='Received' and `exam_title`='$examTitle'";
  if($checkStatusExe=mysqli_query($con,$checkStatusSql)){
    if(mysqli_num_rows($checkStatusExe)>0){
      $currentDate=date("Y-m-d");
while($checkStatusResult=mysqli_fetch_assoc($checkStatusExe)){
$assignedId=$checkStatusResult['id'];
$updateMarksStatusSql="UPDATE result_marks set `status`='Published', `published_date`='$currentDate' where result_assigned_id='$assignedId'";
if(mysqli_query($con,$updateMarksStatusSql)){
//delete result_teacher_assigned
$checkAssignedSql="SELECT * FROM result_teacher_assigned where exam_title='$examTitle'";
if($checkAssignedExe=mysqli_query($con,$checkAssignedSql)){
  if(mysqli_num_rows($checkAssignedExe)>0){
    while($checkAssignedResult=mysqli_fetch_assoc($checkAssignedExe)){
      $targetId=$checkAssignedResult['id'];
      $deleteAssignedSql="DELETE FROM result_teacher_assigned where id=$targetId";
      if(mysqli_query($con,$deleteAssignedSql)){
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
      echo "no data 1st";
    }
  }
}else{
  echo "not set";
}
?>


