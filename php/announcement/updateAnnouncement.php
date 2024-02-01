<?php
require_once "../config/db.php";
require_once "updateValidateAnnouncement.php";
if($_SERVER['REQUEST_METHOD']==='POST'){
  if (empty($errors)) {
  if(isset($description,$exp_date,$user_whom)){
if (isset($description) && $description !== "") {
    $updateFields[] = "a_description = '$description'";

}

if (isset($exp_date) && $exp_date !== "") {
    $updateFields[] = "exp_date = '$exp_date'";
}

if (isset($user_whom) && $user_whom !== "") {
  $updateFields[] = "user_whom = '$user_whom'";
}
if (isset($user_class) && $user_class !== "") {
  $updateFields[] = "user_class = '$user_class'";
}
if (isset($user_section) && $user_section !== "") {
  $updateFields[] = "user_section = '$user_section'";
}


$sql= "UPDATE announcements SET ";
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
    echo "error form" ;
  }
  }else{
      echo "not submitted";
  }
?>