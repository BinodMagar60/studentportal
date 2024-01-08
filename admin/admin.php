<?php
require_once "../php/config/sessionStart.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="../css/admin-style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.0.1/remixicon.css"
    integrity="sha512-ZH3KB6wI5ADHaLaez5ynrzxR6lAswuNfhlXdcdhxsvOUghvf02zU1dAsOC6JrBTWbkE1WNDNs5Dcfz493fDMhA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.0.1/remixicon.min.css"
    integrity="sha512-dTsohxprpcruDm4sjU92K0/Gf1nTKVVskNHLOGMqxmokBSkfOAyCzYSB6+5Z9UlDafFRpy5xLhvpkOImeFbX6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="whole-content">
    <!-- navbar -->
    <div class="navbar">
      <!-- logo or school name -->
      <div class="logo"><a href="#">Admin Portal</a></div>
      <div class="right-side">
        <a href="admin-userprofile.html">
          <div class="useraccount">
            <div class="U-photo">
              <!-- user photo in navbar at right side -->
              <div class="photo"><img src="../extra/admin.jpg" alt="admin phot"></div>
            </div>
            <div class="name-n-role">
              <!-- name and roll -->
              <div class="u-name" name="a-id">Thaman gurung</div>
              <div class="role" name="role">Admin</div>
            </div>
          </div>
        </a>
        <div class="notification">
          <a href="#"><button class="notif-btn">
              <ion-icon name="notifications-outline" class="notif"></ion-icon></button></a>
        </div>
      </div>
    </div>

    <!-- navbar end -->




    <!-- middle contents -->
    <!-- sidebar -->
    <div class="leftside-contents">
      <div class="side-bar-titles">
        <button class="active" id="button1" onclick="toggleButton(1)">
          <span><i class="ri-dashboard-line"></i></span>Dashboard
        </button>
      </div>
      <div class="side-bar-titles">
        <button class="dropdown-1">
          <span><i class="ri-graduation-cap-line"></i></span>Student
          <span class="last"><i class="ri-arrow-right-s-line"></i></span>
        </button>
        <div class="subclass">
          <a class="subclass-content"><button id="button2" onclick="toggleButton(2); studentDetail();">Student
              Detail</button></a>
          <a class="subclass-content"><button id="button3" onclick="toggleButton(3);studentAttendance();">Student
              Attendance</button></a>
          <a class="subclass-content"><button id="button4" onclick="toggleButton(4);studentAdd();">Add New
              Profile</button></a>
        </div>
      </div>
      <div class="side-bar-titles">
        <button class="dropdown-1">
          <span><i class="ri-presentation-line"></i></span>Teacher
          <span class="last"><i class="ri-arrow-right-s-line"></i></span>
        </button>
        <div class="subclass">
          <a class="subclass-content"><button id="button5" onclick="toggleButton(5);teacherDetail();">Teacher
              Detail</button></a>
          <a class="subclass-content"><button id="button6" onclick="toggleButton(6);teacherAdd();">Add New
              Profile</button></a>
        </div>
      </div>
      <div class="side-bar-titles">
        <button class="dropdown-1">
          <span><i class="ri-admin-line"></i></span>Admin
          <span class="last"><i class="ri-arrow-right-s-line"></i></span>
        </button>
        <div class="subclass">
          <a class="subclass-content"><button id="button7" onclick="toggleButton(7);adminDetail();">Admin
              Detail</button></a>
          <a class="subclass-content"><button id="button8" onclick="toggleButton(8);adminAdd();">Add New
              Profile</button></a>
        </div>
      </div>
      <div class="side-bar-titles">
        <a class="side-panel-title"><button id="button9" onclick="toggleButton(9)">
            <span><i class="ri-file-list-line"></i></span>Result
          </button></a>
      </div>
      <div class="side-bar-titles">
        <button class="dropdown-1">
          <span><i class="ri-calendar-schedule-line"></i></span>Routine
          <span class="last"><i class="ri-arrow-right-s-line"></i></span>
        </button>
        <div class="subclass">
          <a class="subclass-content"><button id="button10" onclick="toggleButton(10)">Class Routine</button></a>
          <a class="subclass-content"><button id="button11" onclick="toggleButton(11)">Exam Routine</button></a>
        </div>
      </div>
      <div class="side-bar-titles">
        <button class="dropdown-1">
          <span><i class="ri-notification-badge-line"></i></span>Notices
          <span class="last"><i class="ri-arrow-right-s-line"></i></span>
        </button>
        <div class="subclass">
          <a href="#" class="subclass-content"><button id="button12"
              onclick="toggleButton(12)">Announcement</button></a>
          <a href="#" class="subclass-content"><button id="button13" onclick="toggleButton(13)">Events</button></a>
        </div>
      </div>
    </div>
    <!-- sidebar end -->

    <!-- Notification button -->

    <div class="calender-announcement-notices">
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
      <div class="event-notif"></div>
    </div>

    <!-- notification section end -->









    <div class="middle-content">
      <div class="inner-middle-content" id="container">
      </div>
    </div>
  </div>
  <!-- middle contents end -->


  <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../js/admin-dropdownTransition.js"></script>
  <script src="../js/admin-calendar.js"></script>
  <script src="../js/admin-notification.js"></script>
  <script src="../js/admin-clickbutton.js"></script>
  <script src="../js/admin-studentadd-php.js"></script>
  <script src="../js/admin-teacheradd-php.js"></script>
  <script src="../js/admin-adminadd-php.js"></script>
  <script src="../js/admin-homepage-sidebars.js"></script>
</body>

</html>