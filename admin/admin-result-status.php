<?php
require_once "../php/config/db.php";
$class = array("One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten");
$section = array("A", "B", "C");
$resultTitle = "SELECT distinct exam_title from result_teacher_assigned";
if ($resultTitleExe = mysqli_query($con, $resultTitle)) {
    if (mysqli_num_rows($resultTitleExe) > 0) {
        $resultTitleResult = mysqli_fetch_assoc($resultTitleExe);
        $resultTitleName = $resultTitleResult['exam_title'];
    }
}
?>








<form id="statusResultAdmin">


    <?php if (isset($resultTitleName)) { ?>
        <div class="assigned-list">
            <input type="hidden" name="examTitle" value="<?php if (isset($resultTitleName)) echo $resultTitleName ?>">
            <p>Status</p>
            <span>Exam Title: </span><span><?php if (isset($resultTitleName)) echo $resultTitleName ?></span>
            <table class="status-result" id="status-result">
                <tr>
                    <td>Class/Section</td>
                    <td>Section A</td>
                    <td>Section B</td>
                    <td>Section C</td>
                </tr>
                <?php
                $a = 0;
                for ($a; $a < 10; $a++) {
                ?>
                    <tr>
                        <td><?php if (isset($class[$a])) echo $class[$a] ?></td>
                        <?php
                        $b = 0;
                        for ($b; $b < 3; $b++) {
                            $checkTeacherSql = "SELECT * from result_teacher_assigned where `class`='$class[$a]' and section='$section[$b]'";
                            if ($checkTeacherExe = mysqli_query($con, $checkTeacherSql)) {
                        ?>
                                <td id="status-checker" onclick="showResultOfStudents('<?php echo $class[$a] ?>','<?php echo $section[$b] ?>','<?php echo $resultTitleName ?>','<?php echo $a . '' . $b; ?>');">
                                    <div id="tds<?php echo $a . '' . $b ?>">
                                        <?php
                                        if (mysqli_num_rows($checkTeacherExe) > 0) {
                                            $checkTeacherResult = mysqli_fetch_assoc($checkTeacherExe);
                                            echo $checkTeacherResult['status'];
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </div>

                                </td>
                        <?php }
                        } ?>
                    </tr>

                <?php } ?>
                <tr>
                    <td colspan="4" style="border: none;">
                        <div class="btn-statusResult">
                            <button onclick="submitPublishResult()" id="status-submitBtn-result" type="button" style="background-color: green;">Publish</button>
                            <button type="button" style="background-color: red;" onclick="deletePublishResult('<?php echo $resultTitleName ?>')">Delete</button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    <?php } ?>



</form>