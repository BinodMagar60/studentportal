<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/teacherCheck.php";
if (isset($_SESSION['userEmail'])) {
    $userEmail = $_SESSION['userEmail'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Result</title>
        <link rel="stylesheet" href="../css/result.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    </head>

    <body>

        <div class="overlay2" id="overlay2"></div>
        <div class="Result-container">
            <fieldset>
                <legend>Result</legend>



                <?php
                require_once "../../php/config/db.php";
                $check_teacher_sql = "SELECT * FROM result_teacher_assigned where assigned_teacher='$userEmail' order by `status` asc";
                if ($check_teacher_exe = mysqli_query($con, $check_teacher_sql)) {
                    if (mysqli_num_rows($check_teacher_exe) > 0) {
                ?>
                        <table class="result-teacher-table" id="result-teacher-table">
                            <tr>
                                <td>S.N.</td>
                                <td>Title</td>
                                <td>Class</td>
                                <td>Section</td>
                                <td>Status</td>
                            </tr>
                            <?php
                            $i = 1;
                            while ($check_teacher_result = mysqli_fetch_assoc($check_teacher_exe)) {
                            ?>
                                <tr>
                                    <td><?php if (isset($i)) echo $i ?></td>
                                    <td onclick="resultStudentListPoupup(<?php echo $check_teacher_result['id'] ?>)"><?php if (isset($check_teacher_result['exam_title'])) echo $check_teacher_result['exam_title'] ?></td>
                                    <td><?php if (isset($check_teacher_result['class'])) echo $check_teacher_result['class'] ?></td>
                                    <td><?php if (isset($check_teacher_result['section'])) echo $check_teacher_result['section'] ?></td>
                                    <td><?php
                                        $class = $check_teacher_result['class'];
                                        $section = $check_teacher_result['section'];
                                        $checkTeacherSql = "SELECT * from result_teacher_assigned where `class`='$class' and section='$section'";
                                        if ($checkTeacherExe = mysqli_query($con, $checkTeacherSql)) {
                                            if (mysqli_num_rows($checkTeacherExe) > 0) {
                                                $checkTeacherResult = mysqli_fetch_assoc($checkTeacherExe);
                                                echo $checkTeacherResult['status'];
                                            } else {
                                                echo "-";
                                            }
                                        } ?></td>
                                </tr>
                    <?php
                                $i++;
                            }
                        } else {
                            echo "<p style='width: 100%; text-align: center; font-weight: 400; font-size: 22px;'>Not Available at the moment</p>";
                        }
                    }

                    ?>
                        </table>



            </fieldset>
        </div>


        <div class="container-resultInsert" id="container-resultInsert">

        </div>




        <script src="../js/result.js"></script>
    </body>

    </html>


<?php
}
?>