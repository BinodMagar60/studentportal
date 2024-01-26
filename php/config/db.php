<?php
$server= "localhost";
$user= "root";
$password= "";
$database= "studentportal";

$con = new mysqli($server,$user,$password,$database);

if($con){
  // echo "successfull";
}else{
  echo "error";
}
?>