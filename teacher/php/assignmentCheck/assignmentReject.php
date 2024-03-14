<?php
require_once "../../../php/config/db.php";
if(isset($_GET['student_email'],$_GET['assignmentId'])){
  $student_email=$_GET['student_email'];
  $aId=$_GET['assignmentId'];
  $assignment_check_sql= "SELECT * from student_assignment_upload where assignment_id=$aId and `email`='$student_email' ";
  if($assignment_check_exe=mysqli_query($con,$assignment_check_sql)){
    if(mysqli_num_rows($assignment_check_exe)>0){
      $i=0;
  while($assignment_check_result=mysqli_fetch_assoc($assignment_check_exe)){
    $uploadAssignmentId=$assignment_check_result['id'];
    $filePath="../../../".$assignment_check_result['file_path'];
    if($i==0){
      if (file_exists($filePath)) {
        if (unlink($filePath)) {
            echo "File deleted successfully.";
        } else {
            echo "Unable to delete the file.";
        }
    } else {
        echo "File does not exist.";
    }
      $updateSql="UPDATE student_assignment_upload set `status`='Rejected',`file_name`='-', `file_path`='-' where `id`=$uploadAssignmentId";
if(mysqli_query($con,$updateSql)){
  echo "Rejected";
    }
  }else{
    $deleteSql="DELETE from student_assignment_upload where `id`=$uploadAssignmentId";
    if(mysqli_query($con,$deleteSql)){
      echo "Deleted";
    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            echo "File deleted successfully.";
        } else {
            echo "Unable to delete the file.";
        }
    } else {
        echo "File does not exist.";
    }
    }
  }
$i++;
  }
    
}else{
  echo "no data";
}
}
}else{
  echo "no email set";
}
?>