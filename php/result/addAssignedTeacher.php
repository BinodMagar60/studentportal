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
  $check_teacher_sql="SELECT * FROM result_teacher_assigned where assigned_teacher='$assignedTeacher' and class='$class[$i]' and section='$section[$j]' and exam_title='$examTitle'";
if(mysqli_query($con,$check_teacher_sql)){
  if(mysqli_num_rows(mysqli_query($con,$check_teacher_sql))==0){
    $addAssignedTeacherSql="INSERT into result_teacher_assigned (`exam_title`,`assigned_teacher`,`class`,`section`,`status`) values ('$examTitle','$assignedTeacher','$class[$i]','$section[$j]','Pending')";
    if(mysqli_query($con,$addAssignedTeacherSql)){
      echo "success";
    }
  }else{
    echo "already exists";
  }
}
}
      }  
    }

}
}
?>