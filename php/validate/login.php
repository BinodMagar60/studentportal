<?php
require_once "../config/db.php";
if(isset($_POST['login-submit'])){
$c_email=$_POST['email'];
$c_password=$_POST['password'];
}
$sql="select * from user_type where email='$c_email'";
$exesql=mysqli_query($con,$sql);
if(mysqli_num_rows($exesql)>0){
$result=mysqli_fetch_assoc($exesql);
if($c_email==$result['email']){
  if(password_verify($c_password, $result['password_hash'])){
    echo "password correct";
  }else{
    echo "incorrect password";
  }
}else{
    echo "incorrect email";
}
}else{
  echo "invalid login";
}
?>