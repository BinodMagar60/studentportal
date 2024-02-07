<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="classroutine">
        <table border="1">
            <tr>
                <td rowspan="2">Date/Subject</td>
                <td>1st Period</td>
                <td>2nd Period</td>
                <td>3rd Period</td>
                <td>4th Period</td>
                <td rowspan="8">Break</td>
                <td>5th Period</td>
                <td>6th Period</td>
                <td>7th Period</td>
            </tr>
            <tr>
            <form action="../php/classRoutine/updateClassRoutine.php" method="post">
<?php 
require_once "../php/config/db.php";
$class= "One";
$section= "A";
$routine_subject_Sql= "select * from class_routine_subject where class='$class' and section='$section'";
if($routine_subject_exe=mysqli_query($con,$routine_subject_Sql)){
  if(mysqli_num_rows($routine_subject_exe)>0){
$routine_subject_row=mysqli_fetch_assoc($routine_subject_exe)
      ?>
                <td><input type="text" name="s_name_1" value="<?php if(isset($routine_subject_row['name_1'])) echo $routine_subject_row['name_1']; ?>"></td>
                <td><input type="text" name="s_name_2" value="<?php if(isset($routine_subject_row['name_2'])) echo $routine_subject_row['name_2']; ?>"></td>
                <td><input type="text" name="s_name_3" value="<?php if(isset($routine_subject_row['name_3'])) echo $routine_subject_row['name_3']; ?>"></td>
                <td><input type="text" name="s_name_4" value="<?php if(isset($routine_subject_row['name_4'])) echo $routine_subject_row['name_4']; ?>"></td>
                <td><input type="text" name="s_name_5" value="<?php if(isset($routine_subject_row['name_5'])) echo $routine_subject_row['name_5']; ?>"></td>
                <td><input type="text" name="s_name_6" value="<?php if(isset($routine_subject_row['name_6'])) echo $routine_subject_row['name_6']; ?>"></td>
                <td><input type="text" name="s_name_7" value="<?php if(isset($routine_subject_row['name_7'])) echo $routine_subject_row['name_7']; ?>"></td>

                <?php
  }
}?>
</tr>
<?php
$routineSql= "select * from class_routine where class='$class'and section='$section'";
if($routineExe=mysqli_query($con,$routineSql)){
  if(mysqli_num_rows($routineExe)>0){
    $i=0;
    while($routineRow=mysqli_fetch_assoc($routineExe)){
        $i+=1;
        ?>
            <tr>
                <td><?php if(isset($routineRow['routine_day'])) echo $routineRow['routine_day']; ?></td>
                <input type="hidden" name="s_day_<?php echo $i; ?>" value="<?php if(isset($routineRow['routine_day'])) echo $routineRow['routine_day']; ?>">
                <td><input type="text" name="first_<?php echo $i; ?>" value="<?php if(isset($routineRow['firstP'])) echo $routineRow['firstP']; ?>"></td>
                <td><input type="text" name="second_<?php echo $i; ?>" value="<?php if(isset($routineRow['secondP'])) echo $routineRow['secondP']; ?>"></td>
                <td><input type="text" name="third_<?php echo $i; ?>" value="<?php if(isset($routineRow['thirdP'])) echo $routineRow['thirdP']; ?>"></td>
                <td><input type="text" name="fourth_<?php echo $i; ?>" value="<?php if(isset($routineRow['fourthP'])) echo $routineRow['fourthP']; ?>"></td>
                <td><input type="text" name="fifth_<?php echo $i; ?>" value="<?php if(isset($routineRow['fifthP'])) echo $routineRow['fifthP']; ?>"></td>
                <td><input type="text" name="sixth_<?php echo $i; ?>" value="<?php if(isset($routineRow['sixthP'])) echo $routineRow['sixthP']; ?>"></td>
                <td><input type="text" name="seventh_<?php echo $i; ?>" value="<?php if(isset($routineRow['seventhP'])) echo $routineRow['seventhP']; ?>"></td>
            </tr>
            <?php
    }
  }
}

?>

        </table>
        <button type="submit">submit</button>
            </form>
    </div>



</body>
</html>