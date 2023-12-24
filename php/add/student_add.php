<?php
require_once "../config/db.php";
if(isset($_POST['s_submit'])){
$sname=$_POST['s-name'];
$saddress=$_POST['s-address'];
$sgender=$_POST['gender'];
$sdob=$_POST['s-dob'];
$scontact=$_POST['s-contact'];
$smail=$_POST['s-mail'];
$spassword=$_POST['s-password'];
$simage=$_POST['s-image'];
$sfather=$_POST['s-father'];
$smother=$_POST['s-mother'];
$sparentcontact=$_POST['s-parentcontact'];
$sclass=$_POST['classes'];
$ssection=$_POST['sections'];
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
  $secure_password=password_hash($spassword,PASSWORD_DEFAULT);
$sql= "INSERT INTO student_table(name,address, gender, date_of_birth, contact, email, password_hash, image, father_name, mother_name,parents_contact, class, section) VALUES ('$sname','$saddress','$sgender','$sdob','$scontact','$smail','$secure_password','$simage','$sfather','$smother','$sparentcontact','$sclass','$ssection')";

if(mysqli_query($con,$sql)){
  // echo "data inserted successfully";
}else{
  // echo "error";
}
}
}
header("location: ../../admin.html");
exit();
?>