<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/teacherCheck.php";
if (isset($_GET['id'])) {
  $assignedId = $_GET['id'];
  require_once "../../php/config/db.php";
  $check_teacher_sql = "SELECT * FROM result_teacher_assigned where id='$assignedId'";
  if ($check_teacher_exe = mysqli_query($con, $check_teacher_sql)) {
    if (mysqli_num_rows($check_teacher_exe) > 0) {
      $check_teacher_result = mysqli_fetch_assoc($check_teacher_exe);
      $class = $check_teacher_result['class'];
      $section = $check_teacher_result['section'];
      $assignedTeacher = $check_teacher_result['assigned_teacher'];
      $examTitle = $check_teacher_result['exam_title'];
    }
  }
?>


  <div class="top-result">
    <div></div>
    <div class="result-title">Marks Entry</div>
    <div class="close-result" onclick="resultStudentListPoupupRemove();"><i class="ri-close-circle-line"></i></div>
  </div>


  <div class="middle-section-result">
    <div>Class: <?php echo $class ?></div>
    <div>Section: <?php echo $section ?> </div>
  </div>

  <div class="container-result-insertmarks">
    <form id="ResultForm">
      <table class="resultTableUser">
        <tr>
          <td>Name</td>
          <td>Science</td>
          <td>English</td>
          <td>Nepali</td>
          <td>Maths</td>
          <td>Social</td>
          <td>Computer</td>
          <td>Account</td>
        </tr>


        <?php
        $studentSelectSql = "SELECT * FROM student_table where class='$class' and section='$section' order by name asc";
        if ($studentSelectExe = mysqli_query($con, $studentSelectSql)) {
          if (mysqli_num_rows($studentSelectExe) > 0) {
            $i = 0;
            while ($studentSelectResult = mysqli_fetch_assoc($studentSelectExe)) {

        ?>
              <tr>
                <td><?php if (isset($studentSelectResult['name'])) echo $studentSelectResult['name'] ?></td>
                <input type="hidden" name="s_email_<?php if (isset($i)) echo $i ?>" value="<?php if (isset($studentSelectResult['email'])) echo $studentSelectResult['email'] ?>">
                <input type="hidden" name="r_id_<?php if (isset($i)) echo $i ?>" value="<?php if (isset($assignedId)) echo $assignedId ?>">
                <?php
                if (isset($studentSelectResult['email'], $assignedId)) {
                  $student_email = $studentSelectResult['email'];
                  $result_assigned_id = $assignedId;
                  $checkMarksSql = "SELECT * FROM result_marks where s_email='$student_email' and result_assigned_id='$result_assigned_id'";
                  if ($checkMarksExe = mysqli_query($con, $checkMarksSql)) {
                    if (mysqli_num_rows($checkMarksExe) != 0) {
                      $checkMarksResult = mysqli_fetch_assoc($checkMarksExe);
                    }
                  }
                }
                ?>
                <td><input type="number" name="science_<?php if (isset($i)) echo $i ?>" value="<?php if (isset($checkMarksResult['science']))
                                                                                                echo $checkMarksResult['science'] ?>"></td>
                <td><input type="number" name="english_<?php if (isset($i)) echo $i ?>" value="<?php if (isset($checkMarksResult['english']))
                                                                                                echo $checkMarksResult['english'] ?>"></td>
                <td><input type="number" name="nepali_<?php if (isset($i)) echo $i ?>" value="<?php if (isset($checkMarksResult['nepali']))
                                                                                              echo $checkMarksResult['nepali'] ?>"></td>
                <td><input type="number" name="maths_<?php if (isset($i)) echo $i ?>" value="<?php if (isset($checkMarksResult['math']))
                                                                                              echo $checkMarksResult['math'] ?>"></td>
                <td><input type="number" name="social_<?php if (isset($i)) echo $i ?>" value="<?php if (isset($checkMarksResult['social']))
                                                                                              echo $checkMarksResult['social'] ?>"></td>
                <td><input type="number" name="computer_<?php if (isset($i)) echo $i ?>" value="<?php if (isset($checkMarksResult['computer']))
                                                                                                echo $checkMarksResult['computer'] ?>"></td>
                <td><input type="number" name="account_<?php if (isset($i)) echo $i ?>" value="<?php if (isset($checkMarksResult['account']))
                                                                                                echo $checkMarksResult['account'] ?>"></td>
              </tr>
            <?php
              $i++;
            }
            ?>
            <tr>
              <td colspan="8" style="border: none; background-color:white;">
                <div class="result-tablebtn" style=" display: flex; justify-content: right;">
                  <button type="button" onclick="submitResult()" style="background-color:green;color:white;padding: 10px 15px; cursor: pointer; font-size: 1.125rem">Submit</button>
                </div>
              </td>
            </tr>
            <input type="hidden" name="examTitle" value="<?php if (isset($examTitle)) echo $examTitle ?>">
            <input type="hidden" name="count" value="<?php if (isset($i)) echo $i ?>">
        <?php }
        }
        ?>


      </table>
    </form>
  </div>



<?php
}
?>