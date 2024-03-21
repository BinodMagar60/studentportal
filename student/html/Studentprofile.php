<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/studentCheck.php";
require_once "../../php/config/StudentProfile.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard-style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.0.1/remixicon.css" integrity="sha512-ZH3KB6wI5ADHaLaez5ynrzxR6lAswuNfhlXdcdhxsvOUghvf02zU1dAsOC6JrBTWbkE1WNDNs5Dcfz493fDMhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js" integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
</head>

<body>
    <div class="whole-content">
        <div class="overlay" id="overlay"></div>
        <!-- navbar -->
        <div class="navbar">
            <!-- logo or school name -->
            <div class="logo"><a href="dashboard.php">Student Portal</a></div>
            <div class="right-side">
                <div class="useraccount">
                    <div class="U-photo">
                        <!-- user photo in navbar at right side -->
                        <div class="photo"><img src="../../<?php if (isset($imageSrc)) echo $imageSrc; ?>" alt="Student photo"></div>
                    </div>
                    <div class="name-n-role" style="color: white;">
                        <!-- name and roll -->
                        <div class="u-name" name="a-id"><?php if (isset($studentName)) echo $studentName; ?></div>
                        <div class="role" name="role"><?php if (isset($userType)) echo $userType; ?></div>
                    </div>
                </div>
                <div class="notification">
                    <a href="#"><button class="notif-btn" onclick="eventNotification(); announcementNotification();">
                            <ion-icon name="notifications-outline" class="notif"></ion-icon></button></a>
                </div>
            </div>
        </div>

        <!-- navbar end -->




        <!-- middle contents -->
        <!-- sidebar -->
        <div class="leftside-contents">
            <div class="side-bar-titles">
                <button class="active" id="button1" onclick="toggleButton(1);studentProfile();">
                    <span><i class="ri-user-line" style="margin-right: 10px;"></i></span>User Profile
                </button>
            </div>

            <div class="side-bar-titles">
                <a class="side-panel-title"><button id="button2" onclick="toggleButton(2);studentProfileSetting();">
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
            <div class="inner-middle-content" id="container" autocomplete="off">
            </div>
        </div>



        <!--logout popup-->



        <!--end-->


    </div>
    <!-- middle contents end -->





    <script src="../js/dropdownTransition.js"></script>
    <script src="../js/notifications.js"></script>
    <script src="../js/student-profile-ajax.js"></script>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('button1').click();
        });
    </script>

</body>

</html>