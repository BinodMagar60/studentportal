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
                     <button type="button" style="background-color: red;" onclick="deleteEvent(<?php echo $result_notice['id'];?>);">Delete</button>


                     
           

                    </td>
                      </tr>
                    <?php
                  }
                  }else{
                    echo "No events added";
                  }
                  ?>
                    </table>