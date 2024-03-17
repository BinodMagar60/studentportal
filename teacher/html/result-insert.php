<?php
if(isset($_GET['id'])){
  $assignedId=$_GET['id'];
  require_once "../../php/config/db.php";
$check_teacher_sql= "SELECT * FROM result_teacher_assigned where id='$assignedId'";
if($check_teacher_exe=mysqli_query($con,$check_teacher_sql)){
    if(mysqli_num_rows($check_teacher_exe)>0){
$check_teacher_result=mysqli_fetch_assoc($check_teacher_exe);
$class=$check_teacher_result['class'];
$section=$check_teacher_result['section'];
$assignedTeacher=$check_teacher_result['assigned_teacher'];
      }
    }
        ?>
        <table>
<tr>
  <td>Name</td>
  <td>Science</td>
  <td>English</td>
  <td>Nepali</td>
  <td>Maths</td>
  <td>Social</td>
  <td>Computer</td>
  <td>Account</td>
</tr>
<form action="../php/result/addMarks.php" method="post">
<h1>Marks</h1>
<?php
$studentSelectSql= "SELECT * FROM student_table where class='$class' and section='$section' order by name asc";
if($studentSelectExe=mysqli_query($con,$studentSelectSql)){
  if(mysqli_num_rows($studentSelectExe)>0){
    $i=0;
    while($studentSelectResult=mysqli_fetch_assoc($studentSelectExe)){

?>
<tr>
  <td><?php if(isset($studentSelectResult['name'])) echo $studentSelectResult['name']?></td>
  <input type="hidden" name="s_email_<?php if(isset($i)) echo $i?>" value="<?php if(isset($studentSelectResult['email'])) echo $studentSelectResult['email']?>">
  <input type="hidden" name="r_id_<?php if(isset($i)) echo $i?>" value="<?php if(isset($assignedId)) echo $assignedId?>">
  <?php
  if(isset($studentSelectResult['email'],$assignedId)){
  $student_email=$studentSelectResult['email'];
  $result_assigned_id=$assignedId;
$checkMarksSql="SELECT * FROM result_marks where s_email='$student_email' and result_assigned_id='$result_assigned_id'";
if($checkMarksExe=mysqli_query($con,$checkMarksSql)){
  if(mysqli_num_rows($checkMarksExe)!=0){
$checkMarksResult=mysqli_fetch_assoc($checkMarksExe);
  }}}
  ?>
  <td><input type="number" name="science_<?php if(isset($i)) echo $i?>" value="<?php if(isset($checkMarksResult['science'])) 
  echo $checkMarksResult['science']?>"></td>
  <td><input type="number" name="english_<?php if(isset($i)) echo $i?>" value="<?php if(isset($checkMarksResult['english'])) 
  echo $checkMarksResult['english']?>"></td>
  <td><input type="number" name="nepali_<?php if(isset($i)) echo $i?>" value="<?php if(isset($checkMarksResult['nepali'])) 
  echo $checkMarksResult['nepali']?>"></td>
  <td><input type="number" name="maths_<?php if(isset($i)) echo $i?>" value="<?php if(isset($checkMarksResult['math'])) 
  echo $checkMarksResult['math']?>"></td>
  <td><input type="number" name="social_<?php if(isset($i)) echo $i?>" value="<?php if(isset($checkMarksResult['social'])) 
  echo $checkMarksResult['social']?>"></td>
  <td><input type="number" name="computer_<?php if(isset($i)) echo $i?>" value="<?php if(isset($checkMarksResult['computer'])) 
  echo $checkMarksResult['computer']?>"></td>
  <td><input type="number" name="account_<?php if(isset($i)) echo $i?>" value="<?php if(isset($checkMarksResult['account'])) 
  echo $checkMarksResult['account']?>"></td>
</tr>
      <?php
      $i++;
    }
    ?>
    <input type="hidden" name="count" value="<?php if(isset($i)) echo $i?>">
 <?php }
}
?>


</table>

<button type="submit">Submit</button>
</form>
<?php
}
?>