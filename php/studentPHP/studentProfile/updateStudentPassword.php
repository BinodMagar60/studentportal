<?php
require_once "../../config/sessionStart.php";
if(isset($_SESSION['userEmail'])){
$email=$_SESSION['userEmail'];
   if (!empty($_POST["npassword"] && $_POST["rnpassword"])) {
    require_once "../../config/db.php";
    $spassword = $_POST["rnpassword"];
    $secure_password=password_hash($spassword,PASSWORD_DEFAULT);
    $sql= "UPDATE user_type set password_hash= '$secure_password' where email='$email'";
if(mysqli_query($con,$sql)){
  header("location: ../../../student/html/Studentprofile.php");
  exit();
}else{
  echo "unsuccessfull";
}
}else{
  echo "not inputted on both";
}
}
?>