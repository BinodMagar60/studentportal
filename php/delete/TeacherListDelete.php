<?php
require_once "../config/sessionStart.php";
require_once "../config/db.php";
if(isset($_SESSION['target_t_email'])){
  $target_t_email=$_SESSION['target_t_email'];
  $sql="DELETE FROM user_type where email='$target_t_email'";
  if($exesql=mysqli_query($con,$sql)){
// echo "successfull";
    unset($_SESSION['target_t_email']);
    header("location: ../../admin/admin.php");
    exit();
  }else{
    echo "unsuccessfull";
  }
}else{
  echo "session not set";
}
?>