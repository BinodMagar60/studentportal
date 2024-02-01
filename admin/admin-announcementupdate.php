<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement update</title>
    <link rel="stylesheet" href="../css/admin-announcementupdate-style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="updatepopup-announcement" id="updatepopup-announcement">
        <div>
            <table>
                <tr>
                    <td>Expiration Date:</td>
                </tr>
                <tr >
                    <td><input type="date" style="margin-bottom: 25px;"></td>
                </tr>
                <tr >
                    <td>Description:</td>
                </tr>
                <tr>
                    <td><textarea name="" id="autoresizing2" cols="5" rows="10" style="margin-bottom: 25px;"></textarea></td>
                </tr>
                <tr>
                    <td>Send To:</td>
                </tr>
                <tr>
                    <td>
                        <select name="" id="">
                            <option value="everyone">Everyone</option>
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="" id="">
                            <option value="-">-</option>
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
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="" id="">
                            <option value="-">-</option>
                            <option value="allsection">All Section</option>
                                <option value="A">Section A</option>
                                <option value="B">Section B</option>
                                <option value="C">Section C</option>
                        </select>
                    </td>
                </tr>
            </table>
            <div class="btn-announcementupdate">
                <button class="update-announcement" id="update-announcement" style="background-color: green">Update</button>
                <button class="cancel-announcement" id="cancel-announcement" style="background-color: gray" type="button" onclick="updateAnnouncementPopupCancel();">Cancel</button>
            </div>
        </div>
    </div>
    


    <script src="../js/admin-announcement.js"></script>
</body>
</html>