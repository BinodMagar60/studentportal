<?php
$server= "localhost";
$user= "root";
$password= "";
$database= "student_routine";

$routineCon = new mysqli($server,$user,$password,$database);

if($routineCon){
  // echo "successfull";
}else{
  echo "error";
}
?>