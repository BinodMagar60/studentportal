<?php
require_once "../config/db.php";
if($_SERVER['REQUEST_METHOD']==='POST'){
$examTitle=test_input($_POST['exam_title']);
$date_1=test_input($_POST['e_date_1']);
$date_2=test_input($_POST['e_date_2']);
$date_3=test_input($_POST['e_date_3']);
$date_4=test_input($_POST['e_date_4']);
$date_5=test_input($_POST['e_date_5']);
$date_6=test_input($_POST['e_date_6']);
$date_7=test_input($_POST['e_date_7']);

// $updateExamRoutineDateSql= "update exam_routine_date set `date_1`='$date_1',`date_2`='$date_2',`date_3`='$date_3',`date_4`='$date_4',`date_5`='$date_5',`date_6`='$date_6',`date_7`='$date_7',`exam_title`='$examTitle' WHERE id=1";
$addExamRoutineDateSql= "INSERT into exam_routine_date (`date_1`,`date_2`,`date_3`,`date_4`,`date_5`,`date_6`,`date_7`,`exam_title`) values ('$date_1','$date_2','$date_3','$date_4','$date_5','$date_6','$date_7','$examTitle')";
if(mysqli_query($con,$addExamRoutineDateSql)){
  echo "successfull";
  $examIdSql="SELECT * FROM exam_routine_date order by id desc limit 1";
$examIdExe=mysqli_query($con,$examIdSql);
if(mysqli_num_rows($examIdExe)>0){
$examIdResult=mysqli_fetch_assoc($examIdExe);
$exam_id=$examIdResult['id'];
echo $exam_id;
}else{
  echo "no id";
}

$i=0;
while($i<10){
$examRoutineClass=test_input($_POST['examSubjectClass_'.$i]);
$examSubject1=test_input($_POST['examSubject1_'.$i]);
$examSubject2=test_input($_POST['examSubject2_'.$i]);
$examSubject3=test_input($_POST['examSubject3_'.$i]);
$examSubject4=test_input($_POST['examSubject4_'.$i]);
$examSubject5=test_input($_POST['examSubject5_'.$i]);
$examSubject6=test_input($_POST['examSubject6_'.$i]);
$examSubject7=test_input($_POST['examSubject7_'.$i]);

// $updateRoutineSql = "UPDATE `exam_routine_subject` SET `e_subject_1`='$examSubject1',`e_subject_2`='$examSubject2',`e_subject_3`='$examSubject3',`e_subject_4`='$examSubject4',`e_subject_5`='$examSubject5',`e_subject_6`='$examSubject6',`e_subject_7`='$examSubject7' where `class`='$examRoutineClass'";
// mysqli_query($con, $updateRoutineSql);

$addRoutineSql="INSERT into `exam_routine_subject`(`e_subject_1`,`e_subject_2`,`e_subject_3`,`e_subject_4`,`e_subject_5`,`e_subject_6`,`e_subject_7`,`class`,`exam_id`) values ('$examSubject1','$examSubject2','$examSubject3','$examSubject4','$examSubject5','$examSubject6','$examSubject7','$examRoutineClass','$exam_id')";
if(mysqli_query($con, $addRoutineSql)){
  echo "sucess";
}else{
  echo "fail";
}
  $i++;
}
}

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
mysqli_close($con);
?>