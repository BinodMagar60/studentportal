<select name="<?php if(isset($class[$i],$section[$j])) echo $class[$i]."_".$section[$j] ?>" id="">
  <option value="-" selected>-</option>
<?php
$teacherSelectSql= "SELECT * FROM teacher_table order by name asc";
if($teacherSelectExe=mysqli_query($con,$teacherSelectSql)){
  if(mysqli_num_rows($teacherSelectExe)>0){
    while($teacherSelectResult=mysqli_fetch_assoc($teacherSelectExe)){
?>
<option value="<?php if(isset($teacherSelectResult['email'])) echo $teacherSelectResult['email']?>"><?php if(isset($teacherSelectResult['name'])) echo $teacherSelectResult['name']?></option>
      <?php
    }
  }
}
?>
</select>