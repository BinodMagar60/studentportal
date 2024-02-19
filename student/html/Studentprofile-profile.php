<?php
require_once "../../php/config/StudentProfile.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/Studentprofile-profile-style.css">
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
                        <div class="circleline"  id="imageContainer">
                          <img src="../../<?php if(isset($imageSrc)) echo $imageSrc;?>" alt="Student photo" id="uploadedImage">
                        </div>
                    </div>
                </div>
                <div class="info-me">
                  <div class="intro">Basic Information</div>
                    <table>
                        <tr>
                            <td>Name</td>
                            <td><?php if(isset($studentName)) echo $studentName;?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?php if(isset($address)) echo $address;?></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td><?php if(isset($gender)) echo $gender;?></td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td><?php if(isset($dob)) echo $dob;?></td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td><?php if(isset($contact)) echo $contact;?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td id="email"><?php if(isset($email)) echo $email;?></td>
                        </tr>
                        <tr>
                          <td>User Type</td>
                          <td><?php if(isset($userType)) echo $userType;?></td>
                        </tr>
                        
                        
                    </table>
                    <div class="intro">Acadamic Information</div>
                    <table>
                        <tr>
                            <td>Class</td>
                            <td><?php if(isset($class)) echo $class;?></td>
                        </tr>
                        <tr>
                            <td>Section</td>
                            <td><?php if(isset($section)) echo $section;?></td>
                        </tr>
                        <tr>
                            <td>Attendance</td>
                            <td>-</td>
                        </tr>
                    </table>
                    <div class="intro">Parent Information</div>
                    <table>
                        <tr>
                            <td>Father's Name</td>
                            <td><?php if(isset($father)) echo $father;?></td>
                        </tr>
                        <tr>
                            <td>Mother's Name</td>
                            <td><?php if(isset($mother)) echo $mother;?></td>
                        </tr>
                        <tr>
                            <td>Parent's Contact</td>
                            <td><?php if(isset($p_contact)) echo $p_contact;?></td>
                        </tr>
                    </table>
                </div>
            </div>
            
        </div>


    </form>
  
</body>
</html>