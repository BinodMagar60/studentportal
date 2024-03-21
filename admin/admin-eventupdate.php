<?php
require_once "../php/config/sessionStart.php";
require_once "../php/loginCheck/adminCheck.php";
if (isset($_GET['id'])) {
    $uid = $_GET['id'];
    require_once "../php/config/db.php";
    $sql = "select * from notice where id='$uid'";
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
    <title>update</title>
    <link rel="stylesheet" href="../css/admin-eventupdate-style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <!-- <form style="padding:none; border:none; margin:none;" action="" method="post"> -->
    <div class="updatepopup" id="updatepopup">
        <div>
            <table>
                <tr>
                    <td style="background-color: white;"><label for="title">Event Title:</label></td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php if (isset($uid)) echo $uid; ?>"><input type="text" id="title" style="margin-bottom: 25px;" name="notice" value="<?php if (isset($result['notice'])) echo $result['notice']; ?>">
                    </td>
                </tr>
                <tr>
                    <td><label for="date">Date:</label></td>
                </tr>
                <tr>
                    <td><input type="date" id="date" name="n_date" value="<?php if (isset($result['n_date'])) echo $result['n_date']; ?>"></td>
                </tr>

            </table>
            <div class="btn-updates-event">
                <a><button style="background-color: green" onclick="eventUpdateLists();">Update</button></a>
                <a><button style="background-color: gray" type="button" onclick="updateEventsPopupCancel();">Cancel</button></a>
            </div>
        </div>
    </div>
    <!-- </form> -->
    <script src="../js/admin-updateevents.js"></script>
</body>

</html>