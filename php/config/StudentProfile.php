<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/config/db.php";
$userType= 'Student';
if(isset($_SESSION['userEmail'])){
  // $userName=$_SESSION['userName'];
  $userEmail=$_SESSION['userEmail'];
  $sql= "SELECT * FROM student_table where email='$userEmail'";
  if($exesql=mysqli_query($con,$sql)){
    if(mysqli_num_rows($exesql)>0){
      if($result=mysqli_fetch_assoc($exesql)){
        $imageSrc=$result['image'];
        $name=$result['name'];
        $address=$result['address'];
        $contact=$result['contact'];
        $gender=$result['gender'];
        $email=$result['email'];
        $class=$result['class'];
        $section=$result['section'];
        $father=$result['father_name'];
        $mother=$result['mother_name'];
        $p_contact=$result['parents_contact'];

        $studentName= isset($result['name']) ? $result['name']: 'Binod Kaucha' ;
      $dateOfBirth=$result['date_of_birth'];
      $timestamp = strtotime($dateOfBirth);
      $dob=date("F j, Y",$timestamp);
      }else{
        echo "fetch error";
      }
    }else{
      // echo "no result found";
    }
  }else{
    echo "query error";
  }
}
$teacherImage= isset($imageSrc)? $imageSrc: 'extra/admin.jpg';
?>