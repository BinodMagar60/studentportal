<?php
require_once "../config/db.php";
if(isset($_GET['title'])){
  $examTitle=$_GET['title'];
$checkAssignedSql="SELECT * FROM result_teacher_assigned where exam_title='$examTitle'";
if($checkAssignedExe=mysqli_query($con,$checkAssignedSql)){
  if(mysqli_num_rows($checkAssignedExe)>0){
    while($checkAssignedResult=mysqli_fetch_assoc($checkAssignedExe)){
      $targetId=$checkAssignedResult['id'];
//delete from marks
$deleteMarksSql="DELETE FROM result_marks where result_assigned_id='$targetId' and  `status`='unPublished'";
if(mysqli_query($con,$deleteMarksSql)){
  echo "Success";
}
      $deleteAssignedSql="DELETE FROM result_teacher_assigned where id=$targetId";
      if(mysqli_query($con,$deleteAssignedSql)){
        echo "successfull";
      }
    }
  }else{
    echo "no data";
  }
}else{
  echo "query error";
}
}else{
  echo "not set";
}
?>