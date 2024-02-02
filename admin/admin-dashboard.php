<?php
require_once "../php/config/db.php";
$countAdmin_sql="SELECT COUNT(*) as count from admin_table";
$countTeacher_sql="SELECT COUNT(*) as count from teacher_table";
$countStudent_sql="SELECT COUNT(*) as count from student_table";

if($countAdmin_exe=mysqli_query($con,$countAdmin_sql)){
  $countAdmin_row=mysqli_fetch_assoc($countAdmin_exe);
}


if($countTeacher_exe=mysqli_query($con,$countTeacher_sql)){
  $countTeacher_row=mysqli_fetch_assoc($countTeacher_exe);
}
if($countStudent_exe=mysqli_query($con,$countStudent_sql)){
  $countStudent_row=mysqli_fetch_assoc($countStudent_exe);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/admin-dashboard-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css"/>
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
                    <div class="total-count-number"><?php echo $countStudent_row['count'];?></div>
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
  
                    <div class="total-count-number"><?php echo $countTeacher_row['count'];?></div>
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
                    <div class="total-count-number"><?php echo $countAdmin_row['count'];?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="lower-one">
        
    </div>

    <!-- lower one -->
    <div class="lower-one"></div>
</body>
</html>