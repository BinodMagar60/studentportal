<?php
require_once "../../../php/config/sessionStart.php";
if(isset($_SESSION['userEmail'])){
require_once "../../../php/config/db.php";
  if(isset($_POST['count'])){
    $count=$_POST['count'];
    $userEmail=$_SESSION['userEmail'];
    for($i=0;$i<$count;$i++){
      if(isset($_POST['s_email_'.$i],$_POST['r_id_'.$i],$_POST['science_'.$i],$_POST['maths_'.$i],$_POST['english_'.$i],$_POST['nepali_'.$i],$_POST['social_'.$i],$_POST['computer_'.$i],$_POST['account_'.$i])){
        // echo $_POST['s_email_'.$i].$_POST['r_id_'.$i].$_POST['science_'.$i].$_POST['maths_'.$i].$_POST['english_'.$i].$_POST['nepali_'.$i].$_POST['social_'.$i].$_POST['computer_'.$i].$_POST['account_'.$i];
        $student_email=$_POST['s_email_'.$i];
        $result_assigned_id=$_POST['r_id_'.$i];
        $science=$_POST['science_'.$i];
        $maths=$_POST['maths_'.$i];
        $english=$_POST['english_'.$i];
        $nepali=$_POST['nepali_'.$i];
        $social=$_POST['social_'.$i];
        $computer=$_POST['computer_'.$i];
        $account=$_POST['account_'.$i];
  
        $checkMarksSql="SELECT * FROM result_marks where s_email='$student_email' and result_assigned_id='$result_assigned_id'";
        if($checkMarksExe=mysqli_query($con,$checkMarksSql)){
          $checkMarksResult=mysqli_fetch_assoc($checkMarksExe);
          $marks_id=$checkMarksResult['id'];
          if(mysqli_num_rows($checkMarksExe)==0){
          $addMarksSql="INSERT into result_marks (`result_assigned_id`,`s_email`,`science`,`math`,`english`,`nepali`,`social`,`computer`,`account`,`status`,`assigned_by`) values ('$result_assigned_id','$student_email','$science','$maths','$english','$nepali','$social','$computer','$account','unPublished','$userEmail')";
          if(mysqli_query($con,$addMarksSql)){
            echo "success for ".$student_email."<br>";
          }
          }else{
            // echo "update";
            $updateMarksSql="UPDATE result_marks set `result_assigned_id`='$result_assigned_id',`s_email`='$student_email',`science`='$science',`math`='$maths',`english`='$english',`nepali`='$nepali',`social`='$social',`computer`='$computer',`account`='$account',`status`='unPublished',`assigned_by`='$userEmail' where id=$marks_id";
            if(mysqli_query($con,$updateMarksSql)){
              echo "success for ".$student_email."<br>";
            }
          }
        }
        
      }
    }
  
  }
}
?>