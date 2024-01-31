<?php
require_once "../config/db.php";
require_once "announcementValidate.php";
if($_SERVER['REQUEST_METHOD']==='POST'){
if (empty($errors)) {
if(isset($description,$exp_date,$user_whom)){
 
$sql= "INSERT INTO announcements(a_description,exp_date,user_whom,user_class,user_section) VALUES ('$description','$exp_date','$user_whom','$user_class','$user_section')";
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
