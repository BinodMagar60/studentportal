<?php
require_once "../config/db.php";
$reStatus="unposted";
$reverseStatus="update exam_routine_date set `examRoutineStatus`='$reStatus'";
if(mysqli_query($con,$reverseStatus)){

  ?>
  <script>console.log('Unpost')</script>"
  <?php
}
mysqli_close($con);
?>