<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/teacherCheck.php";
require_once "../../php/config/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>
    <link rel="stylesheet" href="../css/assignments.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="overlay" id="overlay"></div>
    <div class="assignment-container">
        <fieldset>
            <legend>Assignments Add</legend>
            <form id="assignment-form">
                <table id="assignment-table">
                    <tr>
                        <td>Submission Date</td>
                        <td><input id="exp" type="date" name="a_date" style="border: 1px solid black; outline: none; padding: 5px"></td>
                        <td class="error1 error">

                        </td>

                    </tr>

                    <tr>
                        <td>Title</td>
                        <td><input id="title" type="text" name="a_title" style="border: 1px solid black; outline: none; padding: 5px"></td>
                        <td>
                            <div class="error2 error"></div>
                        </td>
                        </td>
                    </tr>

                    <tr>
                        <td>Description</td>
                        <td><textarea id="description" name="a_description" name="a_description" id="" rows="5" style="border: 1px solid black; outline: none; padding: 5px"></textarea></td>
                        <td>
                            <div class="error3 error"></div>
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <td>Select Class</td>
                        <td>
                            <select name="a_user_class" id="selectClassAssignment">
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
                        <td></td>
                        <td>
                            <select name="a_user_section" id="selectSectionAssignment">
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
                            <select name="a_user_subject" id="selectSubjectAssignment">
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
                    <tr>
                        <td></td>
                        <td>
                            <div class="assignment-btn-submit"><button type="button" class="assignment-btn" onclick="assignmentValidation();">Submit</button></div>
                        </td>
                        <td></td>

                    </tr>
                </table>
            </form>


            <div class="assignment-list-show-container" id="assignment-list-show-container"></div>


        </fieldset>
    </div>


    <div class="popup-assignment-submit" id="popup-assignment-submit">
        <div class="title-logo"><i class="ri-checkbox-circle-line"></i></div>
        <div class="title">Assignment Added Successfully</div>
    </div>

    <div class="popup-assignment-update-successfully" id="popup-assignment-update-successfully">
        <div class="title-logo"><i class="ri-checkbox-circle-line"></i></div>
        <div class="title">Assignment updated successfully</div>
    </div>


    <div class="popup-assignment-delete-successfully" id="popup-assignment-delete-successfully">
        <div class="title-logo"><i class="ri-checkbox-circle-line"></i></div>
        <div class="title">Assignment deleted successfully</div>
    </div>


    <div class="update-assignment" id="update-assignment">

    </div>




    <script src="../js/assignments.js"></script>
</body>

</html>