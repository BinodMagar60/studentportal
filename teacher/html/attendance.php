<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/teacherCheck.php";
require_once "../../php/config/db.php";
$class = isset($_GET['classes']) ? $_GET['classes'] : 'one';
$section = isset($_GET['sections']) ? $_GET['sections'] : 'A';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link rel="stylesheet" href="../css/attendance.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <div class="attendance-container">
        <fieldset>
            <legend>Student Attendance</legend>


            <div class="attendance-select-class">
                <span class="class-attendance">
                    <label for="classAttendance">Class</label>
                    <select name="classAttendance" id="classAttendance" onchange="tableDataAttendance();">
                        <option value="one" <?php echo ($class == 'one' ? 'selected' : ''); ?>>One</option>
                        <option value="two" <?php echo ($class == 'two' ? 'selected' : ''); ?>>Two</option>
                        <option value="three" <?php echo ($class == 'three' ? 'selected' : ''); ?>>Three</option>
                        <option value="four" <?php echo ($class == 'four' ? 'selected' : ''); ?>>Four</option>
                        <option value="five" <?php echo ($class == 'five' ? 'selected' : ''); ?>>Five</option>
                        <option value="six" <?php echo ($class == 'six' ? 'selected' : ''); ?>>Six</option>
                        <option value="seven" <?php echo ($class == 'seven' ? 'selected' : ''); ?>>Seven</option>
                        <option value="eight" <?php echo ($class == 'eight' ? 'selected' : ''); ?>>Eight</option>
                        <option value="nine" <?php echo ($class == 'nine' ? 'selected' : ''); ?>>Nine</option>
                        <option value="ten" <?php echo ($class == 'ten' ? 'selected' : ''); ?>>Ten</option>
                    </select>
                </span>
                <span class="section-attendance">
                    <label for="sectionAttendance">Section</label>
                    <select name="sectionAttendance" id="sectionAttendance" onchange="tableDataAttendance()">
                        <option value="A" <?php echo ($section == 'A' ? 'selected' : ''); ?>>Section A</option>
                        <option value="B" <?php echo ($section == 'B' ? 'selected' : ''); ?>>Section B</option>
                        <option value="C" <?php echo ($section == 'C' ? 'selected' : ''); ?>>Section C</option>
                    </select>
                </span>
            </div>



            <div class="attendance-list-container" id="attendance-list-container"></div>





        </fieldset>
    </div>
    <script src="../js/attendance.js"></script>
</body>

</html>