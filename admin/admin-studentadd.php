<?php
require_once "../php/config/sessionStart.php";
require_once "../php/loginCheck/adminCheck.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new student</title>
    <link rel="stylesheet" href="../css/admin-studentadd-style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.0.1/remixicon.css" integrity="sha512-ZH3KB6wI5ADHaLaez5ynrzxR6lAswuNfhlXdcdhxsvOUghvf02zU1dAsOC6JrBTWbkE1WNDNs5Dcfz493fDMhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- error putting onsubmit -->
    <!-- onsubmit="adminStudentAdd(event)" -->
    <div class="studentadd">
        <form id="studentForm" enctype="multipart/form-data" novalidate autocomplete="off">
            <fieldset>
                <legend>Add New Profile</legend>

                <table id="tablebox">
                    <tr>
                        <td colspan="3" class="title title1">Student Details</td>
                    </tr>
                    <tr>
                        <td>Full Name</td>
                        <td><input type="text" id="s-name" name="s-name" class="s-name" placeholder="Full Name"></td>
                        <td class="error e-name"></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><input type="text" id="s-address" name="s-address" class="s-address" placeholder="Address"></td>
                        <td class="error e-address"></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td class="irregular">
                            <input type="radio" id="s-male" name="gender" class="s-male" value="male" checked><label for="s-male">Male</label>
                            <input type="radio" id="s-female" name="gender" class="s-female" value="female"><label for="s-female" class="irregular-1">Female</label>
                        </td>
                    </tr>
                    <tr>
                        <td>D.O.B</td>
                        <td><input type="date" name="s-dob" id="s-dob" class="s-dob"></td>
                        <td class="error e-date"></td>
                    </tr>
                    <tr>
                        <td>Contact No.</td>
                        <td><input type="number" id="s-contact" name="s-contact" class="s-contact" placeholder="Contact"></td>
                        <td class="error e-contact"></td>
                    </tr>
                    <tr>
                        <td>E-mail Address</td>
                        <td><input type="email" id="s-mail" name="s-mail" class="s-mail" placeholder="E-mail"></td>
                        <td class="error e-email"></td>
                    </tr>
                    <tr>
                        <td>Login Password</td>
                        <td>
                            <input type="text" id="s-password" name="s-password" class="s-password" placeholder="Password">
                        </td>
                        <td class="error e-password"></td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><input type="file" accept="image/*" id="s-photo" name="photo" onchange="checkFileType()"></td>
                        <td class="error e-image"></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="title">Parents Detail</td>
                    </tr>
                    <tr>
                        <td>Father's Name</td>
                        <td><input type="text" id="s-father" class="s-father" name="s-father" placeholder="Father's Name"></td>
                        <td class="error e-fname"></td>
                    </tr>
                    <tr>
                        <td>Mother's Name</td>
                        <td><input type="text" id="s-mother" class="s-mother" name="s-mother" placeholder="Mother's Name"></td>
                        <td class="error e-mname"></td>
                    </tr>
                    <tr>
                        <td>Parent's Contact</td>
                        <td><input type="number" id="s-parentcontact" class="s-parentcontact" name="s-parentcontact" placeholder="Parent's Contact No."></td>
                        <td class="error e-pcontact"></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="title">Acadamic Informaition</td>
                    </tr>
                    <tr>
                        <td><label for="classes">Class</label></td>
                        <td>
                            <select name="classes" id="classes">
                                <option value="one">One</option>
                                <option value="two">Two</option>
                                <option value="three">Three</option>
                                <option value="four">Four</option>
                                <option value="five">Five</option>
                                <option value="six">Six</option>
                                <option value="seven">Seven</option>
                                <option value="eight">Eight</option>
                                <option value="nine">Nine</option>
                                <option value="ten">Ten</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="sections">Section</label></td>
                        <td>
                            <select name="sections" id="sections">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                            </select>
                        </td>
                    </tr>

                </table>
                <button type="submit" class="submit-btn" name="s_submit" onclick="submitForm(event);">submit</button>

            </fieldset>
        </form>
    </div>
    <div class="popupbox" id="popupbox">
        <div class="logo-update"><i class="fa-regular fa-circle-check" style="color: #00ff40;"></i></div>
        <div class="successfullyUpdated">Successfully Added</div>
    </div>

    <script src="../js/admin-studentadd-php.js"></script>

   

</body>

</html>