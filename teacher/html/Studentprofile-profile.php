<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/teacherCheck.php";
require_once "../../php/config/TeacherProfile.php";
if (isset($_SESSION['target_s_email'])) {
    $target_s_email = $_SESSION['target_s_email'];
    $detail_query = "SELECT * FROM student_table where email='$target_s_email'";
    if ($exe_detail_query = mysqli_query($con, $detail_query)) {
        if (mysqli_num_rows($exe_detail_query) > 0) {
            while ($result_s_detail = mysqli_fetch_assoc($exe_detail_query)) {
                $detail_s_imageSrc = $result_s_detail['image'];
                $detail_s_name = $result_s_detail['name'];
                $detail_s_address = $result_s_detail['address'];
                $detail_s_contact = $result_s_detail['contact'];
                $detail_s_gender = $result_s_detail['gender'];
                $detail_s_email = $result_s_detail['email'];
                $detail_s_class = $result_s_detail['class'];
                $detail_s_section = $result_s_detail['section'];
                //parents
                $detail_s_father_name = $result_s_detail['father_name'];
                $detail_s_mother_name = $result_s_detail['mother_name'];
                $detail_s_parents_contact = $result_s_detail['parents_contact'];
                $dateOfBirth = $result_s_detail['date_of_birth'];
                $timestamp = strtotime($dateOfBirth);
                $dob = date("F j, Y", $timestamp);
            }
        } else {
            echo "no data found";
        }
    } else {
        echo "query error";
    }
} else {
    echo "session target s email not set";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/studentprofile-profile-style.css">
</head>

<body>
    <!-- -->
    <form action="" method="post" enctype="multipart/form-data" novalidate autocomplete="off">
        <div class="basic-info">
            <div class="topname">
                Student Informaition
            </div>
            <div class="myinfo-container">
                <div class="info-photo">
                    <div class="intro">Profile Picture</div>
                    <div class="myimg">
                        <div class="circleline" id="imageContainer">
                            <img src="../../<?php if (isset($detail_s_imageSrc)) echo $detail_s_imageSrc; ?>" alt="Student photo" id="uploadedImage">
                        </div>
                    </div>
                </div>
                <div class="info-me">
                    <div class="intro">Basic Information</div>
                    <table>
                        <tr>
                            <td>Name</td>
                            <td><?php if (isset($detail_s_name)) echo $detail_s_name; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?php if (isset($detail_s_address)) echo $detail_s_address; ?></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td><?php if (isset($detail_s_gender)) echo $detail_s_gender; ?></td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td><?php if (isset($dob)) echo $dob; ?></td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td><?php if (isset($detail_s_contact)) echo $detail_s_contact; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td id="email"><?php if (isset($detail_s_email)) echo $detail_s_email; ?></td>
                        </tr>
                        <tr>
                            <td>User Type</td>
                            <td>Student</td>
                        </tr>
                    </table>

                    <div class="intro">Acadamic Information</div>
                    <table>
                        <tr>
                            <td>Class</td>
                            <td><?php if (isset($detail_s_class)) echo $detail_s_class; ?></td>
                        </tr>
                        <tr>
                            <td>Section</td>
                            <td><?php if (isset($detail_s_section)) echo $detail_s_section; ?></td>
                        </tr>
                        <tr>
                            <?php
                            require_once "../../php/config/db.php";
                            $current_time = date("Y");
                            $class = $detail_s_class;
                            $section = $detail_s_section;
                            $countAttendance = "SELECT count(distinct date(attendance_date)) as totalNum from attendance where class='$class' and section='$section' and Year(attendance_date)=$current_time";
                            mysqli_query($con, $countAttendance);
                            $no = mysqli_fetch_assoc(mysqli_query($con, $countAttendance));
                            $email = $detail_s_email;
                            $sql1 = "SELECT count(s_attendance) as student_attendance from attendance where s_attendance='P' and email='$email' and Year(attendance_date)='$current_time'";
                            mysqli_query($con, $sql1);
                            $result = mysqli_fetch_assoc(mysqli_query($con, $sql1));
                            ?>
                            <td>Attendance</td>
                            <td><?php if (isset($result['student_attendance'], $no['totalNum'])) echo $result['student_attendance'] . "/" . $no['totalNum']; ?></td>
                        </tr>
                    </table>



                    <div class="intro">Parent Information</div>
                    <table>
                        <tr>
                            <td>Father's Name</td>
                            <td><?php if (isset($detail_s_father_name)) echo $detail_s_father_name; ?></td>
                        </tr>
                        <tr>
                            <td>Mother's Name</td>
                            <td><?php if (isset($detail_s_mother_name)) echo $detail_s_mother_name; ?></td>
                        </tr>
                        <tr>
                            <td>Parent's Contact</td>
                            <td><?php if (isset($detail_s_parents_contact)) echo $detail_s_parents_contact; ?></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>


    </form>

</body>

</html>