<?php
require_once "../php/config/sessionStart.php";
require_once "../php/loginCheck/adminCheck.php";
// require_once "../php/config/sessionStart.php";
require_once "../php/config/AdminProfile.php";
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
    <link rel="stylesheet" href="../css/admin-student-personalinfo-style.css">
</head>

<body>
    <!-- -->
    <form action="../php/update/updateStudent/updateStudentList.php" method="post" enctype="multipart/form-data" novalidate autocomplete="off">
        <div class="basic-info">
            <div class="topname">
                Student Informaition
            </div>
            <div class="myinfo-container">
                <div class="info-photo">
                    <div class="intro">Profile Picture</div>
                    <div class="myimg">
                        <div class="circleline" id="imageContainer">
                            <img src="../<?php echo "$detail_s_imageSrc"; ?>" alt="Student photo" id="uploadedImage">
                            <!-- <span><?php //echo "$detail_s_imageSrc";
                                        ?></span> -->
                        </div>
                        <div class="upload-file">
                            <label for="uploadimage" class="label-uploadphoto">
                                <div class="outerline-uploadphoto">
                                    <div class="innerline-uploadphoto">
                                        Upload Image
                                    </div>
                                </div>
                            </label>
                            <input type="file" id="uploadimage" accept="image/*" name="photo" oninput="checkChanges()" onchange="displayImage(this,'<?php echo $detail_s_imageSrc; ?>');">
                        </div>
                    </div>
                </div>
                <div class="info-me">
                    <div class="intro">Basic Information</div>
                    <table>
                        <tr>
                            <td>Name</td>
                            <td><input type="text" id="input-clicked1" name="s-name" oninput="checkChanges()" onfocus="addBottomBorder(1);" onblur="removeBottomBorder(1)" value="<?php if (isset($detail_s_name)) echo $detail_s_name; ?>"></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><input type="text" id="input-clicked2" name="s-address" oninput="checkChanges()" onfocus="addBottomBorder(2);" onblur="removeBottomBorder(2)" value="<?php if (isset($detail_s_address)) echo "$detail_s_address"; ?>"></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td><?php if (isset($detail_s_gender)) echo "$detail_s_gender"; ?></td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td><?php if (isset($dob)) echo "$dob"; ?> A.D</td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td><input type="number" id="input-clicked3" name="s-contact" oninput="checkChanges()" onfocus="addBottomBorder(3);" onblur="removeBottomBorder(3)" value="<?php if (isset($detail_s_contact)) echo "$detail_s_contact"; ?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td id="email"><?php if (isset($detail_s_email)) echo "$detail_s_email"; ?></td>
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
                            <td><?php if (isset($detail_s_class)) echo "$detail_s_class"; ?></td>
                        </tr>
                        <tr>
                            <td>Section</td>
                            <td><?php if (isset($detail_s_section)) echo "$detail_s_section"; ?></td>
                        </tr>
                        <tr>
                            <?php
                            require_once "../teacher/php/attendance/countAttendance.php";
                            ?>
                            <td>Attendance</td>
                            <td><?php if (isset($result['student_attendance'], $no['totalNum'])) echo $result['student_attendance'] . "/" . $no['totalNum']; ?></td>
                        </tr>
                    </table>



                    <div class="intro">Parent Information</div>
                    <table>
                        <tr>
                            <td>Father's Name</td>
                            <td><input type="text" id="input-clicked4" name="sf-name" oninput="checkChanges()" onfocus="addBottomBorder(4);" onblur="removeBottomBorder(4)" value="<?php if (isset($detail_s_father_name)) echo "$detail_s_father_name"; ?>"></td>
                        </tr>
                        <tr>
                            <td>Mother's Name</td>
                            <td><input type="text" id="input-clicked5" name="sm-name" oninput="checkChanges()" onfocus="addBottomBorder(5);" onblur="removeBottomBorder(5)" value="<?php if (isset($detail_s_mother_name)) echo "$detail_s_mother_name"; ?>"></td>
                        </tr>
                        <tr>
                            <td>Parent's Contact</td>
                            <td><input type="number" id="input-clicked6" name="sp-contact" oninput="checkChanges()" onfocus="addBottomBorder(6);" onblur="removeBottomBorder(6)" value="<?php if (isset($detail_s_parents_contact)) echo "$detail_s_parents_contact"; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="irregular-profile"><button type="submit" id="updateButton" onclick="updateStudentForm()">Update</button></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>


    </form>
    <script src="../js/admin-studentprofiles.js"></script>
    <script src="../js/admin-studentprofiles-update.js"></script>
</body>

</html>
<?php
// unset($_SESSION['target_s_email']);
?>