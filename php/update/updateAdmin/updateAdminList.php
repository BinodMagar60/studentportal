<?php
require_once "../../config/sessionStart.php";
require_once "../../config/db.php";
require_once "updateAdminListValidate.php";
$detail_a_email=$_SESSION['target_a_email'];
if($_SERVER['REQUEST_METHOD']==='POST'){
if (empty($errors)) {
  $crow=mysqli_query($con,"select * from admin_table where email='$detail_a_email'");
  if(mysqli_num_rows($crow)>0){
    $result=mysqli_fetch_assoc($crow);
    $filePath = $result['image'];
    if($result['name']!=$sname){
  $sql2= "UPDATE user_type SET name ='$sname' where email='$detail_a_email'";
  if(mysqli_query($con,$sql2)){
    $_SESSION['userName']=$sname;

  }else{
    echo "error: ".mysqli_error($con);
  }

  if (isset($sname) && $sname !== "") {
    $updateFields[] = "name = '$sname'";
}
}
if($result['gender']!=$saddress){
if (isset($saddress) && $saddress !== "") {
    $updateFields[] = "address = '$saddress'";
}
}
if($result['contact']!=$scontact){
if (isset($scontact) && $scontact !== "") {
    $updateFields[] = "contact = '$scontact'";
}
}

if (isset($simage) && $simage !== "") {
    $updateFields[] = "image = '$simage'";
}

$sql1= "UPDATE admin_table SET ";
$sql1 .= implode(", ",$updateFields);
$sql1 .= "WHERE email='$detail_a_email'";
if(mysqli_query($con,$sql1)){
  // if(isset($simage)){
  //   require_once "../../config/DeleteFile.php";
  // }
    header("location: ../../../admin/admin-adminprofile-main.php");
    exit();
}else{
  echo "error: ".mysqli_error($con);
}

  }else{
    echo "no data";
  }
}else{
  echo "error form";
}
}else{
    echo "not submitted";
}

?>