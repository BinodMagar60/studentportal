<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="stylesheet" href="../css/admin-events.css">
</head>
<body>
    <div class="noticeadd">
        <form action="../php/event/addEvent.php" method="post">
            <fieldset>
                <legend>Events</legend>
                <div class="popupbox">
                    <div class="popup" id="popup">
                        <div class="word">Event Added</div>
                    </div>
                </div>
                <table id="tablebox">
                    <tr>
                        <td colspan="3" class="title title1" style="width: 200px">Add Event</td>
                    </tr>
                    <tr>
                        <td>Event Name:</td>
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
                <div class="eventlist">
                  <?php 
                  require_once "../php/config/db.php";
                  $sql= "SELECT * FROM notice ORDER BY n_date ASC";
                  $exesql= mysqli_query($con,$sql);
                  if(mysqli_num_rows($exesql)!=0){
                    $i=0;
                    ?>
                    <table>
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
                    <td>
                      <a href="#">update</a> <a href="../php/event/deleteEvent.php?uid=<?php if(isset($result_notice)) echo $result_notice['id']?>">delete</a></td>
                      </tr>
                    <?php
                  }
                  }else{
                    echo "no data";
                  }
                  ?>
                      
                    </table>
                </div>
            </fieldset>
        </form>
       
    </div>
</body>
</html>