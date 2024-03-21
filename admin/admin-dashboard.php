    <?php
    require_once "../php/config/sessionStart.php";
    require_once "../php/loginCheck/adminCheck.php";
    require_once "../php/config/db.php";
    unset($_SESSION['target_s_email']);

    $countAdmin_sql = "SELECT COUNT(*) as count from admin_table";
    $countTeacher_sql = "SELECT COUNT(*) as count from teacher_table";
    $countStudent_sql = "SELECT COUNT(*) as count from student_table";

    if ($countAdmin_exe = mysqli_query($con, $countAdmin_sql)) {
        $countAdmin_row = mysqli_fetch_assoc($countAdmin_exe);
    }


    if ($countTeacher_exe = mysqli_query($con, $countTeacher_sql)) {
        $countTeacher_row = mysqli_fetch_assoc($countTeacher_exe);
    }
    if ($countStudent_exe = mysqli_query($con, $countStudent_sql)) {
        $countStudent_row = mysqli_fetch_assoc($countStudent_exe);
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="../css/admin-dashboard-style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>

    <body>
        <!-- upper one -->
        <div class="upper-one">
            <div class="student-numbers">
                <div class="top-title">Student</div>
                <div class="middle-section-dashboard">
                    <div class="logo-dash">
                        <i class="ri-graduation-cap-line"></i>
                    </div>
                    <div class="total-count-section">
                        <div class="total-count-text">Total</div>
                        <div class="total-count-number"><?php echo $countStudent_row['count']; ?></div>
                    </div>
                </div>
            </div>
            <div class="teacher-numbers">
                <div class="top-title">Teacher</div>
                <div class="middle-section-dashboard">
                    <div class="logo-dash">
                        <i class="ri-presentation-line"></i>
                    </div>
                    <div class="total-count-section">
                        <div class="total-count-text">Total</div>

                        <div class="total-count-number"><?php echo $countTeacher_row['count']; ?></div>
                    </div>
                </div>
            </div>
            <div class="admin-numbers">
                <div class="top-title">Admin</div>
                <div class="middle-section-dashboard">
                    <div class="logo-dash">
                        <i class="ri-admin-line"></i>
                    </div>
                    <div class="total-count-section">
                        <div class="total-count-text">Total</div>
                        <div class="total-count-number"><?php echo $countAdmin_row['count']; ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lower-content-edit">
            <div style="font-size: 1.75rem; font-weight: 500;padding-left: 25px; background-color: white; padding-top: 20px;">Recently Added </div>
            <div class="lower-one" id="lower-one">

            </div>

        </div>

        <!-- lower one -->

        <script src="../js/admin-dashboard.js"></script>
        <script>
            recentLists();
        </script>
    </body>

    </html>