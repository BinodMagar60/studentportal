<?php
require_once "../config/db.php";
$resultExe=mysqli_query($con,"SELECT * FROM result_teacher_assigned");
while($result=mysqli_fetch_assoc($resultExe)){
$uid=$result['id'];
  mysqli_query($con,"UPDATE result_teacher_assigned set `status`='Received' where id=$uid");
}
?>