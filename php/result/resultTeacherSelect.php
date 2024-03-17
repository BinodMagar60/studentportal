<select name="<?php if(isset($class[$i],$section[$j])) echo $class[$i]."_".$section[$j] ?>" id="">
  <option value="-" selected>-</option>
<?php
$checkTeacherSql="SELECT * from result_teacher_assigned where exam_title='$resultTitleName' and `class`='$class[$i]' and section='$section[$j]'";
if($checkTeacherExe=mysqli_query($con,$checkTeacherSql)){
  $checkTeacherResult=mysqli_fetch_assoc($checkTeacherExe);
}
$teacherSelectSql= "SELECT * FROM teacher_table order by name asc";
if($teacherSelectExe=mysqli_query($con,$teacherSelectSql)){
  if(mysqli_num_rows($teacherSelectExe)>0){
    while($teacherSelectResult=mysqli_fetch_assoc($teacherSelectExe)){
?>
<option value="<?php if(isset($teacherSelectResult['email'])) echo $teacherSelectResult['email']?>" <?php if(isset($checkTeacherResult['assigned_teacher'],$teacherSelectResult['email'])){
  if($checkTeacherResult['assigned_teacher']==$teacherSelectResult['email']){
    echo "selected";
  }else{
    echo "";
  }
}?>><?php if(isset($teacherSelectResult['name'])) echo $teacherSelectResult['name']?></option>
      <?php
    }
  }
}
?>
</select>