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
    $sessionId=uniqid();
      $updateSessionId="UPDATE user_type set `sessionId`='$sessionId' where email='$c_email'";
      mysqli_query($con,$updateSessionId);
      setcookie("session_id",$sessionId,time()+60*60*24*60, "/");
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
      $_SESSION['userEmail']=$result['email'];
      $studentSql="select * from student_table where email='$c_email'";
      if($studentExe=mysqli_query($con,$studentSql)){
        if(mysqli_num_rows($studentExe)>0){
          if($studentResult=mysqli_fetch_assoc($studentExe)){
            $_SESSION['userClass']=$studentResult['class'];
            $_SESSION['userSection']=$studentResult['section'];
          }
        }
      }
      header("location: ../../student/html/dashboard.php");
  
    }else{
      header("location: index.php");
    }

  }else{
    // echo "incorrect password";
    ?>

    <script>alert("Incorrect password");window.location.href = "../../index.php"</script>

<?php



  }
}else{
    // echo "incorrect email";

    ?>

    <script>alert("Incorrect Email");window.location.href = "../../index.php"</script>

<?php


}
}else{
  // echo "invalid login";

  ?>

    <script>alert("Invalid Login");window.location.href = "../../index.php"</script>

<?php

}
?>