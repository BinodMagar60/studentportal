<?php
require_once "../config/db.php";
if(isset($_SERVER['REQUEST_METHOD']==='POST')){
$class="One";
$section="A";

$name_1=test_input($_POST['s_name_1']);
$name_2=test_input($_POST['s_name_2']);
$name_3=test_input($_POST['s_name_3']);
$name_4=test_input($_POST['s_name_4']);
$name_5=test_input($_POST['s_name_5']);
$name_6=test_input($_POST['s_name_6']);
$name_7=test_input($_POST['s_name_7']);



$i=1;
while($i<7){
$dataDay=test_input($_POST['s_day_'.$i]);
$first=test_input($_POST['first_'.$i]);
$second=test_input($_POST['second_'.$i]);
$third=test_input($_POST['third_'.$i]);
$fourth=test_input($_POST['fourth_'.$i]);
$fifth=test_input($_POST['fifth_'.$i]);
$sixth=test_input($_POST['sixth_'.$i]);
$seventh=test_input($_POST['seventh_'.$i]);

$updateRoutineSql = "UPDATE class_routine SET firstP='$first',secondP='$second',thirdP='$third',fourthP='$fourth',fifthP='$fifth',sixthP='$sixth',seventhP='$seventh' WHERE class='$class' AND section='$section' AND routine_day='$dataDay'";
mysqli_query($con, $updateRoutineSql);
  $i++;
}


$updateSubjectRoutineSql = "UPDATE class_routine_subject SET name_1='$name_1',name_2='$name_2',name_3='$name_3',name_4='$name_4',name_5='$name_5',name_6='$name_6',name_7='$name_7' WHERE class='$class' AND section='$section'";
mysqli_query($con, $updateSubjectRoutineSql);

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
mysqli_close($con);
}
?>