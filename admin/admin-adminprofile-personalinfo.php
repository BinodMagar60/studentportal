<?php
require_once "../php/config/sessionStart.php";
require_once "../php/loginCheck/adminCheck.php";
// require_once "../php/config/sessionStart.php";
require_once "../php/config/AdminProfile.php";
if (isset($_SESSION['target_a_email'])) {
  $target_a_email = $_SESSION['target_a_email'];
  $detail_query = "SELECT * FROM admin_table where email='$target_a_email'";
  if ($exe_detail_query = mysqli_query($con, $detail_query)) {
    if (mysqli_num_rows($exe_detail_query) > 0) {
      while ($result_a_detail = mysqli_fetch_assoc($exe_detail_query)) {
        $detail_a_imageSrc = $result_a_detail['image'];
        $detail_a_name = $result_a_detail['name'];
        $detail_a_address = $result_a_detail['address'];
        $detail_a_contact = $result_a_detail['contact'];
        $detail_a_gender = $result_a_detail['gender'];
        $detail_a_email = $result_a_detail['email'];

        $dateOfBirth = $result_a_detail['date_of_birth'];
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
  echo "session target t email not set";
}

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
  <form action="../php/update/updateAdmin/updateAdminList.php" method="post" enctype="multipart/form-data" novalidate autocomplete="off">
    <div class="basic-info">
      <div class="topname">
        Admin Profile
      </div>
      <div class="myinfo-container">
        <div class="info-photo">
          <div class="intro">Profile Picture</div>
          <div class="myimg">
            <div class="circleline" id="imageContainer">
              <img src="../<?php echo "$detail_a_imageSrc"; ?>" alt="admin photo" id="uploadedImage">
            </div>
            <div class="upload-file">
              <label for="uploadimage" class="label-uploadphoto">
                <div class="outerline-uploadphoto">
                  <div class="innerline-uploadphoto">
                    Upload Image
                  </div>
                </div>
              </label>
              <input type="file" id="uploadimage" accept="image/*" name="photo" oninput="checkChanges()" onchange="displayImage(this,'<?php echo $detail_a_imageSrc; ?>');">
            </div>
          </div>
        </div>
        <div class="info-me">
          <div class="intro">Basic Information</div>
          <table>
            <tr>
              <td>Name</td>
              <td><input type="text" id="input-clicked1" name="a-name" oninput="checkChanges()" onfocus="addBottomBorder(1);" onblur="removeBottomBorder(1)" value="<?php if (isset($detail_a_name)) echo "$detail_a_name"; ?>"></td>
            </tr>
            <tr>
              <td>Address</td>
              <td><input type="text" id="input-clicked2" name="a-address" oninput="checkChanges()" onfocus="addBottomBorder(2);" onblur="removeBottomBorder(2)" value="<?php if (isset($detail_a_address)) echo "$detail_a_address"; ?>"></td>
            </tr>
            <tr>
              <td>Gender</td>
              <td><?php if (isset($detail_a_gender)) echo "$detail_a_gender"; ?></td>
            </tr>
            <tr>
              <td>Date of Birth</td>
              <td><?php if (isset($dob)) echo "$dob"; ?> A.D</td>
            </tr>
            <tr>
              <td>Contact</td>
              <td><input type="number" id="input-clicked3" name="a-contact" oninput="checkChanges()" onfocus="addBottomBorder(3);" onblur="removeBottomBorder(3)" value="<?php if (isset($detail_a_contact)) echo "$detail_a_contact"; ?>"></td>
            </tr>
            <tr>
              <td>Email</td>
              <td id="email"><?php if (isset($detail_a_email)) echo "$detail_a_email"; ?></td>
            </tr>
            <tr>
              <td>User Type</td>
              <td>Admin</td>
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