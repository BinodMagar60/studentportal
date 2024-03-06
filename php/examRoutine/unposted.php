<?php
require_once "../config/db.php";
if(isset($_GET['id'])){
  $targetId=$_GET['id'];
$reStatus="unposted";
$reverseStatus="update exam_routine_date set `examRoutineStatus`='$reStatus' where id=$targetId";
if(mysqli_query($con,$reverseStatus)){
echo "success";
}
mysqli_close($con);
}
?>