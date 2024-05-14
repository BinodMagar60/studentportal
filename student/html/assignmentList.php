<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/studentCheck.php";
if (isset($_SESSION['userClass'], $_SESSION['userSection'])) {
    require_once "../../php/config/db.php";
    $class = $_SESSION['userClass'];
    $section = $_SESSION['userSection'];
    $subject = isset($_GET['subject']) ? $_GET['subject'] : 'English';
?>







<table class="note-list-here" id="note-list-here">

    <?php
    $current_date = date("Y-m-d");
    if (isset($class, $section, $subject)) {
        require_once "../../php/config/db.php";
        $sql = "SELECT * FROM assignments where a_class='$class' and (a_section='everyone' or a_section='$section') and `a_subject`='$subject' and `exp_date`>'$current_date'";
        if ($exesql = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($exesql) > 0) {
                $i = 0;
    ?>
                
                    <tr>
                        <td>S.N</td>
                        <td>Title</td>
                        <td>Assigned by</td>
                        <td>Submission Date</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                    <?php
                    while ($search = mysqli_fetch_assoc($exesql)) {
                        $i += 1;
                        $posterEmail = $search['poster_email'];
                        $uploadDate = date("M d", strtotime($search['exp_date']));
                        $nameSql = "SELECT * FROM teacher_table where email='$posterEmail'";
                        if ($nameExe = mysqli_query($con, $nameSql)) {
                            if (mysqli_num_rows($nameExe) > 0) {
                                $nameResult = mysqli_fetch_assoc($nameExe);
                                $posterName = $nameResult['name'];
                    ?>
                                <tr>
                                    <td><?php if (isset($i)) echo $i ?></td>
                                    <td onclick="assignmentDetailsShow(<?php if (isset($search['id'])) echo $search['id'] ?>);"><?php if (isset($search['a_title'])) echo $search['a_title'] ?></td>
                                    <td><?php if (isset($posterName)) echo $posterName ?></td>
                                    <td><?php if (isset($uploadDate)) echo $uploadDate ?></td>
                                    <!-- assignment CHeck query to check the status -->
                                    <?php
                                    if (isset($_SESSION['userEmail'])) {
                                        $student_email = $_SESSION['userEmail'];
                                        $aId = $search['id'];
                                        $assignmentStatusSql = "SELECT `status` FROM student_assignment_upload where email='$student_email' and assignment_id=$aId";
                                        if ($assignmentStatusExe = mysqli_query($con, $assignmentStatusSql)) {
                                            $assignmentStatusRes = mysqli_fetch_assoc($assignmentStatusExe);
                                        }
                                    ?>
                                        <td id="status<?php echo $i ?>"><?php echo isset($assignmentStatusRes['status']) ? $assignmentStatusRes['status'] : '-' ?></td>

                                        <td style="display: flex; justify-content: center;">
                                            <div class="btn-assignments">
                                                <button class="btn-assign" id="upload<?php echo $i ?>" style="background-color: transparent;" onclick="assignmentUploadShow('<?php echo $search['id'] ?>');"><i class="ri-upload-2-line"></i></button>
                                            </div>
                                            <button id="checked<?php echo $i ?>" disabled class="checkedBtn">Checked</button>
                                        </td>
                                </tr>
    <?php
                                    }
                                }
                            }
                        }
                    }
                    else{
                        echo "<tr><td colspan='6' style='background-color: white;'>No Assignments Available</td></tr>";
                    }
                } else {
                    echo "query error";
                }
            } else {
                echo "not set class";
            }
    ?>




</table>
<?php
}
?>

