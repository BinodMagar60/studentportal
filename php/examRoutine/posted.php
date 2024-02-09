<?php
require_once "../config/db.php";
$status= "posted";
// $reStatus="unposted";
$updateStatus="update exam_routine_date set `examRoutineStatus`='$status'";
if(mysqli_query($con,$updateStatus)){

  ?>

  <script>console.log('Post')</script>

  <?php
}
// $reverseStatus="update exam_routine_date set `examRoutineStatus`='$reStatus'";
// mysqli_query($con,$reverseStatus);
mysqli_close($con);
?>