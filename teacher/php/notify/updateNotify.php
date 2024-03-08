<?php
require_once "../../../php/config/db.php";
require_once "updateValidateNotify.php";
if($_SERVER['REQUEST_METHOD']==='POST'){
  if (empty($errors)) {
if (isset($description) && $description !== "") {
    $updateFields[] = "description = '$description'";

}

if (isset($exp_date) && $exp_date !== "") {
    $updateFields[] = "exp_date = '$exp_date'";
}

if (isset($class) && $class !== "") {
  $updateFields[] = "class = '$class'";
}
if (isset($section) && $section !== "") {
  $updateFields[] = "section = '$section'";
}


$sql= "UPDATE teacher_notify SET ";
$sql .= implode(", ",$updateFields);
$sql .= "WHERE id='$uid'";
  if(mysqli_query($con,$sql)){
    // echo "data inserted successfully";
        // header("location:../../admin/admin.php");
        // exit();
  }else{
    echo "error: ".mysqli_error($con);
  }
  }else{
    echo "error form" ;
    print_r($errors);
  }
  }else{
      echo "not submitted";
  }
?>