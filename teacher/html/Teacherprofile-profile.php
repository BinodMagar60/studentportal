<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/teacherCheck.php";
require_once "../../php/config/TeacherProfile.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/Teacherprofile-profile-style.css">
</head>

<body>
    <!-- -->
    <form action="" method="post" enctype="multipart/form-data" novalidate autocomplete="off">
        <div class="basic-info">
            <div class="topname">
                Teacher Informaition
            </div>
            <div class="myinfo-container">
                <div class="info-photo">
                    <div class="intro">Profile Picture</div>
                    <div class="myimg">
                        <div class="circleline" id="imageContainer">
                            <img src="../../<?php if (isset($teacherImage)) echo $teacherImage; ?>" alt="Teacher photo" id="uploadedImage">
                        </div>
                    </div>
                </div>
                <div class="info-me">
                    <div class="intro">Basic Information</div>
                    <table>
                        <tr>
                            <td>Name</td>
                            <td><?php if (isset($teacherName)) echo $teacherName; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?php if (isset($address)) echo $address; ?></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td><?php if (isset($gender)) echo $gender; ?></td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td><?php if (isset($dob)) echo $dob; ?></td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td><?php if (isset($contact)) echo $contact; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td id="email"><?php if (isset($email)) echo $email; ?></td>
                        </tr>
                        <tr>
                            <td>User Type</td>
                            <td>Teacher</td>
                        </tr>
                        <tr>
                            <td>Assigned Subject</td>
                            <td><?php if (isset($subject)) echo $subject; ?></td>
                        </tr>

                    </table>
                </div>
            </div>

        </div>


    </form>

</body>

</html>