<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/studentCheck.php";
require_once "../../php/config/StudentProfile.php";
require_once "../../php/config/folder.php";
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js" integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <div class="whole-content">
        <div class="overlay" id="overlay"></div>
        <!-- navbar -->
        <div class="navbar">
            <!-- logo or school name -->
            <div class="logo"><a href="#">Student Portal</a></div>
            <div class="right-side">
                <a href="Studentprofile.php">
                    <div class="useraccount">
                        <div class="U-photo">
                            <!-- user photo in navbar at right side -->
                            <div class="photo"><img src="../../<?php if (isset($imageSrc)) echo $imageSrc; ?>" alt="student photo"></div>
                        </div>
                        <div class="name-n-role">
                            <!-- name and roll -->
                            <div class="u-name" name="a-id"><?php if (isset($studentName)) echo $studentName; ?></div>
                            <div class="role" name="role"><?php if (isset($userType)) echo $userType; ?></div>
                        </div>
                    </div>
                </a>
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
                <button class="active" id="button1" onclick="toggleButton(1);assignmentShow();">
                    <span style="margin-right: 10px;color: white;-webkit-text-stroke:1px #092635;"><i class="fa-solid fa-file-circle-exclamation"></i></span>Assignments
                </button>
            </div>

            <div class="side-bar-titles">
                <a class="side-panel-title"><button id="button2" onclick="toggleButton(2);notesShow();">
                        <span tyle="color: white;-webkit-text-stroke:1px #092635;"><i class="fa-solid fa-notes-medical"></i></span>Notes
                    </button>
                </a>
            </div>
            <div class="side-bar-titles">
                <a class="side-panel-title"><button id="button3" onclick="toggleButton(3);ResultStudents();">
                        <span><i class="ri-file-list-line"></i></span>Result
                    </button>
                </a>
            </div>
            <div class="side-bar-titles">
                <button class="dropdown-1">
                    <span><i class="ri-calendar-schedule-line"></i></span>Routine
                    <span class="last"><i class="ri-arrow-down-s-line"></i></span>
                </button>
                <div class="subclass">
                    <a class="subclass-content"><button id="button4" onclick="toggleButton(4);classRoutineShow();">Class
                            Routine</button></a>
                    <a class="subclass-content"><button id="button5" onclick="toggleButton(5);examRoutineShow()">Exam
                            Routine</button></a>
                </div>
            </div>

            <div class="side-bar-titles">
                <a class="side-panel-title"><button id="button6" onclick="logoutPopup();">
                        <span><i class="ri-logout-box-r-line"></i></span>Logout
                    </button></a>
            </div>
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
    <div class="popup-log" id="popup-log">
        <div class="popupbox-log">
        </div>
        <div class="question">
            <i class="ri-question-line"></i>
        </div>
        <div class="text-message">
            Are you sure you want to Logout?
        </div>
        <div class="btn-logout">
            <a href="../../php/validate/logout.php"><button>Yes</button></a>
            <button onclick="cancelLogoutPopup();">No</button>
        </div>
    </div>
    </div>



    <!--end-->


    </div>
    <!-- middle contents end -->





    <script src="../js/dropdownTransition.js"></script>
    <script src="../js/notifications.js"></script>
    <script src="../js/notes.js"></script>
    <script src="../js/assignment.js"></script>
    <script src="../js/resultshow.js"></script>





    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('button1').click();
        });
    </script>

</body>

</html>