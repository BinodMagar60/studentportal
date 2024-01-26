<?php
require_once "../config/db.php";
require_once "../validate/teacherValidate.php";
if($_SERVER['REQUEST_METHOD']==='POST'){
if (empty($errors)) {
$role=1; // for teachers
//array for checking
/*
echo "
$sname 
$saddress
$sgender
$sdob 
$scontact
$smail 
$simage
$sfather 
$smother
$sparentcontact
$sclass
$ssection
";
*/
if(isset($sname,$saddress,$sgender,$sdob,$scontact,$smail,$simage,$subject)){
  //secure password
  $crow=mysqli_query($con,"select * from user_type where email='$smail'");
  if(mysqli_num_rows($crow)==0){

  $sql2= "INSERT INTO user_type(name,email,password_hash,role) VALUES('$sname','$smail','$secure_password','$role')";
  if(mysqli_query($con,$sql2)){
  }else{
    echo "error: ".mysqli_error($con);
  }
  $sql1= "INSERT INTO teacher_table(name,address, gender, date_of_birth, contact, email, image, subject) VALUES ('$sname','$saddress','$sgender','$sdob','$scontact','$smail','$simage','$subject')";
  if(mysqli_query($con,$sql1)){
  // echo "data inserted successfully";.

  }else{
  echo "error: ".mysqli_error($con);
  }
  }else{
  echo "error already has this email";
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