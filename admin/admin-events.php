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
        <form action="../php/event/addEvent.php" method="post">
            <fieldset>
                <legend>Events</legend>
                
                <table id="tablebox">
                    <tr>
                        <td colspan="3" class="title title1" style="width: 200px">Add Event</td>
                    </tr>
                    <tr>
                        <td>Event Title:</td>
                        <td><input type="text" name="notice"></td>
                        <td class="error e-name"></td>
                    </tr>
                    <tr>
                        <td>Date:</td>
                        <td><input type="date" name="n_date"></td>
                        <td class="error e-date"></td>
                    </tr>
                    
                    

                </table>
                <button type="submit" class="submit-btn">submit</button>
                
                <div class="title title1 title21">Event List</div>
                <div class="eventlist" id="eventlist">
                  
                </div>


                <div class="updatepopup" id="updatepopup">
                    <div>
                    <table>
                       <tr>
                        <td><label for="title">Event Title:</label></td>
                       </tr>
                       <tr>
                        <td><input type="text" id="title"></td>
                       </tr>
                       <tr>
                        <td><label for="date">Date</label></td>
                       </tr>
                       <tr>
                        <td><input type="date" id="date"></td>
                       </tr>
                       
                    </table>
                    <div class="btn-updates-event">
                        <a ><button style="background-color: green" type="button">Update</button></a>
                        <a ><button style="background-color: red" type="button" onclick="updateCancel()">Cancel</button></a>
                    </div>
                    </div>
                </div>


                <div class="deleteevent" id="deleteevent">
                    <div>
                        <div class="deletelogo"><i class="fa-regular fa-circle-question" style="color: #ff0000;"></i></div>
                        <div class="confirmation">Are you sure you want to delete it?</div>
                        <div class="btn-delete-event">
                            <a href="../php/event/deleteEvent.php?uid=<?php if(isset($result_notice)) echo $result_notice['id']?>"><button style="background-color: red;">Yes</button></a>
                            <button type="button" style="background-color: gray;" onclick="deleteCancel();">No</button>
                        </div>
                    </div>
                </div>

            </fieldset>
        </form>
       
    </div>
    <script src="../js/admin-updateevents.js"></script>
    <script>
        eventLists();
    </script>
</body>
</html>