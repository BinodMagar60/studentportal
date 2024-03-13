<table border="1">
  <tr>
      <td>S.N</td>
      <td>Name</td>
      <td>Status</td>
      <td>Uploaded Date</td>
      <td>Download</td>
      <td>Action</td>
      </tr>
<?php
if(isset($_GET['a_id'])){
// echo $_GET['a_id'];
require_once "../../php/config/db.php";
$aId=$_GET['a_id'];
$class = isset($_GET['class']) ? $_GET['class'] : 'one';
$section = isset($_GET['section']) ? $_GET['section'] : 'A';
$sql= "SELECT * FROM student_table where `class`='$class' and `section`='$section'";
if($exesql=mysqli_query($con,$sql)){
  if(mysqli_num_rows($exesql)>0){
    $i=1;
    while($result=mysqli_fetch_assoc($exesql)){
      $student_name=$result['name'];
      $student_email=$result['email'];
?>
<tr>
<td><?php if(isset($i)) echo $i ?></td>
<td><?php if(isset($student_name)) echo $student_name ?></td>
<td>
<?php
$assignment_check_sql= "SELECT distinct *,`status` from student_assignment_upload where assignment_id=$aId and `email`='$student_email'";
if($assignment_check_exe=mysqli_query($con,$assignment_check_sql)){
  if(mysqli_num_rows($assignment_check_exe)>0){
$assignment_check_result=mysqli_fetch_assoc($assignment_check_exe);
echo $assignment_check_result['status'];
  }else{
    $status= "-";
    echo $status;
  }
   ?>
    
</td>
<td>
  <?php
if(!isset($status)){
  $uploadDate=$assignment_check_result['created_date'];
  $formatUploadDate=date("M d",strtotime($uploadDate));
  echo $formatUploadDate;
}else{
  echo $status;
}
  ?>
</td>
<td>
<?php if(!isset($status)){
  $downloadAssignmentSql="SELECT * FROM student_assignment_upload where email='$student_email' and assignment_id=$aId";
  if($downloadAssignmentExe=mysqli_query($con,$downloadAssignmentSql)){
    while($downloadAssignmentResult=mysqli_fetch_assoc($downloadAssignmentExe)){?>
      <a href="../../<?php if(isset($downloadAssignmentResult['file_path'])) echo $downloadAssignmentResult['file_path'] ?>" download="<?php if(isset($downloadAssignmentResult['file_name'])) echo $name."_".$downloadAssignmentResult['file_name'] ?>">download</a><br>
      <?php
     } }
  }else{
     echo $status;
  }
  ?>
</td>
<td>
  <?php if(!isset($status)){
  echo "<a href='../php/assignmentCheck/assignmentApproved.php?student_email=".$student_email."&assignmentId=".$aId."'>approve</a> <a href='../php/assignmentCheck/assignmentReject.php?student_email=".$student_email."&assignmentId=".$aId."'>reject</a>";
  }else{
     echo $status;
  }
  ?>
</td>
</tr>
<?php 

  }
      $i++;
}}}}
?>
</table>