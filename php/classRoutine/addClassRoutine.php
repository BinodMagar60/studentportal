<?php
require_once "../config/db.php";
$class="One";
$section="A";

$name_1=$_POST['s_name_1'];
$name_2=$_POST['s_name_2'];
$name_3=$_POST['s_name_3'];
$name_4=$_POST['s_name_4'];
$name_5=$_POST['s_name_5'];
$name_6=$_POST['s_name_6'];
$name_7=$_POST['s_name_7'];


// $first=$_POST['first'];
// $second=$_POST['second'];
// $third=$_POST['third'];
// $fourth=$_POST['fourth'];
// $fifth=$_POST['fifth'];
// $sixth=$_POST['sixth'];
// $seventh=$_POST['seventh'];
$i=1;
// $day="day_";
while($i<7){
  // $dataDay=$day.$i;
$dataDay=$_POST['s_day_'.$i];
$first=$_POST['first_'.$i];
$second=$_POST['second_'.$i];
$third=$_POST['third_'.$i];
$fourth=$_POST['fourth_'.$i];
$fifth=$_POST['fifth_'.$i];
$sixth=$_POST['sixth_'.$i];
$seventh=$_POST['seventh_'.$i];

$insertRoutineSql= "insert into class_routine (firstP,secondP,thirdP,fourthP,fifthP,sixthP,seventhP,class,section,routine_day) values ('$first','$second','$third','$fourth','$fifth','$sixth','$seventh','$class','$section','$dataDay')";
mysqli_query($con,$insertRoutineSql);

  $i++;
}


$insertSubjectRoutineSql="insert into class_routine_subject (`name_1`,`name_2`,`name_3`,`name_4`,`name_5`,`name_6`,`name_7`,`class`,`section`) values ('$name_1','$name_2','$name_3','$name_4','$name_5','$name_6','$name_7','$class','$section')";
mysqli_query($con,$insertSubjectRoutineSql);


?>