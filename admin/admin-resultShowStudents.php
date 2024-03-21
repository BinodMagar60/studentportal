<div class="wholeContainer-resultAdmin">

  <div class="top-adminResult">
    <div></div>
    <div class="top-adminResult-middle">Marks Ledger</div>
    <div class="top-adminResult-close"><i class="ri-close-circle-line" onclick="showResultOfStudentsRemove();"></i></div>
  </div>

  <?php
  if (isset($_GET['class'], $_GET['section'], $_GET['title'])) {
    require_once "../php/config/db.php";
    $class = $_GET['class'];
    $section = $_GET['section'];
    $examTitle = $_GET['title'];
    $checkSql = "SELECT * FROM result_teacher_assigned where class='$class' and section='$section' and `exam_title`='$examTitle'";
    if ($checkExe = mysqli_query($con, $checkSql)) {
      if (mysqli_num_rows($checkExe) > 0) {
        $checkResult = mysqli_fetch_assoc($checkExe);
        $assignedId = $checkResult['id'];
        $markShowSql = "SELECT * FROM result_marks where result_assigned_id='$assignedId' and `exam_title`='$examTitle'";
        if ($markShowExe = mysqli_query($con, $markShowSql)) {
          if (mysqli_num_rows($markShowExe) > 0) {
            $i = 0;
  ?>
            <div class="middle-part-resultbox">
              <p>Title: <?php if (isset($examTitle)) echo $examTitle ?></p>
              <p>Class: <?php if (isset($class)) echo $class ?></p>
              <p>Section: <?php if (isset($section)) echo $section ?></p>
            </div>
            <form id="resultbox">
              <table id="resultbox-table" class="resultbox-table">
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
                while ($markShowResult = mysqli_fetch_assoc($markShowExe)) {
                  $studentEmail = $markShowResult['s_email'];

                  $studentShowSql = "SELECT * FROM student_table where email='$studentEmail'";
                  if ($studentShowExe = mysqli_query($con, $studentShowSql)) {
                    if (mysqli_num_rows($studentShowExe) > 0) {

                      $studentShowResult = mysqli_fetch_assoc($studentShowExe);
                      $studentName = $studentShowResult['name'];
                ?>
                      <tr>
                        <td><?php if (isset($studentName)) echo $studentName ?></td>
                        <input type="hidden" name="s_email_<?php if (isset($i)) echo $i ?>" value="<?php if (isset($studentShowResult['email'])) echo $studentShowResult['email'] ?>">
                        <td><input type="number" name="science_<?php if (isset($i)) echo $i ?>" value="<?php if (isset($markShowResult['science']))
                                                                                                        echo $markShowResult['science'] ?>"></td>
                        <td><input type="number" name="english_<?php if (isset($i)) echo $i ?>" value="<?php if (isset($markShowResult['english']))
                                                                                                        echo $markShowResult['english'] ?>"></td>
                        <td><input type="number" name="nepali_<?php if (isset($i)) echo $i ?>" value="<?php if (isset($markShowResult['nepali']))
                                                                                                      echo $markShowResult['nepali'] ?>"></td>
                        <td><input type="number" name="maths_<?php if (isset($i)) echo $i ?>" value="<?php if (isset($markShowResult['math']))
                                                                                                      echo $markShowResult['math'] ?>"></td>
                        <td><input type="number" name="social_<?php if (isset($i)) echo $i ?>" value="<?php if (isset($markShowResult['social']))
                                                                                                      echo $markShowResult['social'] ?>"></td>
                        <td><input type="number" name="computer_<?php if (isset($i)) echo $i ?>" value="<?php if (isset($markShowResult['computer']))
                                                                                                        echo $markShowResult['computer'] ?>"></td>
                        <td><input type="number" name="account_<?php if (isset($i)) echo $i ?>" value="<?php if (isset($markShowResult['account']))
                                                                                                        echo $markShowResult['account'] ?>"></td>

                      </tr>
                <?php
                      $i++;
                    }
                  }
                }
                ?>
                <tr>
                  <td colspan="8" style="border: none;">
                    <div class="btn-submit-resultStudents"><button type="button" onclick="submitResultStudentAdmin()">Update</button></div>
                  </td>
                </tr>
              </table>
              <input type="hidden" name="examTitle" value="<?php if (isset($examTitle)) echo $examTitle ?>">
              <input type="hidden" name="count" value="<?php if (isset($i)) echo $i ?>">

            </form>
  <?php
          }
        }
      }
    }
  } else {
    echo "not set";
  }
  ?>



</div>