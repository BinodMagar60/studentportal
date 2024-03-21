<?php
require_once "../php/config/sessionStart.php";
require_once "../php/loginCheck/adminCheck.php";
if (isset($_GET['id'])) {
    $uid = $_GET['id'];
    require_once "../php/config/db.php";
    $sql = "select * from announcements where id='$uid'";
    if ($exesql = mysqli_query($con, $sql)) {
        if (mysqli_num_rows($exesql) > 0) {
            $result = mysqli_fetch_assoc($exesql);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement update</title>
    <link rel="stylesheet" href="../css/admin-announcementupdate-style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <!-- <form action="../php/announcement/updateAnnouncement.php" method="post"> -->
    <div class="updatepopup-announcement" id="updatepopup-announcement">
        <div>
            <table>
                <tr>
                    <td>Expiration Date:</td>
                </tr>
                <tr>
                    <input type="hidden" name="id" value="<?php if (isset($uid)) echo $uid; ?>">
                    <td><input name="a_date" type="date" value="<?php if (isset($result['exp_date'])) echo $result['exp_date']; ?>" style="margin-bottom: 25px;"></td>
                </tr>
                <tr>
                    <td>Description:</td>
                </tr>
                <tr>
                    <td><textarea name="a_description" id="autoresizing2" cols="5" rows="10" style="margin-bottom: 25px;"><?php if (isset($result['a_description'])) echo $result['a_description']; ?></textarea></td>
                </tr>
                <tr>
                    <td>Send To:</td>
                </tr>
                <tr>
                    <td>
                        <select name="a_user_whom" id="">
                            <option value="everyone" <?php if ($result['user_whom'] == "everyone") echo "selected"; ?>>Everyone</option>
                            <option value="teacher" <?php if ($result['user_whom'] == "teacher") echo "selected"; ?>>Teacher</option>
                            <option value="student" <?php if ($result['user_whom'] == "student") echo "selected"; ?>>Student</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="a_user_class" id="">
                            <option value="-" <?php if ($result['user_class'] == "-") echo "selected"; ?>>-</option>
                            <option value="allclass" <?php if ($result['user_class'] == "allclass") echo "selected"; ?>>All Classes</option>
                            <option value="One" <?php if ($result['user_class'] == "One") echo "selected"; ?>>One</option>
                            <option value="Two" <?php if ($result['user_class'] == "Two") echo "selected"; ?>>Two</option>
                            <option value="Three" <?php if ($result['user_class'] == "Three") echo "selected"; ?>>Three</option>
                            <option value="Four" <?php if ($result['user_class'] == "Four") echo "selected"; ?>>Four</option>
                            <option value="Five" <?php if ($result['user_class'] == "Five") echo "selected"; ?>>Five</option>
                            <option value="Six" <?php if ($result['user_class'] == "Six") echo "selected"; ?>>Six</option>
                            <option value="Seven" <?php if ($result['user_class'] == "Seven") echo "selected"; ?>>Seven</option>
                            <option value="Eight" <?php if ($result['user_class'] == "Eight") echo "selected"; ?>>Eight</option>
                            <option value="Nine" <?php if ($result['user_class'] == "Nine") echo "selected"; ?>>Nine</option>
                            <option value="Ten" <?php if ($result['user_class'] == "Ten") echo "selected"; ?>>Ten</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="a_user_section" id="">
                            <option value="-" <?php if ($result['user_section'] == "-") echo "selected"; ?>>-</option>
                            <option value="allsection" <?php if ($result['user_section'] == "allsection") echo "selected"; ?>>All Section</option>
                            <option value="A" <?php if ($result['user_section'] == "A") echo "selected"; ?>>Section A</option>
                            <option value="B" <?php if ($result['user_section'] == "B") echo "selected"; ?>>Section B</option>
                            <option value="C" <?php if ($result['user_section'] == "C") echo "selected"; ?>>Section C</option>
                        </select>
                    </td>
                </tr>
            </table>
            <div class="btn-announcementupdate">
                <button class="update-announcement" id="update-announcement" style="background-color: green" onclick="announcementUpdatePopupBox();">Update</button>
                <button class="cancel-announcement" id="cancel-announcement" style="background-color: gray" type="button" onclick="updateAnnouncementPopupCancel();">Cancel</button>
            </div>
        </div>
    </div>
    <!-- </form> -->


    <script src="../js/admin-announcement.js"></script>
</body>

</html>