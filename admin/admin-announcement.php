<?php
require_once "../php/config/sessionStart.php";
require_once "../php/loginCheck/adminCheck.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement</title>
    <link rel="stylesheet" href="../css/admin-announcement.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <div class="overlay" id="overlay"></div>
    <div class="announcementadd">
        <form id="announcementForm">
            <fieldset>
                <legend>Announcement</legend>
                <div class="title title1">Add Announcement</div>
                <table id="tablebox">


                    <tr>
                        <td>Expiration Date:</td>
                        <td><input type="date" name="a_date" id="a_date"></td>
                        <td class="error e-date" id="e-des">*Required</td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td><textarea name="a_description" id="a_description" cols="30" rows="3"></textarea></td>
                        <td class="error e-des" id="e-date">*Required</td>
                    </tr>
                    <tr>
                        <td>Send to:</td>
                        <td><select name="a_user_whom" id="To" onchange="selectWhom();">
                                <option value="everyone">Everyone</option>
                                <option value="teacher">Teacher</option>
                                <option value="student">Student</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><select name="a_user_class" id="Selectclass" onchange="selectWhich()">
                                <option value="allclass">All Classes</option>
                                <option value="One">One</option>
                                <option value="Two">Two</option>
                                <option value="Three">Three</option>
                                <option value="Four">Four</option>
                                <option value="Five">Five</option>
                                <option value="Six">Six</option>
                                <option value="Seven">Seven</option>
                                <option value="Eight">Eight</option>
                                <option value="Nine">Nine</option>
                                <option value="Ten">Ten</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <select name="a_user_section" id="Selectsection">
                                <option value="allsection">All Section</option>
                                <option value="A">Section A</option>
                                <option value="B">Section B</option>
                                <option value="C">Section C</option>
                            </select>
                        </td>
                    </tr>

                </table>
                <button type="button" class="submit-btn" onclick="announcementUpdateLists(event);">submit</button>

                <div class="title title1 title2">Announcement List</div>
                <div class="announcementlist" id="announcementlist"></div>
            </fieldset>
        </form>

        <div class="successfull-updated" id="successfull-updated">
            <div class="logo-update"><i class="fa-regular fa-circle-check" style="color: #00ff40;"></i></div>
            <div class="successfullyUpdated">Successfully Added</div>
        </div>

        <div class="successfull-deleted-announcement" id="successfull-deleted-announcement">
            <div class="logo-update"><i class="fa-regular fa-circle-check" style="color: #ff0000;"></i></div>
            <div class="successfullyDeleted">Successfully Deleted</div>
        </div>

        <div class="successfull-updated-update-announcement" id="successfull-updated-update-announcement">
            <div class="logo-update"><i class="fa-regular fa-circle-check" style="color: #00ff40;"></i></div>
            <div class="successfullyUpdated"> Successfully Updated</div>
        </div>


        <div class="updatepopup-change-announcement" id="updatepopup-change-announcement">

        </div>


    </div>
    <script src="../js/admin-announcement-click.js"></script>
    <script src="../js/admin-announcement.js"></script>
    <script>
        announcementLists();
    </script>

</body>

</html>