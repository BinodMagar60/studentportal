 <?php 
                  require_once "../config/db.php";
                  require_once "expiry_announcement.php";
                  $sql= "SELECT * FROM announcements ORDER BY exp_date ASC";
                  $exesql= mysqli_query($con,$sql);
                  if(mysqli_num_rows($exesql)!=0){
                    $i=0;
                    ?>
                    <table class="table22">
                    <tr >
                <td>S.N</td>
                <td>Description</td>
                <td>To</td>
                <td>Class</td>
                <td>Section</td>
                <td>Exp.Date</td>
                <td>Action</td>
                    </tr>
                        <?php
                  while($result_notice=mysqli_fetch_assoc($exesql)){
                    $i+= 1;
                  $dbDate = $result_notice['exp_date'];
                  $dateObject = date_create($dbDate);
                  $formattedDate = date_format($dateObject, 'M d');
                    ?>
                    <tr>
                    <td><?php if(isset($i)) echo $i;?></td>
                    <td><span><?php if(isset($result_notice['a_description'])) echo $result_notice['a_description'];?></span></td>
                    <td><?php if(isset($result_notice['user_whom'])) echo $result_notice['user_whom'];?></td>
                    <td><?php if(isset($result_notice['user_class'])) echo $result_notice['user_class'];?></td>
                    <td><?php if(isset($result_notice['user_section'])) echo $result_notice['user_section'];?></td>
                    <td><?php if(isset($formattedDate)) echo $formattedDate;?></td>
                    <td id="btn-style-1">
                     <button type="button" style="background-color: green;" onclick="updateAnnouncementPopup(<?php echo $result_notice['id'];?>);">Update</button>
                     <button type="button" style="background-color: red;" onclick="deleteAnnouncement(<?php echo $result_notice['id'];?>);">Delete</button>


                     <div class="deleteannouncement" id="deleteannouncement">
                    <div>
                        <div class="deletelogo"><i class="fa-regular fa-circle-question" style="color: #ff0000;"></i></div>
                        <div class="confirmation">Are you sure you want to delete it?</div>
                        <div class="btn-delete-announcement">
                           <button style="background-color: red; padding: 10px 30px" type="button" onclick="deleteAnnouncement(<?php echo $result_notice['id'];?>);">Yes</button>
                            <button type="button" style="background-color: gray; padding: 10px 30px" onclick="deleteAnnouncementCancel();">No</button>
                        </div>
                    </div>
                </div>

                     
                    </td>
                  </tr>
                     <?php
                  }
                  }else{
                    echo "No Announcement Added";
                  }
?>  
                  
                    </table>
                    