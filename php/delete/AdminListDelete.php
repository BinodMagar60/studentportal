<?php
require_once "../config/sessionStart.php";
require_once "../config/db.php";
if(isset($_SESSION['target_a_email'])){
  $target_a_email=$_SESSION['target_a_email'];
  $loggedInEmail= $_SESSION['userEmail'];

  $sql="DELETE FROM user_type where email='$target_a_email'";
  if($exesql=mysqli_query($con,$sql)){
    unset($_SESSION['target_a_email']);
  if($loggedInEmail!=$target_a_email){
    header("location: ../../admin/admin.php");
    exit();
  }else{
    require_once "../validate/logout.php";
  }
  }else{
    echo "unsuccessfull";
  }
}else{
  echo "session not set";
}

?>