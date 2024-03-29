<?php
require_once "../../../php/config/db.php";
$class = isset($_GET['class']) ? $_GET['class'] : 'one';
$section = isset($_GET['section']) ? $_GET['section'] : 'A';
                    $sql = "SELECT * FROM student_table WHERE class='$class' AND section='$section' ORDER BY name ASC";
if ($exesql = mysqli_query($con, $sql)) {
    if (mysqli_num_rows($exesql) > 0) {
        $i = 0;
        ?>
        <form id="attendanceForm">

                <table id="attendanceTable">
                    <tr>
                        <td>S.N.</td>
                        <td>Name</td>
                        <td>E-mail</td>
                        <td>Attendance</td>
                    </tr>

        <?php

            while ($searchResult = mysqli_fetch_assoc($exesql)) {
                $i += 1;
        ?>
            
                    <tr>
                        <td><label for="attendanceNo<?php echo $i; ?>"><?php if(isset($i)) echo $i;?></label></td>
                        <td><label for="attendanceNo<?php echo $i; ?>"><?php if(isset($searchResult['name'])) echo $searchResult['name'];?></label></td>
                        <td><label for="attendanceNo<?php echo $i; ?>"><?php if(isset($searchResult['email'])) echo$searchResult['email'];?></label></td>
                        <!-- <input type="hidden" name="i<?php //if(isset($i)) echo $i;?>" value="<?php //if(isset($i)) echo $i;?>"> -->
                        <input type="hidden" name="s_id<?php if(isset($i)) echo $i;?>" value="<?php if(isset($searchResult['id'])) echo $searchResult['id'];?>">
                        <input type="hidden" name="s_name<?php if(isset($i)) echo $i;?>" value="<?php if(isset($searchResult['name'])) echo $searchResult['name'];?>">
                        <input type="hidden" name="s_email<?php if(isset($i)) echo $i;?>" value="<?php if(isset($searchResult['email'])) echo $searchResult['email'];?>">
                        <input type="hidden" name="s_class<?php if(isset($i)) echo $i;?>" value="<?php if(isset($searchResult['class'])) echo $searchResult['class'];?>">
                        <input type="hidden" name="s_section<?php if(isset($i)) echo $i;?>" value="<?php if(isset($searchResult['section'])) echo $searchResult['section'];?>">
                        <?php
                    $email=$searchResult['email'];
                    $class=$searchResult['class'];
                    $section=$searchResult['section'];
  $currentDate=date('Y-m-d');
$checkAttendance="SELECT * from attendance where email='$email' and class='$class' and section='$section' and date(attendance_date)='$currentDate'";
if($checkAttendanceExe=mysqli_query($con,$checkAttendance)){
$checkAttendanceResult=mysqli_fetch_assoc($checkAttendanceExe);
  }
                        ?>
                        
                        <td><input onchange="addAttendance()" type="checkbox" name="attendance<?php if(isset($i)) echo $i;?>" id="attendanceNo<?php echo $i; ?>" value="P" <?php if(isset($checkAttendanceResult['s_attendance'])){echo $checkAttendanceResult['s_attendance']=="P" ? "checked" : "";}else{echo "";} ?> style="margin-left: 50px"></td>
                        
                    </tr>
                    
                   <?php
            }
           ?> 
           <input type="hidden" name="numofData" value="<?php if(isset($i)) echo $i;?>">
        <!-- <tr>
            <td colspan="4" style="border: none; background-color:white;">
                <div class="attendance-btn-div">
                    <button type="button" onclick="addAttendance()" class="attendanceSubmit">Submit</button>
                </div>
            </td>
        </tr> -->
    </table>
</form>
        <?php
        }
        else{
            echo "<div style='text-align: center; font-size: 1.125rem; margin-top: 20px'>No data found</div>";
        }

              }


?>
