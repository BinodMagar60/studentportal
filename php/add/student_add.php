<?php
require_once "../config/db.php";
require_once "../validate/validate.php";
if (empty($errors)) {
if(isset($_POST['s_submit'])){
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
// $simage=$_POST['s-image'];
$simage=$_POST['s-image'];
$role=0;
//array
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
if(isset($sname,$saddress,$sgender,$sdob,$scontact,$smail,$simage,$sfather,$smother,$sparentcontact,$sclass,$ssection)){
  //secure password
  $crow=mysqli_query($con,"select * from user_type where email='$smail'");
  if(mysqli_num_rows($crow)==0){
  $secure_password=password_hash($spassword,PASSWORD_DEFAULT);
$sql1= "INSERT INTO student_table(name,address, gender, date_of_birth, contact, email, image, father_name, mother_name,parents_contact, class, section) VALUES ('$sname','$saddress','$sgender','$sdob','$scontact','$smail','$simage','$sfather','$smother','$sparentcontact','$sclass','$ssection')";
if(mysqli_query($con,$sql1)){
  // echo "data inserted successfully";
  $sql2= "INSERT INTO user_type(email,password_hash,role) VALUES('$smail','$secure_password','$role')";
  if(mysqli_query($con,$sql2)){
  // header("location: ../../admin.html");
exit();
  }else{
    echo "error: ".mysqli_error($con);
  }
}else{
  echo "error: ".mysqli_error($con);
}
}else{
  echo "error already has this email";
}
}
}
}else{
  echo "error form";
}
?>