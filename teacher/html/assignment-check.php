<?php
require_once "../../php/config/db.php";
require_once "../php/assignment/expiry_assignment.php";
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

    <div class="assignment-container">
        <fieldset>
            <legend>Assignments Check</legend>

            <div class="select-classes">
                <table class="assignment-check-table">
                    <tr>
                        <td>Class</td>
                        <td><select name="" id="selectClass_assignment">
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
                            <select name="" id="selectSection_assignment">
                                <option value="A">Section A</option>
                                <option value="B">Section B</option>
                                <option value="C">Section C</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Subject</td>
                        <td>
                            <select name="" id="selectSubject">
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



        </fieldset>
    </div>






</body>

</html>