<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/teacherCheck.php";
require_once "../../php/config/db.php";
$class = isset($_GET['class']) ? $_GET['class'] : 'one';
$section = isset($_GET['section']) ? $_GET['section'] : 'everyone';
$subject = isset($_GET['subject']) ? $_GET['subject'] : 'English';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>
    <link rel="stylesheet" href="../css/assignment-check.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>


    <div class="overlay1" id="overlay1"></div>

    <div class="assignment-container">
        <fieldset>
            <legend>Assignments Check</legend>

            <div class="select-classes">
                <table class="assignment-check-table">
                    <tr>
                        <td>Class</td>
                        <td><select name="ac_class" id="selectClass_assignment" onchange="assignmentCheckData()">
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
                        </td>
                    </tr>
                    <tr>
                        <td>Section</td>
                        <td>
                            <select name="ac_section" id="selectSection_assignment" onchange="assignmentCheckData()">
                                <option value="A" <?php echo ($section == 'A' ? 'selected' : ''); ?>>A</option>
                                <option value="B" <?php echo ($section == 'B' ? 'selected' : ''); ?>>B</option>
                                <option value="C" <?php echo ($section == 'C' ? 'selected' : ''); ?>>C</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Subject</td>
                        <td>
                            <select name="ac_subject" id="selectSubject" onchange="assignmentCheckData()">
                                <option value="English">English</option>
                                <option value="Nepali">Nepali</option>
                                <option value="Maths">Maths</option>
                                <option value="Science">Science</option>
                                <option value="Social">Social</option>
                                <option value="Computer">Computer</option>
                                <option value="Account">Account</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="title-assignment-check">Assignment Lists</div>

            <div class="assignment-check-container" id="assignment-check-container">

            </div>

        </fieldset>
    </div>


    <div class="checkAssignmentsOfUsers" id="checkAssignmentsOfUsers">

    </div>




    <script src="../js/assignment-check.js"></script>

</body>

</html>