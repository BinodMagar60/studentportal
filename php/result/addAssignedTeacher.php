<?php
require_once "../config/db.php";
if($_SERVER['REQUEST_METHOD']=="POST"){
if($_POST['exam_title']){
  function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);   
    return $data;
}
  $examTitle=sanitize($_POST['exam_title']);
  $class = array("One","Two","Three","Four","Five","Six","Seven","Eight","Nine","Ten");
$section= array("A","B","C");
  for($i=0;$i<10;$i++){
    for($j=0;$j<3;$j++){
if($_POST["$class[$i]_$section[$j]"]!="-"){
  $assignedTeacher=$_POST["$class[$i]_$section[$j]"];
  $check_teacher_sql="SELECT * FROM result_teacher_assigned where class='$class[$i]' and section='$section[$j]'";
if($check_teacher_exe=mysqli_query($con,$check_teacher_sql)){
  if(mysqli_num_rows($check_teacher_exe)==0){
    $addAssignedTeacherSql="INSERT into result_teacher_assigned (`exam_title`,`assigned_teacher`,`class`,`section`,`status`) values ('$examTitle','$assignedTeacher','$class[$i]','$section[$j]','Pending')";
    if(mysqli_query($con,$addAssignedTeacherSql)){
      echo "success";
    }
  }else{
    $check_teacher_result=mysqli_fetch_assoc($check_teacher_exe);
    $uid=$check_teacher_result['id'];
    $updateAssignedTeacherSql="UPDATE result_teacher_assigned set `exam_title`='$examTitle',`assigned_teacher`='$assignedTeacher',`class`='$class[$i]',`section`='$section[$j]',`status`='Pending' where id=$uid and `status`='Pending'";
    if(mysqli_query($con,$updateAssignedTeacherSql)){
      echo "updated";
    }
  }
}
}
      }  
    }

}
}
?>