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
        <link rel="stylesheet" href="../css/notes.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    </head>

    <body>
        <div class="notes-container">
            <fieldset>
                <legend>Notes</legend>
                <form id="uploadNotes" enctype="multipart/form-data">
                    <table id='noteTable' class="noteTable">
                        <tr>
                            <td>Subject</td>
                            <td>
                                <select name="subject_n" id="Subject-select" onchange="notetableData()">
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
                <div class="titles-notes">Available Notes</div>
                <div class="show-notes" id="show-notes">
                </div>
            </fieldset>
        </div>


        <script src="../js/notes.js"></script>
    </body>

    </html>


<?php
} else {
    echo "not set";
}
?>