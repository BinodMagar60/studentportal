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
  <link rel="stylesheet" href="../css/sidenotifications-style.css">
</head>

<body>
  <div class="event-show-1">
    <?php
    require_once "../../php/config/db.php";
    $sql_notice = "SELECT * FROM notice ORDER BY n_date ASC";
    $exesql_notice = mysqli_query($con, $sql_notice);
    if (mysqli_num_rows($exesql_notice) != 0) {
      while ($result_notice = mysqli_fetch_assoc($exesql_notice)) {
        $dbDate = $result_notice['n_date'];
        $dateObject = date_create($dbDate);
        $formattedDateMonth = date_format($dateObject, 'M');
        $formattedDate = date_format($dateObject, 'd');
    ?>
        <div class="event-show-2"><span class="event1">
            <div class="event1-month"><?php if (isset($formattedDateMonth)) echo $formattedDateMonth; ?></div>
            <div class="event1-date"><?php if (isset($formattedDate)) echo $formattedDate; ?></div>
          </span> <span class="event2"><?php if (isset($result_notice['notice'])) echo $result_notice['notice']; ?></span></div>
    <?php
      }
    } else {
      echo '<div style="text-align: center; width:100%; margin-top: 50px; color: white; font-size: 1.375rem; font-weight: 500;">No Events For Now.</div>';
    }
    ?>

  </div>
</body>

</html>