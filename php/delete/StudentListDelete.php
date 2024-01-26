<?php
require_once "../config/sessionStart.php";
require_once "../config/db.php";
if(isset($_SESSION['target_s_email'])){
  $target_s_email=$_SESSION['target_s_email'];
  $sql="DELETE FROM user_type where email='$target_s_email'";
  if($exesql=mysqli_query($con,$sql)){
// echo "successfull";
    unset($_SESSION['target_s_email']);
    header("location: ../../admin/admin.php");
    exit();
  }else{
    echo "unsuccessfull";
  }
}else{
  echo "session not set";
}
?>