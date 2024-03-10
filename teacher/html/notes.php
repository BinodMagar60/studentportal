<?php
require_once "../../php/config/sessionStart.php";
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
            <form id="uploadNotes"  enctype="multipart/form-data">
                <table id='noteTable' class="noteTable">
                    <tr>
                        <td>Class</td>
                        <td>
                            <select name="class_n" id="class-select">
                                <option value="one">One</option>
                                <option value="two">Two</option>
                                <option value="three">Three</option>
                                <option value="four">Four</option>
                                <option value="five">Five</option>
                                <option value="six">Six</option>
                                <option value="seven">Seven</option>
                                <option value="eight">Eight</option>
                                <option value="nine">Nine</option>
                                <option value="ten">Ten</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Section</td>
                        <td>
                            <select name="section_n" id="Section-select">
                                <option value="everyone">Everyone</option>
                                <option value="A">Section A</option>
                                <option value="B">Section B</option>
                                <option value="C">Section C</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Subject</td>
                        <td>
                            <select name="subject_n" id="Subject-select">
                                <option value="English">English</option>
                                <option value="Nepali">Nepali</option>
                                <option value="Maths">Maths</option>
                                <option value="Science">Science</option>
                                <option value="Social">Social</option>
                                <option value="Computer">Computer</option>
                                <option value="Accont">Account</option>
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