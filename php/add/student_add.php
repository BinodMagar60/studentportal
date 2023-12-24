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
  $secure_password=password_hash($spassword,PASSWORD_DEFAULT);
$sql1= "INSERT INTO student_table(name,address, gender, date_of_birth, contact, email, image, father_name, mother_name,parents_contact, class, section) VALUES ('$sname','$saddress','$sgender','$sdob','$scontact','$smail','$simage','$sfather','$smother','$sparentcontact','$sclass','$ssection')";
if(mysqli_query($con,$sql1)){
  // echo "data inserted successfully";
  $sql2= "INSERT INTO user_type(email,password_hash,role) VALUES('$smail','$secure_password','$role')";
  if(mysqli_query($con,$sql2)){
  header("location: ../../admin.html");
exit();
  }else{
    echo "error: ".mysqli_error($con);
  }
}else{
  echo "error: ".mysqli_error($con);
}
}
}

?>