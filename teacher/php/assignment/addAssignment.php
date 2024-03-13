<?php
require_once "../../../php/config/db.php";
require_once "../../../php/config/sessionStart.php";
if(isset($_SESSION['userEmail'])){
  $userEmail=sanitize($_SESSION['userEmail']);
}
if($_SERVER['REQUEST_METHOD']=='POST'){
  require_once "assignmentValidate.php";
  if (empty($errors)) {
    if(isset($description,$exp_date,$title,$user_class,$user_section)){
      // echo $description.$exp_date.$title.$user_class.$user_section.$userName;
    $sql= "INSERT INTO assignments(exp_date,a_title,a_description,a_class,a_section,a_subject,poster_email) VALUES ('$exp_date','$title','$description','$user_class','$user_section','$user_subject','$userEmail')";

    if(mysqli_query($con,$sql)){
      echo "data inserted successfully";
          // header("location:../../admin/admin.php");
          // exit();
    }else{
      echo "error: ".mysqli_error($con);
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


function sanitize($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>