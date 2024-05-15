<?php
require_once "../php/config/sessionStart.php";
require_once "../php/loginCheck/adminCheck.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/admin-studentprofile-setting-style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css" integrity="sha512-dUOcWaHA4sUKJgO7lxAQ0ugZiWjiDraYNeNJeRKGOIpEq4vroj1DpKcS3jP0K4Js4v6bXk31AAxAxaYt3Oi9xw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="overlay" id="overlay"></div>
  <form action="../php/update/updateAdmin/updateAdminListPassword.php" method="post" enctype="multipart/form-data" novalidate autocomplete="off">
    <div class="change-password">
      <div class="topname">
        Change Password
      </div>
      <div class="password-contents">
        <div class="label-password">New Password</div>
        <div class="changepassword"><input id="new-password" type="Text" name="npassword"></div>
        <div class="label-password label-password2">Re-enter Password</div>
        <div class="changepassword"><input id="re-enterpassword" type="text" name="rnpassword"></div>
        <div class="update-btn"><button type="submit" id="updateButton" onclick="updatePassword(event)">Confirm</button></div>
        <div class="error"></div>
        <div class="error2"></div>
      </div>
    </div>
    <?php
if(isset($_SESSION['target_a_email'])){
  $checkEmail=$_SESSION['target_a_email'];
  if($checkEmail=="admin@gmail.com"){
  }else{
    ?>
    <div class="toDelete">
      <a onclick="deletePopup();">Delete Account</a>
      <div class="popup_box" id="popup_box">
        <div class="logo-error">
          <i class="ri-error-warning-fill"></i>
        </div>
        <div class="error-txt">Are you sure you want to delete this account?</div>
        <div class="buttons"><a style="color:white; text-decoration:none;" href="../php/delete/AdminListDelete.php"><button type="button">Delete</button></a><button type="button" onclick="cancelPopup();">Cancel</button></div>
      </div>
    </div>
    <?php
  }}
?>
  </form>

  <script src="../js/admin-userprofile-setting.js"></script>
  <script src="../js/admin-studentprofiles.js"></script>

</body>

</html>