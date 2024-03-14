<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
  require_once "../../../php/config/sessionStart.php";
  if(isset($_FILES['assignment'],$_POST['uid'])){
    if(isset($_SESSION['userEmail'])){
  require_once "../../../php/config/db.php";
      $uid=$_POST['uid'];
      $userEmail=$_SESSION['userEmail'];
      $checkSql="SELECT * FROM student_assignment_upload where assignment_id=$uid and email='$userEmail'";
      $checkExe=mysqli_query($con,$checkSql);
      if(mysqli_num_rows($checkExe) >0){
        $checkResult=mysqli_fetch_assoc($checkExe);
          if($checkResult['status']=="Rejected"){
            $uploadAssignmentId=$checkResult['id'];
            $deleteSql="DELETE from student_assignment_upload where `id`=$uploadAssignmentId";
            if(mysqli_query($con,$deleteSql)){
            require_once "uploadAssignmentQuery.php";
            }
          }else if($checkResult['status']!="Approved"){
            require_once "uploadAssignmentQuery.php";
          }
      }else{
        require_once "uploadAssignmentQuery.php";
         }
    }else{
      echo "no session";
    }
  }else{
    echo "not set";
  }
}else{
  echo "not submitted";
}

?>