<?php
require_once "../../../php/config/db.php";
  $id=$_GET['uid'];
  $delete_assignment="DELETE FROM assignments WHERE id=$id";
  if(mysqli_query($con,$delete_assignment)){
    echo "delete successfull";
  }else{
    echo "unsuccessfull";
  }
?>