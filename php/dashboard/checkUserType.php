<?php
require_once "../config/db.php";
if(isset($_GET['target_email'])){
  $target_email=$_GET['target_email'];
$sql_check="select * from user_type where email='$target_email'";
if($sql_check_exe=mysqli_query($con,$sql_check)){
  if(mysqli_num_rows($sql_check_exe)>0){
    $sql_check_row=mysqli_fetch_assoc($sql_check_exe);
    if($sql_check_row['role']==0){
      header("location: ../../admin/admin-adminprofile-main.php?a_email=$target_email");
      exit();
    }else if($sql_check_row['role']==1){
      header("location: ../../admin/admin-teacherprofile-main.php?t_email=$target_email");
      exit();
    }else if($sql_check_row['role']==2){
      header("location: ../../admin/admin-studentprofile-main.php?s_email=$target_email");
      exit();
    }
  }else{
    echo "no data";
  }
}else{
  echo "query error";
}
}else{
  echo "not set";
}
?>