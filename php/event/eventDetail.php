                  <?php 
                  require_once "../config/db.php";
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
                     <button type="button" style="background-color: green;" onclick="updateEventsPopup(<?php echo $result_notice['id'];?>)">Update</button>
                     <button type="button" style="background-color: red;" onclick="deleteEvents();">Delete</button>


                     
                     
                <div class="deleteevent" id="deleteevent">
                    <div>
                        <div class="deletelogo"><i class="fa-regular fa-circle-question" style="color: #ff0000;"></i></div>
                        <div class="confirmation">Are you sure you want to delete it?</div>
                        <div class="btn-delete-event">
                           <button style="background-color: red; padding: 10px 30px" type="button" onclick="deleteEvent(<?php echo $result_notice['id'];?>);">Yes</button></a>
                            <button type="button" style="background-color: gray; padding: 10px 30px" onclick="deleteCancel();">No</button>
                        </div>
                    </div>
                </div>
<!--
                <div class="updatepopup" id="updatepopup">
                    <div>
                    <table>
                       <tr>
                        <td style="background-color: white;"><label for="title">Event Title:</label></td>
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
                </div> -->
                    </td>
                      </tr>
                    <?php
                  }
                  }else{
                    echo "No events added";
                  }
                  ?>
                    </table>