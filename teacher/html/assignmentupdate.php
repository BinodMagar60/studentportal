<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/teacherCheck.php";
require_once "../../php/config/db.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $assignmentSql = "SELECT * FROM assignments where id=$id";
    if ($assignmentExe = mysqli_query($con, $assignmentSql)) {
        if (mysqli_num_rows($assignmentExe) > 0) {
            $assignmentDetail = mysqli_fetch_assoc($assignmentExe);
        }
    }
}
?>
<form id="assignmentDetails">
    <table id="update-assignment-table">
        <tr>
            <td>Submission Date</td>
        </tr>
        <tr>
            <input type="hidden" name="id" value="<?php if (isset($assignmentDetail['id'])) echo $assignmentDetail['id']; ?>">
            <td><input type="date" name="assign_date" value="<?php if (isset($assignmentDetail['exp_date'])) echo $assignmentDetail['exp_date']; ?>"></td>
        </tr>
        <tr>
            <td>Title</td>
        </tr>
        <tr>
            <td><input type="text" name="assign_title" value="<?php if (isset($assignmentDetail['a_title'])) echo $assignmentDetail['a_title']; ?>"></td>
        </tr>
        <tr>
            <td>Description</td>
        </tr>
        <tr>
            <td><textarea name="assign_description" id="description-textarea" rows="5"><?php if (isset($assignmentDetail['a_description'])) echo $assignmentDetail['a_description']; ?></textarea></td>
        </tr>
        <tr>
            <td>Select Class</td>
        </tr>
        <tr>
            <td>
                <select name="assign_class" id="selectClassAssignmentUpdate">
                    <option value="one" <?php if ($assignmentDetail['a_class'] == "one") echo "selected"; ?>>One</option>
                    <option value="two" <?php if ($assignmentDetail['a_class'] == "two") echo "selected"; ?>>Two</option>
                    <option value="three" <?php if ($assignmentDetail['a_class'] == "three") echo "selected"; ?>>Three</option>
                    <option value="four" <?php if ($assignmentDetail['a_class'] == "four") echo "selected"; ?>>Four</option>
                    <option value="five" <?php if ($assignmentDetail['a_class'] == "five") echo "selected"; ?>>Five</option>
                    <option value="six" <?php if ($assignmentDetail['a_class'] == "six") echo "selected"; ?>>Six</option>
                    <option value="seven" <?php if ($assignmentDetail['a_class'] == "seven") echo "selected"; ?>>Seven</option>
                    <option value="eight" <?php if ($assignmentDetail['a_class'] == "eight") echo "selected"; ?>>Eight</option>
                    <option value="nine" <?php if ($assignmentDetail['a_class'] == "nine") echo "selected"; ?>>Nine</option>
                    <option value="ten" <?php if ($assignmentDetail['a_class'] == "ten") echo "selected"; ?>>Ten</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <select name="assign_section" id="selectSelectAssignmentUpdate">
                    <option value="everyone" <?php if ($assignmentDetail['a_section'] == "everyone") echo "selected"; ?>>Everyone</option>
                    <option value="A" <?php if ($assignmentDetail['a_section'] == "A") echo "selected"; ?>>Section A</option>
                    <option value="B" <?php if ($assignmentDetail['a_section'] == "B") echo "selected"; ?>>Section B</option>
                    <option value="C" <?php if ($assignmentDetail['a_section'] == "C") echo "selected"; ?>>Section C</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Subject</td>
        </tr>
        <tr>
            <td>
                <select name="assign_subject" id="selectSubjectAssignmentUpdate">
                    <option value="English" <?php if ($assignmentDetail['a_subject'] == "English") echo "selected"; ?>>English</option>
                    <option value="Nepali" <?php if ($assignmentDetail['a_subject'] == "Nepali") echo "selected"; ?>>Nepali</option>
                    <option value="Maths" <?php if ($assignmentDetail['a_subject'] == "Maths") echo "selected"; ?>>Maths</option>
                    <option value="Science" <?php if ($assignmentDetail['a_subject'] == "Science") echo "selected"; ?>>Science</option>
                    <option value="Social" <?php if ($assignmentDetail['a_subject'] == "Social") echo "selected"; ?>>Social</option>
                    <option value="Computer" <?php if ($assignmentDetail['a_subject'] == "Computer") echo "selected"; ?>>Computer</option>
                    <option value="Account" <?php if ($assignmentDetail['a_subject'] == "Account") echo "selected"; ?>>Account</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <div class="btn-update-assignments">
                    <button type="button" class="update-btn-assingments" style="background-color: green" onclick="assignmentUpdatePopup();">Update</button>
                    <button type="button" class="update-btn-assingments" style="background-color: red" onclick="assignmentUpdateRemeove();">Cancel</button>
                </div>
            </td>
        </tr>
    </table>
</form>