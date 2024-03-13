<?php
require_once "../../../php/config/db.php";
if(isset($_GET['student_email'],$_GET['assignmentId'])){
  $student_email=$_GET['student_email'];
  $aId=$_GET['assignmentId'];
  $assignment_check_sql= "SELECT * from student_assignment_upload where assignment_id=$aId and `email`='$student_email'";
  if($assignment_check_exe=mysqli_query($con,$assignment_check_sql)){
    if(mysqli_num_rows($assignment_check_exe)>0){
  while($assignment_check_result=mysqli_fetch_assoc($assignment_check_exe)){
    $uploadAssignmentId=$assignment_check_result['id'];
$updateSql="UPDATE student_assignment_upload set `status`='Approved' where `id`=$uploadAssignmentId";
if(mysqli_query($con,$updateSql)){
  echo "approved";
}
  }
    
}else{
  echo "no data";
}

}

}else{
  echo "not set email";
}

?>