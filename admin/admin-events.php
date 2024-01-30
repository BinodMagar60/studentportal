
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="stylesheet" href="../css/admin-events.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                </fieldset>
        </form>
                <div class="title title1 title21">Event List</div>
                <div class="eventlist">
                  <?php 
                  require_once "../php/config/db.php";
                  $sql= "SELECT * FROM notice ORDER BY n_date ASC";
                  $exesql= mysqli_query($con,$sql);
                  if(mysqli_num_rows($exesql)!=0){
                    $i=0;
                    ?>
                    <table id="tableBox">
                    <tr>
                <td>S.N</td>
                <td>Notice</td>
                <td>Date</td>
                <td>Action</td>
                    </tr>
                    
                        <?php
                  while($result_notice=mysqli_fetch_assoc($exesql)){
                    $i+= 1;
                  $dbDate = $result_notice['n_date'];
                  $dateObject = date_create($dbDate);
                  $formattedDate = date_format($dateObject, 'M d');
                    ?>
                    <tr>
                    <td><?php if(isset($i)) echo $i;?></td>
                    <td><?php if(isset($result_notice['notice'])) echo $result_notice['notice'];?></td>
                    <td><?php if(isset($formattedDate)) echo $formattedDate;?></td>
                    <td id="btn-style">
                     <button type="button" style="background-color: green;" onclick="updateEvents();">Update</button>
                     <button type="button" style="background-color: red;" onclick="deleteEvent(<?php echo $result_notice['id']; ?>);">Delete</button>
                    </td>
                      </tr>
                    <?php
                  }
                  }else{
                    echo "no data";
                  }
                  ?>
                      
                    </table>
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


                <!-- <div class="deleteevent" id="deleteevent">
                    <div>
                        <div class="deletelogo"><i class="fa-regular fa-circle-question" style="color: #ff0000;"></i></div>
                        <div class="confirmation">Are you sure you want to delete it?</div>
                        <div class="btn-delete-event">
                           <button style="background-color: red;">Yes</button></a>
                            <button type="button" style="background-color: gray;" onclick="deleteCancel();">No</button>
                        </div>
                    </div>
                </div> -->


       
    </div>
    <script>
        function deleteEvent(eventId) {
            console.log(eventId);
    var confirmDelete = confirm("Are you sure you want to delete this event?");
    if (confirmDelete) {
        // Send AJAX request to the server to delete the event
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "../php/event/deleteEvent.php?uid=" + eventId, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle the response if needed
                // Reload the page or update the event list
            }
        };
        xhr.send();
    }
}
    </script>
    <!-- <script src="../js/admin-updateevents.js"></script> -->
</body>
</html>