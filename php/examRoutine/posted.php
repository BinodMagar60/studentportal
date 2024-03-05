<?php
require_once "../config/db.php";
if(isset($_GET['id'])){
$targetId=$_GET['id'];
$status= "posted";
// $reStatus="unposted";
$updateStatus="update exam_routine_date set `examRoutineStatus`='$status' where id=$targetId";
if(mysqli_query($con,$updateStatus)){
  echo "success";
}
// $reverseStatus="update exam_routine_date set `examRoutineStatus`='$reStatus'";
// mysqli_query($con,$reverseStatus);
mysqli_close($con);
}
?>