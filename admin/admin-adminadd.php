<?php
require_once "../php/config/sessionStart.php";
require_once "../php/loginCheck/adminCheck.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Admin</title>
    <link rel="stylesheet" href="../css/admin-adminadd-style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.0.1/remixicon.css" integrity="sha512-ZH3KB6wI5ADHaLaez5ynrzxR6lAswuNfhlXdcdhxsvOUghvf02zU1dAsOC6JrBTWbkE1WNDNs5Dcfz493fDMhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="adminadd">
        <form id="adminForm" enctype="multipart/form-data" novalidate>
            <fieldset>
                <legend>Add New Profile</legend>
                <table id="tablebox">
                    <tr>
                        <td colspan="3" class="title title1">Admin Details</td>
                    </tr>
                    <tr>
                        <td>Full Name</td>
                        <td><input type="text" id="a-name" name="a-name" class="a-name" placeholder="Full Name"></td>
                        <td class="error e-name"></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><input type="text" id="a-address" name="a-address" class="a-address" placeholder="Address"></td>
                        <td class="error e-address"></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td class="irregular">
                            <input type="radio" id="a-male" name="gender" class="a-male" value="male" checked><label for="a-male">Male</label>
                            <input type="radio" id="a-female" name="gender" class="a-female" value="female"><label for="a-female" class="irregular-1">Female</label>
                        </td>
                    </tr>
                    <tr>
                        <td>D.O.B</td>
                        <td><input type="date" name="a-dob" id="a-dob" class="a-dob"></td>
                        <td class="error e-date"></td>
                    </tr>
                    <tr>
                        <td>Contact No.</td>
                        <td><input type="number" id="a-contact" name="a-contact" class="a-contact" placeholder="Contact"></td>
                        <td class="error e-contact"></td>
                    </tr>
                    <tr>
                        <td>E-mail Address</td>
                        <td><input type="email" id="a-mail" name="a-mail" class="a-mail" placeholder="E-mail"></td>
                        <td class="error e-email"></td>
                    </tr>
                    <tr>
                        <td>Login Password</td>
                        <td>
                            <input type="text" id="a-password" name="a-password" class="a-password" placeholder="Password">
                        </td>
                        <td class="error e-password"></td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><input type="file" accept="image/*" id="a-photo" name="photo" onchange="checkFileTypeAdmin()"></td>
                        <td class="error e-image"></td>
                    </tr>


                </table>
                <button type="submit" class="submit-btn" name="a_submit" onclick="submitAdminForm(event);">submit</button>

            </fieldset>
        </form>
    </div>
    <div class="popupbox2" id="popupbox2">
        <div class="logo-update"><i class="fa-regular fa-circle-check" style="color: #00ff40;"></i></div>
        <div class="successfullyUpdated">Successfully Added</div>
    </div>

    <script src="../js/admin-adminadd-php.js"></script>
</body>

</html>