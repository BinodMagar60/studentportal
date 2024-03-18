<?php
require_once "..//config/db.php";
  if(isset($_POST['count'],$_POST['examTitle'])){
    $count=$_POST['count'];
    $examTitle=$_POST['examTitle'];
    $checkEmpty=0;
    for ($j = 0; $j < $count; $j++) {
      if ((!empty($_POST['s_email_'.$j]) || $_POST['s_email_'.$j] === '0') && (!empty($_POST['science_'.$j]) || $_POST['science_'.$j] === '0') && (!empty($_POST['maths_'.$j]) || $_POST['maths_'.$j] === '0') && (!empty($_POST['english_'.$j]) || $_POST['english_'.$j] === '0') && (!empty($_POST['nepali_'.$j]) || $_POST['nepali_'.$j] === '0') && (!empty($_POST['social_'.$j]) || $_POST['social_'.$j] === '0') && (!empty($_POST['computer_'.$j]) || $_POST['computer_'.$j] === '0') && (!empty($_POST['account_'.$j]) || $_POST['account_'.$j] === '0')){
        $checkEmpty++;
        // echo $j." hello";
    }else{
        echo "checkEmpty not fullfilled";

      }
  }
if($count == $checkEmpty){
        
    for($i=0;$i<$count;$i++){
        $student_email=$_POST['s_email_'.$i];
        $science=$_POST['science_'.$i];
        $maths=$_POST['maths_'.$i];
        $english=$_POST['english_'.$i];
        $nepali=$_POST['nepali_'.$i];
        $social=$_POST['social_'.$i];
        $computer=$_POST['computer_'.$i];
        $account=$_POST['account_'.$i];
  
        $checkMarksSql="SELECT * FROM result_marks where s_email='$student_email' and exam_title='$examTitle'";
        if($checkMarksExe=mysqli_query($con,$checkMarksSql)){
          $checkMarksResult=mysqli_fetch_assoc($checkMarksExe);
          
          if(mysqli_num_rows($checkMarksExe)>0){
            $marks_id=$checkMarksResult['id'];
            $updateMarksSql="UPDATE result_marks set `exam_title`='$examTitle',`s_email`='$student_email',`science`='$science',`math`='$maths',`english`='$english',`nepali`='$nepali',`social`='$social',`computer`='$computer',`account`='$account' where id=$marks_id";
            if(mysqli_query($con,$updateMarksSql)){
              echo "success for ".$student_email."<br>";
            }
          }
      }
    }
  }else{
    echo " input all data";
  }
  }else{
    echo "not set count";
  }
?>