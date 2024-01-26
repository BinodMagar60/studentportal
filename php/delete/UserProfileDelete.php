<?php
require_once "../config/sessionStart.php";
require_once "../config/db.php";
if(isset($_SESSION['userEmail'])){
  $target_s_email=$_SESSION['userEmail'];
  $sql="DELETE FROM user_type where email='$target_s_email'";
  if($exesql=mysqli_query($con,$sql)){
    require_once "../validate/logout.php";
    header("location: ../../index.php");
    exit();
  }else{
    echo "unsuccessfull";
  }
}else{
  echo "session not set";
}
?>