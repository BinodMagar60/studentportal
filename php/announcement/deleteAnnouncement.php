<?php
require_once "../config/db.php";
if(isset($_GET['uid'])){
  $announcement_id=$_GET['uid'];
  echo $announcement_id;
$delete_announcement= "DELETE FROM announcements where id='$announcement_id'";
if(mysqli_query($con,$delete_announcement)){
  // header("location: ../../admin/admin.php");
  // exit();
}else{
  echo "delete error";
}
}
?>