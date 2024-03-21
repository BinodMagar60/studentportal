<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/studentCheck.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/classroutine.css">
</head>

<body>
    <div class="classroutine-container">
        <fieldset>
            <legend>Class Routine</legend>
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
                        if (isset($_SESSION['userClass'], $_SESSION['userSection'])) {
                            require_once "../../php/config/db.php";
                            $class = $_SESSION['userClass'];
                            $section = $_SESSION['userSection'];

                            $routineSql = "select * from class_routine";
                            if ($routineExe = mysqli_query($con, $routineSql)) {
                                if (mysqli_num_rows($routineExe) > 0) {
                                    $routineRow = mysqli_fetch_assoc($routineExe);
                                }
                            }
                        ?>
                            <td style="text-align: center;"><?php if (isset($routineRow['firstP'])) echo $routineRow['firstP']; ?></td>
                            <td><?php if (isset($routineRow['secondP'])) echo $routineRow['secondP']; ?></td>
                            <td><?php if (isset($routineRow['thirdP'])) echo $routineRow['thirdP']; ?></td>
                            <td><?php if (isset($routineRow['fourthP'])) echo $routineRow['fourthP']; ?></td>
                            <td><?php if (isset($routineRow['fifthP'])) echo $routineRow['fifthP']; ?></td>
                            <td><?php if (isset($routineRow['sixthP'])) echo $routineRow['sixthP']; ?></td>
                            <td><?php if (isset($routineRow['seventhP'])) echo $routineRow['seventhP']; ?></td>
                            <input type="hidden" name="class" value="<?php if (isset($class)) echo $class; ?>">
                            <input type="hidden" name="section" value="<?php if (isset($section)) echo $section; ?>">

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
                                    <input disabled type="hidden" name="s_day_<?php echo $i; ?>" value="<?php if (isset($routine_subject_row['class_day'])) echo $routine_subject_row['class_day']; ?>">
                                    <td><input disabled type="text" name="s_name1_<?php echo $i; ?>" value="<?php if (isset($routine_subject_row['name_1'])) echo $routine_subject_row['name_1']; ?>"></td>
                                    <td><input disabled type="text" name="s_name2_<?php echo $i; ?>" value="<?php if (isset($routine_subject_row['name_2'])) echo $routine_subject_row['name_2']; ?>"></td>
                                    <td><input disabled type="text" name="s_name3_<?php echo $i; ?>" value="<?php if (isset($routine_subject_row['name_3'])) echo $routine_subject_row['name_3']; ?>"></td>
                                    <td><input disabled type="text" name="s_name4_<?php echo $i; ?>" value="<?php if (isset($routine_subject_row['name_4'])) echo $routine_subject_row['name_4']; ?>"></td>
                                    <td><input disabled type="text" name="s_name5_<?php echo $i; ?>" value="<?php if (isset($routine_subject_row['name_5'])) echo $routine_subject_row['name_5']; ?>"></td>
                                    <td><input disabled type="text" name="s_name6_<?php echo $i; ?>" value="<?php if (isset($routine_subject_row['name_6'])) echo $routine_subject_row['name_6']; ?>"></td>
                                    <td><input disabled type="text" name="s_name7_<?php echo $i; ?>" value="<?php if (isset($routine_subject_row['name_7'])) echo $routine_subject_row['name_7']; ?>"></td>
                                </tr>
                <?php
                                    }
                                }
                            }
                        }
                ?>
                </table>

            </div>


        </fieldset>
    </div>





    <script src="../js/classroutine.js></script>
</body>
</html>