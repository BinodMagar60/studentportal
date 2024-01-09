<?php
require_once "php/config/sessionStart.php";
if($_SESSION['loggedIn']=== true){
if($_SESSION['userType']==='admin'){
    header("location: admin/admin.php");
    exit();
}else if($_SESSION['userType']==='student'){
  header("location: student/student.php");
  exit();
}else if($_SESSION['userType']==='teacher'){
  header("location: teacher/teacher.php");
  exit();
}else{
  echo "error";
}
}else{?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Login</title>
      <link rel="stylesheet" href="css/login-style.css" />
      <script
        src="https://kit.fontawesome.com/5b5ba54d82.js"
        crossorigin="anonymous"
      ></script>
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
            <input type="password" placeholder="Password" id="password" name="password"/>
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

