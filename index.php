<?php
require_once "php/config/sessionStart.php";
require_once "php/config/db.php";
if ($_SESSION['loggedIn'] === true) {
  if ($_SESSION['userType'] === 'admin') {
    header("location: admin/admin.php");
    exit();
  } else if ($_SESSION['userType'] === 'student') {
    header("location: student/html/dashboard.php");
    exit();
  } else if ($_SESSION['userType'] === 'teacher') {
    header("location: teacher/html/dashboard.php");
    exit();
  } else {
    echo "error";
  }
} else {
  if (isset($_COOKIE['session_id'])) {
    $sessionId = $_COOKIE['session_id'];
    $sql = "select * from user_type where sessionId='$sessionId'";
    $exesql = mysqli_query($con, $sql);
    if (mysqli_num_rows($exesql) > 0) {
      $result = mysqli_fetch_assoc($exesql);
      $checkRole = $result['role'];
      $_SESSION['loggedIn'] = true;
      $sessionId = uniqid();
      $c_email = $result['email'];
      $updateSessionId = "UPDATE user_type set `sessionId`='$sessionId' where email='$c_email'";
      mysqli_query($con, $updateSessionId);
      setcookie("session_id", $sessionId, time() + 60 * 60 * 24 * 60, "/");
      if ($checkRole == 0) {
        $_SESSION['userType'] = "admin";
        $_SESSION['userName'] = $result['name'];
        $_SESSION['userEmail'] = $result['email'];
        header("location: admin/admin.php");
        exit();
      } else if ($checkRole == 1) {
        $_SESSION['userType'] = "teacher";
        $_SESSION['userName'] = $result['name'];
        $_SESSION['userEmail'] = $result['email'];
        header("location: teacher/html/dashboard.php");
        exit();
      } else if ($checkRole == 2) {
        $_SESSION['userType'] = "student";
        $_SESSION['userName'] = $result['name'];
        $_SESSION['userEmail'] = $result['email'];
        $studentSql = "select * from student_table where email='$c_email'";
        if ($studentExe = mysqli_query($con, $studentSql)) {
          if (mysqli_num_rows($studentExe) > 0) {
            if ($studentResult = mysqli_fetch_assoc($studentExe)) {
              $_SESSION['userClass'] = $studentResult['class'];
              $_SESSION['userSection'] = $studentResult['section'];
            }
          }
        }
        header("location: student/html/dashboard.php");
      } else {
        header("location: index.php");
      }
    }
  } else
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="css/login-style.css" />
    <script src="https://kit.fontawesome.com/5b5ba54d82.js" crossorigin="anonymous"></script>
  </head>

  <body>
    <form action="php/validate/login.php" method="post" onsubmit="return validateForm(event)" novalidate>
      <div class="login-box">
        <div class="profile-logo">
          <i class="fa-solid fa-user" style="color: #000000"></i>
        </div>
        <div class="title">Login Portal</div>
        <div class="email">
          <!-- email filed -->
          <input type="email" spellcheck="false" placeholder="Email Address" id="email" name="email" />
          <div class="email-error error"></div>
        </div>
        <div class="password">
          <!-- password field -->
          <input type="password" placeholder="Password" id="password" name="password" />
          <div class="password-error error"></div>
        </div>
        <div class="show-part">
          <input type="checkbox" id="show" onclick="myFunction()" />
          <label for="show">Show password</label>
        </div>
        <div class="login">
          <!-- login button -->
          <button class="login-btn" type="submit" name="login-submit">LOGIN</button>
        </div>
      </div>
    </form>
    <script src="js/login-show.js"></script>
    <script src="js/login-validation.js"></script>
  </body>

  </html>

<?php
}
?>