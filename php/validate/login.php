<?php
require_once "../config/db.php";
require "../config/sessionStart.php";
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
    $checkRole=$result['role'];
    $_SESSION['loggedIn']=true;
    if($checkRole==0){
      $_SESSION['userType']="admin";
      $_SESSION['userName']=$result['name'];
      $_SESSION['userEmail']=$result['email'];
      header("location: ../../admin/admin.php");
      exit();
    }else if($checkRole==1){
      $_SESSION['userType']="teacher";
      $_SESSION['userName']=$result['name'];
      $_SESSION['userEmail']=$result['email'];
      header("location: ../../teacher/html/dashboard.php");
      exit();
    }else if($checkRole==2){
      $_SESSION['userType']="student";
      $_SESSION['userName']=$result['name'];
      header("location: ../../student/student.php");
  
    }else{
      echo "error";
    }

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