<?php
require_once "../config/db.php";
if(isset($_GET['id'])){
  $targetId=$_GET['id'];
$examRoutineDelete="DELETE from exam_routine_date where id=$targetId";
if(mysqli_query($con,$examRoutineDelete)){
echo "success";
}
mysqli_close($con);
}
?>