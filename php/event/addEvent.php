<?php
require_once "../config/db.php";
require_once "noticeValidate.php";
if($_SERVER['REQUEST_METHOD']==='POST'){
if (empty($errors)) {
if(isset($notice,$n_date)){
 
$sql= "INSERT INTO notice(notice,n_date) VALUES ('$notice','$n_date')";
if(mysqli_query($con,$sql)){
  // echo "data inserted successfully";.
      header("location:../../admin/admin.php");
      exit();
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