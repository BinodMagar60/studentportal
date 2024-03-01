<div class="classroutine-container" id="classroutine-container">




<form id="classroutinedaily">
    <div class="classroutine">
        <table class="tableRoutine-class">
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

                <?php
                require_once "../config/db.php";
                $class = isset($_GET['class']) ? $_GET['class'] : 'One';
                $section = isset($_GET['section']) ? $_GET['section'] : 'A';

                $routineSql = "select * from class_routine";
                if ($routineExe = mysqli_query($con, $routineSql)) {
                    if (mysqli_num_rows($routineExe) > 0) {
                        $routineRow = mysqli_fetch_assoc($routineExe);
                    }
                }
                ?>
                <td><input type="text" name="firstP" value="<?php if (isset($routineRow['firstP'])) echo $routineRow['firstP']; ?>"></td>
                <td><input type="text" name="secondP" value="<?php if (isset($routineRow['secondP'])) echo $routineRow['secondP']; ?>"></td>
                <td><input type="text" name="thirdP" value="<?php if (isset($routineRow['thirdP'])) echo $routineRow['thirdP']; ?>"></td>
                <td><input type="text" name="fourthP" value="<?php if (isset($routineRow['fourthP'])) echo $routineRow['fourthP']; ?>"></td>
                <td><input type="text" name="fifthP" value="<?php if (isset($routineRow['fifthP'])) echo $routineRow['fifthP']; ?>"></td>
                <td><input type="text" name="sixthP" value="<?php if (isset($routineRow['sixthP'])) echo $routineRow['sixthP']; ?>"></td>
                <td><input type="text" name="seventhP" value="<?php if (isset($routineRow['seventhP'])) echo $routineRow['seventhP']; ?>"></td>
                <input type="hidden" name="class" value="<?php if(isset($class)) echo $class;?>">
                <input type="hidden" name="section" value="<?php if(isset($section)) echo $section;?>">

            </tr>
            <?php
            $routine_subject_Sql = "select * from class_routine_subject where class='$class' and section='$section'";
            if ($routine_subject_exe = mysqli_query($con, $routine_subject_Sql)) {
                if (mysqli_num_rows($routine_subject_exe) > 0) {
                    $i = 0;
                    while ($routine_subject_row = mysqli_fetch_assoc($routine_subject_exe)) {
                        $i += 1;
            ?>
                        <tr>
                            <td><?php if (isset($routine_subject_row['class_day'])) echo $routine_subject_row['class_day']; ?></td>
                            <input type="hidden" name="s_day_<?php echo $i; ?>" value="<?php if (isset($routine_subject_row['class_day'])) echo $routine_subject_row['class_day']; ?>">
                            <td><input type="text" name="s_name1_<?php echo $i; ?>" value="<?php if (isset($routine_subject_row['name_1'])) echo $routine_subject_row['name_1']; ?>"></td>
                            <td><input type="text" name="s_name2_<?php echo $i; ?>" value="<?php if (isset($routine_subject_row['name_2'])) echo $routine_subject_row['name_2']; ?>"></td>
                            <td><input type="text" name="s_name3_<?php echo $i; ?>" value="<?php if (isset($routine_subject_row['name_3'])) echo $routine_subject_row['name_3']; ?>"></td>
                            <td><input type="text" name="s_name4_<?php echo $i; ?>" value="<?php if (isset($routine_subject_row['name_4'])) echo $routine_subject_row['name_4']; ?>"></td>
                            <td><input type="text" name="s_name5_<?php echo $i; ?>" value="<?php if (isset($routine_subject_row['name_5'])) echo $routine_subject_row['name_5']; ?>"></td>
                            <td><input type="text" name="s_name6_<?php echo $i; ?>" value="<?php if (isset($routine_subject_row['name_6'])) echo $routine_subject_row['name_6']; ?>"></td>
                            <td><input type="text" name="s_name7_<?php echo $i; ?>" value="<?php if (isset($routine_subject_row['name_7'])) echo $routine_subject_row['name_7']; ?>"></td>
                        </tr>
            <?php
                    }
                }
            }
            ?>
            <tr>
                <td colspan="9" style="border: none;">
                    <div class="btn-examRoutine-submit"><button type="button" onclick="updateClassroutine(event);">submit</button></div>
                </td>
            </tr>


        </table>

    </div>
</form>
</div>