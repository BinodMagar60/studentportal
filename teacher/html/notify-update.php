<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/teacherCheck.php";
if (isset($_GET['id'])) {
    $uid = $_GET['id'];
    require_once "../../php/config/db.php";
    $sql = "select * from teacher_notify where id='$uid'";
    if ($exesql = mysqli_query($con, $sql)) {
        if (mysqli_num_rows($exesql) > 0) {
            $result = mysqli_fetch_assoc($exesql);
        }
    }
} else {
    echo "not set";
}

?>
<form>
    <table id="update-notice-table">
        <tr>
            <td>Expiration Date</td>
        </tr>
        <tr>
            <td><input type="date" name="e_date" value="<?php if (isset($result['exp_date'])) echo $result['exp_date'] ?>"></td>
            <input type="hidden" name="id" value="<?php if (isset($result['id'])) echo $result['id'] ?>">
        </tr>
        <tr>
            <td>Description</td>
        </tr>
        <tr>
            <td><textarea name="description" id="description-notice-textarea" rows="5"><?php if (isset($result['description'])) echo $result['description'] ?></textarea></td>
        </tr>
        <tr>
            <td>To</td>
        </tr>
        <tr>
            <td>
                <select name="class" id="update-selectClass">
                    <option value="everyone" <?php if ($result['class'] == "everyone") echo "selected"; ?>>Everyone</option>
                    <option value="one" <?php if ($result['class'] == "one") echo "selected"; ?>>One</option>
                    <option value="two" <?php if ($result['class'] == "two") echo "selected"; ?>>Two</option>
                    <option value="three" <?php if ($result['class'] == "three") echo "selected"; ?>>Three</option>
                    <option value="four" <?php if ($result['class'] == "four") echo "selected"; ?>>Four</option>
                    <option value="five" <?php if ($result['class'] == "five") echo "selected"; ?>>Five</option>
                    <option value="six" <?php if ($result['class'] == "six") echo "selected"; ?>>Six</option>
                    <option value="seven" <?php if ($result['class'] == "seven") echo "selected"; ?>>Seven</option>
                    <option value="eight" <?php if ($result['class'] == "eight") echo "selected"; ?>>Eight</option>
                    <option value="nine" <?php if ($result['class'] == "nine") echo "selected"; ?>>Nine</option>
                    <option value="ten" <?php if ($result['class'] == "ten") echo "selected"; ?>>Ten</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <select name="section" id="update-selectSection">
                    <option value="-" <?php if ($result['section'] == "-") echo "selected"; ?>>-</option>
                    <option value="everyone" <?php if ($result['section'] == "everyone") echo "selected"; ?>>Everyone</option>
                    <option value="A" <?php if ($result['section'] == "A") echo "selected"; ?>>Section A</option>
                    <option value="B" <?php if ($result['section'] == "B") echo "selected"; ?>>Section B</option>
                    <option value="C" <?php if ($result['section'] == "C") echo "selected"; ?>>Section C</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <div class="btn-update-notice">
                    <button type="button" class="update-btn-notice" style="background-color: green" onclick="notifyUpdatePopup();">Update</button>
                    <button type="button" class="update-btn-notice" style="background-color: red" onclick="notifyUpdateRemove();">Cancel</button>
                </div>
            </td>
        </tr>
    </table>
</form>