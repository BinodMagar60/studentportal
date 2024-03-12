<?php
require_once "../../../php/config/db.php";
require_once "updateValidateAssignment.php";
if($_SERVER['REQUEST_METHOD']==='POST'){
  if (empty($errors)) {
  if(isset($description,$exp_date,$title)){
    if (isset($title) && $title !== "") {
      $updateFields[] = "a_title = '$title'";
  
  }
if (isset($description) && $description !== "") {
    $updateFields[] = "a_description = '$description'";

}

if (isset($exp_date) && $exp_date !== "") {
    $updateFields[] = "exp_date = '$exp_date'";
}

if (isset($user_class) && $user_class !== "") {
  $updateFields[] = "a_class = '$user_class'";
}
if (isset($user_section) && $user_section !== "") {
  $updateFields[] = "a_section = '$user_section'";
}
if (isset($user_subject) && $user_subject !== "") {
  $updateFields[] = "a_subject = '$user_subject'";
}

$sql= "UPDATE assignments SET ";
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