<?php
require_once "../php/config/sessionStart.php";
require_once "../php/loginCheck/adminCheck.php";
require_once "../php/config/AdminProfile.php";
// require_once "../php/config/sessionStart.php";
if (isset($_GET['a_email'])) {
  $target_a_email = $_GET['a_email'];
  $_SESSION['target_a_email'] = $target_a_email;
} else {
  echo "not set";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Profiles</title>
  <link rel="stylesheet" href="../css/admin-userprofile-style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.0.1/remixicon.css" integrity="sha512-ZH3KB6wI5ADHaLaez5ynrzxR6lAswuNfhlXdcdhxsvOUghvf02zU1dAsOC6JrBTWbkE1WNDNs5Dcfz493fDMhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.0.1/remixicon.min.css"
    integrity="sha512-dTsohxprpcruDm4sjU92K0/Gf1nTKVVskNHLOGMqxmokBSkfOAyCzYSB6+5Z9UlDafFRpy5xLhvpkOImeFbX6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
</head>

<body>
  <div class="whole-content">
    <!-- navbar -->
    <div class="navbar">
      <!-- logo or school name -->
      <div class="logo"><a href="admin.php">Admin Portal</a></div>
      <div class="right-side">
        <a href="admin-userprofile.php">
          <div class="useraccount">
            <div class="U-photo">
              <!-- user photo in navbar at right side -->
              <div class="photo"><img src="../<?php echo "$adminImage"; ?>" alt="admin photo"></div>
            </div>
            <div class="name-n-role">
              <!-- name and roll -->
              <div class="u-name" name="a-id"><?php if (isset($adminName)) echo "$adminName"; ?></div>
              <div class="role" name="role"><?php if (isset($userType)) echo "$userType"; ?></div>
            </div>
          </div>
        </a>
        <div class="notification">
          <a><button class="notif-btn" onclick="eventNotification(); announcementNotification();">
              <ion-icon name="notifications-outline" class="notif"></ion-icon></button></a>
        </div>
      </div>
    </div>

    <!-- navbar end -->




    <!-- middle contents -->
    <!-- sidebar -->
    <div class="leftside-contents">
      <div class="side-bar-titles">
        <button class="active" id="button1" onclick="toggleButton(1); admin1UserProfile();">
          <span><i class="ri-user-line" style="margin-right: 10px;"></i></span>User Profile
        </button>
      </div>


      <div class="side-bar-titles">
        <a class="side-panel-title"><button id="button2" onclick="toggleButton(2);admin1UserSetting();">
            <span><i class="ri-settings-2-line" style="margin-right: 10px;"></i></span>Setting
          </button></a>
      </div>

    </div>
    <!-- sidebar end -->

    <!-- Notification button -->


    <div class="calender-announcement-notices" style="overflow-y: scroll;">
      <div class="exit-calendar-announcement-notices">
        <div class="notif-title">Notifications</div>
        <div class="x-mark">
          <button><i class="fa-solid fa-xmark"></i></button>
        </div>
      </div>
      <div class="calendar-full">
        <div class="navigation">
          <button class="cal-side-arrow" onclick="showPreviousMonth()">
            <i class="ri-arrow-left-s-line"></i>
          </button>
          <button onclick="showCurrentMonth()">Current Month</button>
          <button class="cal-side-arrow" onclick="showNextMonth()">
            <i class="ri-arrow-right-s-line"></i>
          </button>
        </div>
        <div id="currentDate"></div>
        <table id="calendar">
          <thead>
            <tr id="daysOfWeek">
              <th>Sun</th>
              <th>Mon</th>
              <th>Tue</th>
              <th>Wed</th>
              <th>Thu</th>
              <th>Fri</th>
              <th>Sat</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
      <div class="event-notif">
        <div class="event-show" id="event-show">

        </div>

        <div class="announcement-show" id="announcement-show">


        </div>
      </div>
    </div>

    <!-- notification section end -->
    <div class="middle-content">
      <div class="inner-middle-content" id="container">


      </div>
    </div>
  </div>
  <!-- middle contents end -->


  <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../js/admin-dropdownTransition.js"></script>
  <script src="../js/admin-calendar.js"></script>
  <script src="../js/admin-notification.js"></script>
  <script src="../js/admin-clickbutton.js"></script>
  <script src="../js/admin-userprofile.js"></script>
  <script src="../js/admin-admindetail-sidebar.js"></script>
  <script src="../js/admin-studentprofiles.js"></script>
  <script src="../js/admin-teacherprofiles-update.js"></script>
  <script src="../js/admin-userprofile-setting.js"></script>


  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('button1').click();
    });
  </script>

</body>

</html>