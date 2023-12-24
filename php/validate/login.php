<?php
require_once "../config/db.php";
if(isset($_POST['login-submit'])){
$cemail=$_POST['email'];
$cpassword=$_POST['password'];

}

$sql="select * from student_table where email='$cemail')";
$exesql=mysqli_query($con,$sql);
if($cemail==$exesql['email']){
  if(password_verify($cpassword,$exesql['password_hash'])){
    
  }
}

?>