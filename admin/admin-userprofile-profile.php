<?php
require_once "../php/config/sessionStart.php";
require_once "../php/loginCheck/adminCheck.php";
require_once "../php/config/AdminProfile.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/admin-userprofile-profile-style.css">
</head>

<body>
  <!-- -->
  <form action="../php/update/updateAdmin.php" method="post" enctype="multipart/form-data" novalidate autocomplete="off">
    <div class="basic-info">
      <div class="topname">
        My Account
      </div>
      <div class="myinfo-container">
        <div class="info-photo">
          <div class="intro">Profile Picture</div>
          <div class="myimg">
            <div class="circleline" id="imageContainer">
              <img src="../<?php echo "$adminImage"; ?>" alt="admin photo" id="uploadedImage">
            </div>
            <div class="upload-file">
              <label for="uploadimage" class="label-uploadphoto">
                <div class="outerline-uploadphoto">
                  <div class="innerline-uploadphoto">
                    Upload Image
                  </div>
                </div>
              </label>
              <input type="file" accept="image/*" id="uploadimage" name="photo" oninput="checkChanges()" onchange="displayImage(this,'<?php echo $adminImage; ?>');">
            </div>
          </div>
        </div>
        <div class="info-me">
          <div class="intro">Basic Information</div>
          <table>
            <tr>
              <td>Name</td>
              <td><input type="text" id="input-clicked1" name="a-name" oninput="checkChanges()" onfocus="addBottomBorder(1);" onblur="removeBottomBorder(1)" value="<?php if (isset($adminName)) echo "$adminName"; ?>"></td>
            </tr>
            <tr>
              <td>Address</td>
              <td><input type="text" id="input-clicked2" name="a-address" oninput="checkChanges()" onfocus="addBottomBorder(2);" onblur="removeBottomBorder(2)" value="<?php if (isset($address)) echo "$address"; ?>"></td>
            </tr>
            <tr>
              <td>Gender</td>
              <td><?php if (isset($gender)) echo "$gender"; ?></td>
            </tr>
            <tr>
              <td>Date of Birth</td>
              <td><?php if (isset($dob)) echo "$dob"; ?> A.D</td>
            </tr>
            <tr>
              <td>Contact</td>
              <td><input type="number" id="input-clicked3" name="a-contact" oninput="checkChanges()" onfocus="addBottomBorder(3);" onblur="removeBottomBorder(3)" value="<?php if (isset($contact)) echo "$contact"; ?>"></td>
            </tr>
            <tr>
              <td>Email</td>
              <td id="email"><?php if (isset($email)) echo "$email"; ?></td>
            </tr>
            <tr>
              <td>User Type</td>
              <td><?php if (isset($userType)) echo "$userType"; ?></td>
            </tr>
            <tr>
              <td></td>
              <td class="irregular-profile"><button type="submit" id="updateButton" onclick="updateForm()">Update</button></td>
            </tr>
          </table>


        </div>
      </div>

    </div>


  </form>
  <script src="../js/admin-userprofile.js"></script>
</body>

</html>