<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/teacherCheck.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/sideAnnouncements-style.css">
</head>

<body>

  <div class="announcement-show-1">
    <?php
    require_once "../../php/config/db.php";
    require_once "../../php/config/sessionStart.php";
    require_once "../../php/announcement/expiry_announcement.php";
    $userType = $_SESSION['userType'];
    $sql_announcement = "SELECT * FROM announcements where (user_whom='everyone' or user_whom='$userType')";
    $exesql_announcement = mysqli_query($con, $sql_announcement);
    if (mysqli_num_rows($exesql_announcement) != 0) {
      while ($result_announcement = mysqli_fetch_assoc($exesql_announcement)) {

        $createdDate = $result_announcement['created_date'];
        $a_created_dateObject = date_create($createdDate);
        $a_created_formattedDate = date_format($a_created_dateObject, 'M d');
        $poster=$result_announcement['poster_email'];
        
        $sql_poster_name="SELECT * FROM admin_table where email='$poster'";
        $exesql_check=mysqli_query($con,$sql_poster_name);
        if(mysqli_num_rows($exesql_check)!=0){
$result_check_poster=mysqli_fetch_assoc($exesql_check);
$poster_name=$result_check_poster['name'];
        }
    ?>
        <div class="announcement-show-2">
          <div class="announcement-date"><?php if (isset($a_created_formattedDate)) echo $a_created_formattedDate; ?></div>
          <div class="announcement-detail"><?php if (isset($result_announcement['a_description'])) echo $result_announcement['a_description']; ?></div>
          <div class="announcement-who">- <?php if (isset($poster_name)) echo $poster_name; ?></div>
        </div>
    <?php
      }
    }
    ?>

    <?php
    require_once "../php/notify/expiry_notify.php";
    $sql_notify = "SELECT * from teacher_notify";
    if ($exesql_notify = mysqli_query($con, $sql_notify)) {
      if (mysqli_num_rows($exesql_notify) > 0) {
        while ($result_notify = mysqli_fetch_assoc($exesql_notify)) {
          $dbDate = $result_notify['created_date'];
          $dateObject = date_create($dbDate);
          $formattedDate = date_format($dateObject, 'M d');

          $posterEmail = $result_notify['poster_email'];
          $sql = "SELECT * FROM teacher_table where email='$posterEmail'";
          if ($exesql = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($exesql) > 0) {
              if ($result = mysqli_fetch_assoc($exesql)) {
                $posterName = $result['name'];
    ?>

                <div class="announcement-show-2">
                  <div class="announcement-date"><?php if (isset($formattedDate)) echo $formattedDate; ?></div>
                  <div class="announcement-detail"><?php if (isset($result_notify['description'])) echo $result_notify['description']; ?></div>
                  <div class="announcement-who">- <?php if (isset($posterName)) echo $posterName; ?></div>
                </div>



    <?php
              }
            }
          }
        }
      }
    }

    ?>
  </div>




</body>

</html>