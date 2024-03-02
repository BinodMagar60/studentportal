<?php
require_once "../../../php/config/db.php";
require_once "../../../php/config/sessionStart.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
if(!empty($_POST['exp_date'] && !empty($_POST['description'])&& !empty($_POST['class'])&& !empty($_POST['section']))){
  $exp_date=sanitize($_POST['exp_date']);
  $description=sanitize($_POST['description']);
  $class=sanitize($_POST['class']);
  $section=sanitize($_POST['section']);
  $poster_name=sanitize($_SESSION['userName']);
  $addNotifySql="INSERT into teacher_notify (`description`,`exp_date`,`class`,`section`,`poster_name`) values ('$description','$exp_date','$class','$section','$poster_name')";
if(mysqli_query($con,$addNotifySql)){
  echo "successfull";
}else{
  echo "unsuccess";
}
}else{
  echo "empty";
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