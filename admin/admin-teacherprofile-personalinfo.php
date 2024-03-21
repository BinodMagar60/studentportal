<?php
require_once "../php/config/sessionStart.php";
require_once "../php/loginCheck/adminCheck.php";
// require_once "../php/config/sessionStart.php";
require_once "../php/config/AdminProfile.php";
if (isset($_SESSION['target_t_email'])) {
  $target_t_email = $_SESSION['target_t_email'];
  $detail_query = "SELECT * FROM teacher_table where email='$target_t_email'";
  if ($exe_detail_query = mysqli_query($con, $detail_query)) {
    if (mysqli_num_rows($exe_detail_query) > 0) {
      while ($result_t_detail = mysqli_fetch_assoc($exe_detail_query)) {
        $detail_t_imageSrc = $result_t_detail['image'];
        $detail_t_name = $result_t_detail['name'];
        $detail_t_address = $result_t_detail['address'];
        $detail_t_contact = $result_t_detail['contact'];
        $detail_t_gender = $result_t_detail['gender'];
        $detail_t_email = $result_t_detail['email'];
        $detail_t_subject = $result_t_detail['subject'];

        $dateOfBirth = $result_t_detail['date_of_birth'];
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
  <link rel="stylesheet" href="../css/admin-teacher-personalinfo-style.css">
</head>

<body>
  <!-- -->
  <form action="../php/update/updateTeacher/updateTeacherList.php" method="post" enctype="multipart/form-data" novalidate autocomplete="off">
    <div class="basic-info">
      <div class="topname">
        Teacher Informaition
      </div>
      <div class="myinfo-container">
        <div class="info-photo">
          <div class="intro">Profile Picture</div>
          <div class="myimg">
            <div class="circleline" id="imageContainer">
              <img src="../<?php echo $detail_t_imageSrc; ?>" alt="Student photo" id="uploadedImage">
            </div>
            <div class="upload-file">
              <label for="uploadimage" class="label-uploadphoto">
                <div class="outerline-uploadphoto">
                  <div class="innerline-uploadphoto">
                    Upload Image
                  </div>
                </div>
              </label>
              <input type="file" id="uploadimage" accept="image/*" name="photo" oninput="checkChanges()" onchange="displayImage(this,'<?php echo $detail_t_imageSrc; ?>');">
            </div>
          </div>
        </div>
        <div class="info-me">
          <div class="intro">Basic Information</div>
          <table>
            <tr>
              <td>Name</td>
              <td><input type="text" id="input-clicked1" name="t-name" oninput="checkChanges()" onfocus="addBottomBorder(1);" onblur="removeBottomBorder(1)" value="<?php if (isset($detail_t_name)) echo "$detail_t_name"; ?>"></td>
            </tr>
            <tr>
              <td>Address</td>
              <td><input type="text" id="input-clicked2" name="t-address" oninput="checkChanges()" onfocus="addBottomBorder(2);" onblur="removeBottomBorder(2)" value="<?php if (isset($detail_t_address)) echo "$detail_t_address"; ?>"></td>
            </tr>
            <tr>
              <td>Gender</td>
              <td><?php if (isset($detail_t_gender)) echo "$detail_t_gender"; ?></td>
            </tr>
            <tr>
              <td>Date of Birth</td>
              <td><?php if (isset($dob)) echo "$dob"; ?> A.D</td>
            </tr>
            <tr>
              <td>Contact</td>
              <td><input type="number" id="input-clicked3" name="t-contact" oninput="checkChanges()" onfocus="addBottomBorder(3);" onblur="removeBottomBorder(3)" value="<?php if (isset($detail_t_contact)) echo "$detail_t_contact"; ?>"></td>
            </tr>
            <tr>
              <td>Email</td>
              <td id="email"><?php if (isset($detail_t_email)) echo "$detail_t_email"; ?></td>
            </tr>
            <tr>
              <td>User Type</td>
              <td>Teacher</td>
            </tr>
            <tr>
              <td>Assigned Subject</td>
              <td><?php if (isset($detail_t_subject)) echo "$detail_t_subject"; ?></td>
            </tr>
            <tr>
              <td></td>
              <td class="irregular-profile"><button type="submit" id="updateButton" onclick="updateTeacherForm()">Update</button></td>
            </tr>
          </table>
        </div>
      </div>

    </div>


  </form>
  <script src="../js/admin-studentprofiles.js"></script>
  <script src="../js/admin-teacherprofiles-update.js"></script>
</body>

</html>