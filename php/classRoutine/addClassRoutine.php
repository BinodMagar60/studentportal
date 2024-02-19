<?php
require_once "../config/db.php";
$class="Ten";
$section="A";

$checkDataSql= "select * from class_routine_subject where `class`='$class' and `section`='$section'";
$checkDataExe=mysqli_query($con,$checkDataSql);

if(mysqli_num_rows($checkDataExe)==0){

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
$name_1=$_POST['s_name1_'.$i];
$name_2=$_POST['s_name2_'.$i];
$name_3=$_POST['s_name3_'.$i];
$name_4=$_POST['s_name4_'.$i];
$name_5=$_POST['s_name5_'.$i];
$name_6=$_POST['s_name6_'.$i];
$name_7=$_POST['s_name7_'.$i];

$insertSubjectRoutineSql="insert into class_routine_subject (`name_1`,`name_2`,`name_3`,`name_4`,`name_5`,`name_6`,`name_7`,`class`,`section`,`class_day`) values ('$name_1','$name_2','$name_3','$name_4','$name_5','$name_6','$name_7','$class','$section','$dataDay')";
mysqli_query($con,$insertSubjectRoutineSql);
  $i++;
}
// $first=$_POST['firstP'];
// $second=$_POST['secondP'];
// $third=$_POST['thirdP'];
// $fourth=$_POST['fourthP'];
// $fifth=$_POST['fifthP'];
// $sixth=$_POST['sixthP'];
// $seventh=$_POST['seventhP'];
// $insertRoutineSql= "insert into class_routine (firstP,secondP,thirdP,fourthP,fifthP,sixthP,seventhP) values ('$first','$second','$third','$fourth','$fifth','$sixth','$seventh')";
// mysqli_query($con,$insertRoutineSql);
}else{
  echo "already exists";
}


?>