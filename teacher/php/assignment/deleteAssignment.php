<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  $id=$_POST['id'];
  $delete_assignment="DELETE FROM assignments WHERE id=$id";
  if(mysqli_query($con,$delete_assignment)){
    echo "delete successfull";
  }else{
    echo "unsuccessfull";
  }
}
?>