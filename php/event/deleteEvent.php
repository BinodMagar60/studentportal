<?php
  require_once "../config/db.php";
  if(isset($_GET['uid'])){
    $notice_id=$_GET['uid'];
  $delete_notice= "DELETE FROM notice where id='$notice_id'";
  if(mysqli_query($con,$delete_notice)){
    header("location: ../../admin/admin.php");
    exit();
  }else{
    echo "delete error";
  }
  }
?>