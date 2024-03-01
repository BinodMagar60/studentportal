<?php
require_once "../config/db.php";
if($_SERVER['REQUEST_METHOD']==='POST'){
$class=$_POST['class'];
$section=$_POST['section'];

$i=1;
while($i<7){

  $dataDay=$_POST['s_day_'.$i];
  $name_1=$_POST['s_name1_'.$i];
  $name_2=$_POST['s_name2_'.$i];
  $name_3=$_POST['s_name3_'.$i];
  $name_4=$_POST['s_name4_'.$i];
  $name_5=$_POST['s_name5_'.$i];
  $name_6=$_POST['s_name6_'.$i];
  $name_7=$_POST['s_name7_'.$i];
  $updateSubjectRoutineSql = "UPDATE class_routine_subject SET name_1='$name_1',name_2='$name_2',name_3='$name_3',name_4='$name_4',name_5='$name_5',name_6='$name_6',name_7='$name_7' WHERE class='$class' AND section='$section' AND class_day='$dataDay'";
mysqli_query($con, $updateSubjectRoutineSql);
  $i++;
}







$first=$_POST['firstP'];
$second=$_POST['secondP'];
$third=$_POST['thirdP'];
$fourth=$_POST['fourthP'];
$fifth=$_POST['fifthP'];
$sixth=$_POST['sixthP'];
$seventh=$_POST['seventhP'];

$updateRoutineSql = "UPDATE class_routine SET firstP='$first',secondP='$second',thirdP='$third',fourthP='$fourth',fifthP='$fifth',sixthP='$sixth',seventhP='$seventh' where id=1";
mysqli_query($con, $updateRoutineSql);







function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
mysqli_close($con);
}
?>