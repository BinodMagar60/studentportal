<?php
require_once "../php/config/db.php";
if(isset($_GET['title'])){
  $examTitle=$_GET['title'];
$checkAssignedSql="SELECT * FROM result_teacher_assigned where exam_title='$examTitle'";
if($checkAssignedExe=mysqli_query($con,$checkAssignedSql)){
  if(mysqli_num_rows($checkAssignedExe)>0){
    while($checkAssignedResult=mysqli_fetch_assoc($checkAssignedExe)){
      $targetId=$checkAssignedResult['id'];
//delete from marks
$deleteMarksSql="DELETE FROM result_marks where assigned_teacher_id='$targetId'";
if(mysqli_query($con,$deleteMarksSql)){
  echo "Success";
}
      $deleteAssignedSql="DELETE FROM result_teacher_assigned where id=$targetId";
      if(mysqli($con,$deleteAssignedSql)){
        echo "successfull";
      }
    }
  }
}
}else{
  echo "not set";
}
?>