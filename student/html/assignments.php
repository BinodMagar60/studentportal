<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/studentCheck.php";
if (isset($_SESSION['userClass'], $_SESSION['userSection'])) {
    require_once "../../php/config/db.php";
    $class = $_SESSION['userClass'];
    $section = $_SESSION['userSection'];
    $subject = isset($_GET['subject']) ? $_GET['subject'] : 'English';
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>notes</title>
        <link rel="stylesheet" href="../css/assignments.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    </head>

    <body>



        <div class="notes-container">

            <div class="overlays" id="overlays"></div>

            <fieldset>
                <legend>Notes</legend>
                <form id="uploadAssignments" enctype="multipart/form-data">
                    <table id='assignmentTable' class="assignmentTable">
                        <tr>
                            <td>Subject</td>
                            <td>
                                <select name="subject_n" id="Subject-select" onchange="assignmentstableData();">
                                    <option value="English" <?php echo ($subject == 'English' ? 'selected' : ''); ?>>English</option>
                                    <option value="Nepali" <?php echo ($subject == 'Nepali' ? 'selected' : ''); ?>>Nepali</option>
                                    <option value="Maths" <?php echo ($subject == 'Maths' ? 'selected' : ''); ?>>Maths</option>
                                    <option value="Science" <?php echo ($subject == 'Science' ? 'selected' : ''); ?>>Science</option>
                                    <option value="Social" <?php echo ($subject == 'Social' ? 'selected' : ''); ?>>Social</option>
                                    <option value="Computer" <?php echo ($subject == 'Computer' ? 'selected' : ''); ?>>Computer</option>
                                    <option value="Account" <?php echo ($subject == 'Account' ? 'selected' : ''); ?>>Account</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </form>
                <div class="titles-notes">Available Assignments</div>
                <div class="show-assignments" id="show-assignments">

                </div>
            </fieldset>
        </div>



        <div class="assignment-details" id="assignment-details">

        </div>

        <div class="assignment-student-upload" id="assignment-student-upload">

        </div>


        <script src="../js/assignment.js"></script>
    </body>

    </html>
<?php
} else {
    echo "not set";
}
?>