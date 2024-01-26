<?php
require_once "../config/db.php";
require_once "../validate/studentValidate.php";
if($_SERVER['REQUEST_METHOD']==='POST'){
if (empty($errors)) {
// $sname=$_POST['s-name'];
// $saddress=$_POST['s-address'];
// $sgender=$_POST['gender'];
// $sdob=$_POST['s-dob'];
// $scontact=$_POST['s-contact'];
// $smail=$_POST['s-mail'];
// $spassword=$_POST['s-password'];
// $sfather=$_POST['s-father'];
// $smother=$_POST['s-mother'];
// $sparentcontact=$_POST['s-parentcontact'];
// $sclass=$_POST['classes'];
// $ssection=$_POST['sections'];
// // $simage=$_POST['s-image'];
// $simage="hello";
$role=2;// for students
//array for checking

// echo "
// $sname 
// $saddress
// $sgender
// $sdob 
// $scontact
// $smail 
// $simage
// $sfather 
// $smother
// $sparentcontact
// $sclass
// $ssection
// ";

if(isset($sname,$saddress,$sgender,$sdob,$scontact,$smail,$simage,$sfather,$smother,$sparentcontact,$sclass,$ssection)){
  //secure password
  $crow=mysqli_query($con,"select * from user_type where email='$smail'");
  if(mysqli_num_rows($crow)==0){

  $sql2= "INSERT INTO user_type (name,email,password_hash,role) VALUES('$sname','$smail','$secure_password','$role')";
  if(mysqli_query($con,$sql2)){
  // header("location: ../../admin.html");
  }else{
    echo "error: ".mysqli_error($con);
  }
$sql1= "INSERT INTO student_table(name,address, gender, date_of_birth, contact, email, image, father_name, mother_name,parents_contact, class, section) VALUES ('$sname','$saddress','$sgender','$sdob','$scontact','$smail','$simage','$sfather','$smother','$sparentcontact','$sclass','$ssection')";
if(mysqli_query($con,$sql1)){
  // echo "data inserted successfully";

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