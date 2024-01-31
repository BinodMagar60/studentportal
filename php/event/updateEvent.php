<?php
require_once "../config/db.php";
require_once "updateValidateEvent.php";
if($_SERVER['REQUEST_METHOD']==='POST'){
  if (empty($errors)) {
  if(isset($notice,$n_date)){
if (isset($notice) && $notice !== "") {
    $updateFields[] = "notice = '$notice'";

}

if (isset($n_date) && $n_date !== "") {
    $updateFields[] = "n_date = '$n_date'";
}

$sql= "UPDATE notice SET ";
$sql .= implode(", ",$updateFields);
$sql .= "WHERE id='$uid'";
  if(mysqli_query($con,$sql)){
    // echo "data inserted successfully";.
        // header("location:../../admin/admin.php");
        // exit();
  }else{
    echo "error: ".mysqli_error($con);
  }
  }else{
      echo "not set";
  }
  }else{
    echo "error form";
  }
  }else{
      echo "not submitted";
  }
?>