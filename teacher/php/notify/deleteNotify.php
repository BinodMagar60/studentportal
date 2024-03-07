<?php
require_once "../../../php/config/db.php";
if(isset($_GET['uid'])){
  $uid=$_GET['uid'];
  $sql_delete="DELETE FROM teacher_notify where id='$uid'";
  if(mysqli_query($con,$sql_delete)){
    echo "delete successfull";
  }
}else{
  echo "not set";
}
?>