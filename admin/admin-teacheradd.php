<?php
require_once "../php/config/sessionStart.php";
require_once "../php/loginCheck/adminCheck.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Teacher</title>
    <link rel="stylesheet" href="../css/admin-teacheradd-style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.0.1/remixicon.css" integrity="sha512-ZH3KB6wI5ADHaLaez5ynrzxR6lAswuNfhlXdcdhxsvOUghvf02zU1dAsOC6JrBTWbkE1WNDNs5Dcfz493fDMhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="teacheradd">
        <form id="teacherForm" enctype="multipart/form-data" novalidate>
            <fieldset>
                <legend>Add New Profile</legend>

                <table id="tablebox">
                    <tr>
                        <td colspan="3" class="title title1">Teacher Details</td>
                    </tr>
                    <tr>
                        <td>Full Name</td>
                        <td><input type="text" id="t-name" name="t-name" class="t-name" placeholder="Full Name"></td>
                        <td class="error e-name"></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><input type="text" id="t-address" name="t-address" class="t-address" placeholder="Address"></td>
                        <td class="error e-address"></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td class="irregular">
                            <input type="radio" id="t-male" name="gender" class="t-male" value="male" checked><label for="t-male">Male</label>
                            <input type="radio" id="t-female" name="gender" class="t-female" value="female"><label for="t-female" class="irregular-1">Female</label>
                        </td>
                    </tr>
                    <tr>
                        <td>D.O.B</td>
                        <td><input type="date" name="t-dob" id="t-dob" class="t-dob"></td>
                        <td class="error e-date"></td>
                    </tr>
                    <tr>
                        <td>Contact No.</td>
                        <td><input type="number" id="t-contact" name="t-contact" class="t-contact" placeholder="Contact"></td>
                        <td class="error e-contact"></td>
                    </tr>
                    <tr>
                        <td>E-mail Address</td>
                        <td><input type="email" id="t-mail" name="t-mail" class="t-mail" placeholder="E-mail"></td>
                        <td class="error e-email"></td>
                    </tr>
                    <tr>
                        <td>Login Password</td>
                        <td>
                            <input type="text" id="t-password" name="t-password" class="t-password" placeholder="Password">
                        </td>
                        <td class="error e-password"></td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><input type="file" accept="image/*" id="t-photo" name="photo" onchange="checkFileTypeTeacher()"></td>
                        <td class="error e-image" ></td>
                    </tr>
                    <tr>
                        <td><label for="t-subject">Assigined Subject</label></td>
                        <td>
                            <select name="t-subject" id="t-subject">
                                <option value="English">English</option>
                                <option value="Nepali">Nepali</option>
                                <option value="Maths">Maths</option>
                                <option value="Science">Science</option>
                                <option value="Social">Social</option>
                                <option value="Computer">Computer</option>
                                <option value="Accont">Account</option>
                            </select>
                        </td>
                    </tr>

                </table>
                <button type="submit" class="submit-btn" name="t_submit" onclick="submitTeacherForm(event);">submit</button>
            </fieldset>
        </form>
    </div>

    <div class="popupbox1" id="popupbox1">
        <div class="logo-update"><i class="fa-regular fa-circle-check" style="color: #00ff40;"></i></div>
        <div class="successfullyUpdated">Successfully Added</div>
    </div>
    <script src="../js/admin-teacheradd-php.js"></script>
</body>

</html>