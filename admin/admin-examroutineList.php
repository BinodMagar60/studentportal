<?php
    require_once "../php/config/sessionStart.php";
    require_once "../php/loginCheck/adminCheck.php";
?>
<div class="examroutineLists" style="user-select: none;">
    <div class="examroutineLists-title">Exam Routine Lists</div>
    <div class="examroutine-sections">
        <?php
        require_once "../php/config/db.php";
        $examDateSql = "SELECT * FROM exam_routine_date where not `exam_title`='ExamSampleId'";
        $examDateExe = mysqli_query($con, $examDateSql);
        if (mysqli_num_rows($examDateExe) > 0) {
            $i = 1;
            while ($examDateRow = mysqli_fetch_assoc($examDateExe)) {
                $date = strtotime($examDateRow['created_date']);
                $createdDate = date('F j, Y', $date);
                $examId = $examDateRow['id'];
        ?>
                <div class="primary-box" id="ListBox1" onclick="examroutineClick();">
                    <div class="title"><?php if (isset($examDateRow['exam_title'])) echo $examDateRow['exam_title'] ?></div>
                    <div class="published-date"><?php if (isset($createdDate)) echo $createdDate ?></div>
                    <div class="dropdown-logo"><i class="ri-arrow-down-s-fill" id="arrow-down"></i></div>
                </div>

                <div class="secondary-box" id="ShowListsBox1">
                    <table id="table-showExamRoutineList">
                        <tr>
                            <td>Date/Class</td>
                            <td><?php if (isset($examDateRow['date_1'])) echo $examDateRow['date_1'] ?></td>
                            <td><?php if (isset($examDateRow['date_2'])) echo $examDateRow['date_2'] ?></td>
                            <td><?php if (isset($examDateRow['date_3'])) echo $examDateRow['date_3'] ?></td>
                            <td><?php if (isset($examDateRow['date_4'])) echo $examDateRow['date_4'] ?></td>
                            <td><?php if (isset($examDateRow['date_5'])) echo $examDateRow['date_5'] ?></td>
                            <td><?php if (isset($examDateRow['date_6'])) echo $examDateRow['date_6'] ?></td>
                            <td><?php if (isset($examDateRow['date_7'])) echo $examDateRow['date_7'] ?></td>
                        </tr>
                        <?php
                        $examSubjectSql = "SELECT * FROM exam_routine_subject where `exam_id`=$examId";
                        $examSubjectExe = mysqli_query($con, $examSubjectSql);
                        if (mysqli_num_rows($examSubjectExe) > 0) {
                            while ($examSubjectRow = mysqli_fetch_assoc($examSubjectExe)) {
                        ?>
                                <tr>
                                    <td><?php if (isset($examSubjectRow['class'])) echo $examSubjectRow['class']; ?></td>
                                    <td><?php if (isset($examSubjectRow['e_subject_1'])) echo $examSubjectRow['e_subject_1']; ?></td>
                                    <td><?php if (isset($examSubjectRow['e_subject_2'])) echo $examSubjectRow['e_subject_2']; ?></td>
                                    <td><?php if (isset($examSubjectRow['e_subject_3'])) echo $examSubjectRow['e_subject_3']; ?></td>
                                    <td><?php if (isset($examSubjectRow['e_subject_4'])) echo $examSubjectRow['e_subject_4']; ?></td>
                                    <td><?php if (isset($examSubjectRow['e_subject_5'])) echo $examSubjectRow['e_subject_5']; ?></td>
                                    <td><?php if (isset($examSubjectRow['e_subject_6'])) echo $examSubjectRow['e_subject_6']; ?></td>
                                    <td><?php if (isset($examSubjectRow['e_subject_7'])) echo $examSubjectRow['e_subject_7']; ?></td>
                                </tr>
                        <?php
}}
        ?>
                <tr>
                    <td colspan="8" style="border: none; background-color:white;"><div class="btn-examroutineLists">
                        <a href="../php/examRoutine/posted.php?id=<?php echo $examId?>"><button type="button" style="background-color: green;">Post</button></a>
                        <a href="../php/examRoutine/unposted.php?id=<?php echo $examId?>"><button type="button" style="background-color: gray;">Unpost</button></a>
                        <a href="../php/examRoutine/deleteExamRoutine.php?id=<?php echo $examId?>"><button type="button" style="background-color: red;">Delete</button></a>
                    </div></td>
                </tr>
            </table>
        </div>
        <?php
                $i++;
            }
        }
        ?>
    </div>
</div>