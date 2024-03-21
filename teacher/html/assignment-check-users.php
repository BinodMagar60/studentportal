<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/teacherCheck.php";
?>

<div class="userWholeContainerForAssignments">
  <div class="top-assignments-part">
    <div></div>
    <div class="top-assignments-part-title">Assignments</div>
    <div class="top-assignments-part-btn"><button onclick=" userCheckPopupRemove()"><i class="ri-close-circle-line"></i></button></div>
  </div>











  <div class="userContainerForAssignments">
    <table class="assignmentTableForUsers" id="assignmentTableForUsers">
      <tr>
        <td>S.N</td>
        <td>Name</td>
        <td>Uploaded Date</td>
        <td>Status</td>
        <td>Download</td>
        <td>Action</td>
      </tr>
      <?php
      if (isset($_GET['a_id'])) {
        // echo $_GET['a_id'];
        require_once "../../php/config/db.php";
        $aId = $_GET['a_id'];
        $class = isset($_GET['class']) ? $_GET['class'] : 'one';
        $section = isset($_GET['section']) ? $_GET['section'] : 'A';
        $sql = "SELECT * FROM student_table where `class`='$class' and `section`='$section'";
        if ($exesql = mysqli_query($con, $sql)) {
          if (mysqli_num_rows($exesql) > 0) {
            $i = 1;
            while ($result = mysqli_fetch_assoc($exesql)) {
              $student_name = $result['name'];
              $student_email = $result['email'];
              $status = '';
      ?>
              <tr>
                <td><?php if (isset($i)) echo $i ?></td>
                <td><?php if (isset($student_name)) echo $student_name ?></td>
                <?php
                $assignment_check_sql = "SELECT distinct *,`status` from student_assignment_upload where assignment_id=$aId and `email`='$student_email' and `status` != 'Rejected'";
                if ($assignment_check_exe = mysqli_query($con, $assignment_check_sql)) {
                  if (mysqli_num_rows($assignment_check_exe) > 0) {
                    $assignment_check_result = mysqli_fetch_assoc($assignment_check_exe);
                  } else {
                    $status = "-";
                  }
                ?>
                  <td>
                    <?php
                    if (empty($status)) {
                      $uploadDate = $assignment_check_result['created_date'];
                      $formatUploadDate = date("M d", strtotime($uploadDate));
                      echo $formatUploadDate;
                    } else {
                      echo $status;
                    }
                    ?>
                  </td>
                  <td id="status<?php echo $i ?>">
                    <?php
                    if (empty($status)) {
                      echo $assignment_check_result['status'];
                    } else {
                      echo $status;
                    }
                    ?>

                  </td>

                  <td>
                    <?php if (empty($status)) {
                      $downloadAssignmentSql = "SELECT * FROM student_assignment_upload where email='$student_email' and assignment_id=$aId and (`status`='Pending' or `status`= 'Approved')";
                      if ($downloadAssignmentExe = mysqli_query($con, $downloadAssignmentSql)) {
                        while ($downloadAssignmentResult = mysqli_fetch_assoc($downloadAssignmentExe)) { ?>
                          <a href="../../<?php if (isset($downloadAssignmentResult['file_path'])) echo $downloadAssignmentResult['file_path'] ?>" download="<?php if (isset($downloadAssignmentResult['file_name'])) echo $student_name . "_" . $downloadAssignmentResult['file_name'] ?>" id="download<?php echo $aId ?>"></a>

                        <?php
                        }
                        ?>

                        <button onclick="downloadAll(<?php echo $aId ?>)" style="color: blue; font-size:1.5rem; background-color: transparent;"><i class="ri-download-2-fill"></i></button>
                    <?php

                      }
                    } else {
                      echo $status;
                    }
                    ?>


                  </td>
                  <td>
                    <?php if (empty($status)) {
                    ?>
                      <button id="approve<?php echo $i ?>" onclick='acceptAssignment("<?php echo $student_email ?>",<?php echo $aId ?>)' style='color: white; font-size:1.125rem; padding: 5px 10px; background-color: green;'>Approve</button>
                      <button id="reject<?php echo $i ?>" onclick='RejectAssignment("<?php echo $student_email ?>",<?php echo $aId ?>)' style='color: white; font-size:1.125rem; padding: 5px 10px; background-color: red;'>Reject</button>
                      <button class="approved" id="approved<?php echo $i ?>" style='color: white; font-size:1.125rem; padding: 5px 10px; background-color: green; margin-left: 60px;' disabled>Approved</button>
                    <?php

                    } else {
                      echo $status;
                    }
                    ?>
                  </td>
              </tr>
    <?php

                }
                $i++;
              }
            }
          }
        }
    ?>
    </table>
  </div>




</div>