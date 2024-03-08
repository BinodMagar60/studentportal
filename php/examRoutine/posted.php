<?php
require_once "../config/db.php";
if(isset($_GET['id'])){
$targetId=$_GET['id'];
$status= "posted";
// $reStatus="unposted";
$updateStatus="update exam_routine_date set `examRoutineStatus`='$status' where id=$targetId";
if(mysqli_query($con,$updateStatus)){
  echo "success";
  $examSql="SELECT id FROM exam_routine_date WHERE NOT id=$targetId";
  if($examExe=mysqli_query($con,$examSql)){
    if(mysqli_num_rows($examExe)>0){
while($examResult=mysqli_fetch_assoc($examExe)){
  $uid=$examResult['id'];
  $unpostExam="UPDATE exam_routine_date set `examRoutineStatus`='unposted' where id=$uid";
  if(mysqli_query($con,$unpostExam)){
echo " unpost";
  }
}
    }
  }
}
// $reverseStatus="update exam_routine_date set `examRoutineStatus`='$reStatus'";
// mysqli_query($con,$reverseStatus);
mysqli_close($con);
}
?>