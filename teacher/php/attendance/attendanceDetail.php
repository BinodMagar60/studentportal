





<?php
require_once "../../../php/config/db.php";
$class = isset($_GET['class']) ? $_GET['class'] : 'one';
$section = isset($_GET['section']) ? $_GET['section'] : 'A';
                    $sql = "SELECT * FROM student_table WHERE class='$class' AND section='$section' ORDER BY name ASC";

if ($exesql = mysqli_query($con, $sql)) {
    if (mysqli_num_rows($exesql) > 0) {
        $i = 0;
        ?>
        <form >
                <div class="today-attendance"><span><input type="checkbox" id="today-atten"></span><label for="today-atten">Todays Attendance</label> </div>

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
                        <td><?php if(isset($i)) echo $i;?></td>
                        <td><?php if(isset($searchResult['name'])) echo $searchResult['name'];?></td>
                        <td><?php if(isset($searchResult['email'])) echo$searchResult['email'];?></td>
                        <td><input type="checkbox"></td>
                    </tr>
                   <?php
            }
        ?>
        <tr>
            <td colspan="4" style="border: none; background-color:white;">
                <div class="attendance-btn-div">
                    <button type="button" class="attendanceSubmit">Submit</button>
                </div>
            </td>
        </tr>
    </table>
    
</form>
        
        
        <?php
        }
        else{
            echo "<div style='text-align: center; font-size: 1.125rem; margin-top: 20px'>No data found</div>";
        }

              }


?>
