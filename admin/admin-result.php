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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="../css/admin-result.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <div class="overlay55" id="overlay55"></div>
    <div class="Result-container">

        <fieldset>
            <legend>Result</legend>

            <div class="title-result">Assign Teachers</div>
            <form id="resultForm">
                <div class="input-assign-title" id="input-assign-title">
                    Title: <input type="text" name="exam_title" value="<?php if (isset($resultTitleName)) echo $resultTitleName ?>">
                </div>


                <div class="result-text-result-table">

                    <table class="assign-teacher" id="assign-teacher">
                        <tr>
                            <td>Class/Section</td>
                            <td>Section A</td>
                            <td>Section B</td>
                            <td>Section C</td>
                        </tr>
                        <?php
                        $i = 0;
                        for ($i; $i < 10; $i++) {
                        ?>
                            <tr>
                                <td><?php if (isset($class[$i])) echo $class[$i] ?></td>
                                <?php
                                $j = 0;
                                for ($j; $j < 3; $j++) {
                                ?>
                                    <td><?php include "../php/result/resultTeacherSelect.php"; ?></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="4" style="border: none">
                                <div class="assign-btn-result">
                                    <button type="button" onclick="submitResultForm()">Assign</button>
                                </div>
                            </td>
                        </tr>
                    </table>
            </form>
    </div>



    <div class="status-resultTeachers" id="status-resultTeachers">






    </div>





    </fieldset>

    </div>


    <div class="displayMarksInAdmin" id="displayMarksInAdmin">

    </div>


    <script src="../js/admin-result.js"></script>
</body>

</html>