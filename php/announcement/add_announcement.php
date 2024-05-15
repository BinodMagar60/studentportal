<?php
require_once "../config/sessionStart.php";
require_once "../config/db.php";
if(isset($_SESSION['userEmail'])){
  $userEmail=$_SESSION['userEmail'];
}
require_once "../config/db.php";
require_once "announcementValidate.php";
if($_SERVER['REQUEST_METHOD']==='POST'){
if (empty($errors)) {
if(isset($description,$exp_date,$user_whom)){
 if($user_whom == "everyone" || $user_whom == "teacher"){
  $sql= "INSERT INTO announcements(a_description,exp_date,user_whom,user_class,user_section,poster_email) VALUES ('$description','$exp_date','$user_whom','-','-','$userEmail')";
 }else if($user_whom=="student"){
$sql= "INSERT INTO announcements(a_description,exp_date,user_whom,user_class,user_section,poster_email) VALUES ('$description','$exp_date','$user_whom','$user_class','$user_section','$userEmail')";
 }else{
  echo "user_whom error";
 }
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
