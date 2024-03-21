<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/studentCheck.php";
?>
<div class="assignment-details-container">
    <div class="top">
        <div></div>
        <div class="top-title">Details</div>
        <div><button class="close-btn-assignment" onclick="assignmentDetailsHide()"><i class="ri-close-circle-line"></i></button></div>
    </div>
    <?php
    if (isset($_GET['id'])) {
        $uid = $_GET['id'];
        // $uid=25;
        require_once "../../php/config/db.php";
        $assignmentSql = "SELECT * From assignments where id=$uid";
        if ($assignmentExe = mysqli_query($con, $assignmentSql)) {
            if (mysqli_num_rows($assignmentExe) > 0) {
                while ($assignmentResult = mysqli_fetch_assoc($assignmentExe)) {
    ?>
                    <table class="assignment-details-table">
                        <tr>
                            <td>Title:</td>
                        </tr>
                        <tr>
                            <td><input type="text" id="titles-assignment-details" disabled value="<?php if (isset($assignmentResult['a_title'])) echo $assignmentResult['a_title'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Description:</td>
                        </tr>
                        <tr>
                            <td>
                                <textarea name="" id="textarea-assignment" disabled value=""><?php if (isset($assignmentResult['a_description'])) echo $assignmentResult['a_description'] ?></textarea>
                            </td>
                        </tr>
                    </table>
    <?php

                }
            }
        }
    }
    ?>
</div>