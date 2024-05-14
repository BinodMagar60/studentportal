<?php
require_once "../php/config/sessionStart.php";
require_once "../php/loginCheck/adminCheck.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="stylesheet" href="../css/admin-events.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="overlay" id="overlay"></div>
    <div class="noticeadd">
        <form id="eventForm" enctype="multipart/form-data" novalidate autocomplete="off">
            <fieldset>
                <legend>Events</legend>

                <table id="tablebox">
                    <tr>
                        <td colspan="3" class="title title1" style="width: 200px">Add Event</td>
                    </tr>
                    <tr>
                        <td>Event Title:</td>
                        <td><input type="text" name="notice" id="notice"></td>
                        <td class="error e-name" id="error1">*Required</td>
                    </tr>
                    <tr>
                        <td>Date:</td>
                        <td><input type="date" name="n_date" id="n_date"></td>
                        <td class="error e-date" id="error2">*Required</td>
                    </tr>



                </table>
                <button type="submit" class="submit-btn" onclick="submitEvents(event);">submit</button>
                <div class="title title1 title21">Event List</div>
                <div class="eventlist" id="eventlist">

                </div>
            </fieldset>
        </form>

    </div>
    <div class="successfull-updated" id="successfull-updated">
        <div class="logo-update"><i class="fa-regular fa-circle-check" style="color: #00ff40;"></i></div>
        <div class="successfullyUpdated">Successfully Added</div>
    </div>

    <div class="successfull-deleted" id="successfull-deleted">
        <div class="logo-update"><i class="fa-regular fa-circle-check" style="color: #ff0000;"></i></div>
        <div class="successfullyDeleted">Successfully Deleted</div>
    </div>

    <div class="successfull-updated-update" id="successfull-updated-update">
        <div class="logo-update"><i class="fa-regular fa-circle-check" style="color: #00ff40;"></i></div>
        <div class="successfullyUpdated"> Successfully Updated</div>
    </div>




    <div class="updatepopup-change" id="updatepopup-change">

    </div>


    


    </div>
    <script src="../js/admin-updateevents.js">

    </script>
    <script>
        eventLists();
    </script>
</body>

</html>