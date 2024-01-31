<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement</title>
    <link rel="stylesheet" href="../css/admin-announcement.css">
   
</head>
<body>
    <div class="announcementadd">
        <form action="../php/announcement/add_announcement.php" method="post">
            <fieldset>
                <legend>Announcement</legend>
                <div class="popupbox">
                    <div class="popup" id="popup">
                        <div class="word">Announcement Added</div>
                    </div>
                </div>
                <div class="title title1">Add Announcement</div>
                <table id="tablebox">
                    
                   
                    <tr>
                        <td>Date:</td>
                        <td><input type="date" name="a_date"></td>
                        <td class="error e-date"></td>
                    </tr>
                    <tr>
                        <td >Description:</td>
                        <td><textarea name="a_description" id="" cols="30" rows="3"></textarea></td>
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
                        <td><select name="a_user_class" id="Selectclass"  onchange="selectWhich()">
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
                <button type="submit" class="submit-btn">submit</button>
                
                <div class="title title1 title2">Announcement List</div>
                <div class="eventlist"></div>
            </fieldset>
        </form>
       
    </div>
    <script src="../js/admin-announcement-click.js"></script>

</body>
</html>