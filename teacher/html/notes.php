<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/teacherCheck.php";
$class = isset($_GET['class']) ? $_GET['class'] : 'one';
$section = isset($_GET['section']) ? $_GET['section'] : 'everyone';
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
                        <td>Class</td>
                        <td>
                            <select name="class_n" id="class-select" onchange="notetableData();">
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
                            <select name="section_n" id="Section-select" onchange="notetableData()">
                                <option value="everyone" <?php echo ($section == 'everyone' ? 'selected' : ''); ?>>Everyone</option>
                                <option value="A" <?php echo ($section == 'A' ? 'selected' : ''); ?>>A</option>
                                <option value="B" <?php echo ($section == 'B' ? 'selected' : ''); ?>>B</option>
                                <option value="C" <?php echo ($section == 'C' ? 'selected' : ''); ?>>C</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Subject</td>
                        <td>
                            <select name="subject_n" id="Subject-select" onchange="notetableData()">
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

                <div class="titles-notes">Add notes</div>

                <div class="file-uploads">
                    <input type="file" name="note[]" id="file-input" multiple accept="image/*,application/pdf,.xml,.doc,.docx,.txt,.xlsx,.pptx,.ppt" onchange="uploadFiles();" />
                    <label for="file-input">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                        &nbsp; Choose Files To Upload
                    </label>
                    <div id="num-of-files">No Files Choosen</div>
                    <ul id="files-list"></ul>
                    <div class="submit-btn" id="submit-btn">
                        <button type="button" onclick="submitUploads();">Submit</button>
                    </div>
                </div>
            </form>
            <div class="titles-notes">Uploaded Notes</div>
            <div class="show-notes" id="show-notes">

            </div>
        </fieldset>
    </div>

    <script src="../js/notes.js"></script>
</body>

</html>