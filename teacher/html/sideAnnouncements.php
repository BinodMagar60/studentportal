<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/sideAnnouncements-style.css">
</head>
<body>
    
<div class="announcement-show-1">
<?php
require_once "../../php/config/db.php";
require_once "../../php/config/sessionStart.php";
require_once "../../php/announcement/expiry_announcement.php";
$userType=$_SESSION['userType'];
$sql_announcement= "SELECT * FROM announcements where (user_whom='everyone' or user_whom='$userType')";
$exesql_announcement= mysqli_query($con,$sql_announcement);
if(mysqli_num_rows($exesql_announcement)!=0){
  while($result_announcement=mysqli_fetch_assoc($exesql_announcement)){

  $createdDate=$result_announcement['created_date'];
  $a_created_dateObject = date_create($createdDate);
  $a_created_formattedDate = date_format($a_created_dateObject, 'M d');
  ?>
  <div class="announcement-show-2">
  <div class="announcement-date"><?php if(isset($a_created_formattedDate)) echo $a_created_formattedDate;?></div>
  <div class="announcement-detail"><?php if(isset($result_announcement['a_description'])) echo $result_announcement['a_description']; ?></div>
  <div class="announcement-who">- <?php if(isset($result_announcement['poster_name'])) echo $result_announcement['poster_name']; ?></div>
  </div>
  <?php
}
}else{
  echo '<div style="text-align: center; width:100%; margin-top: 50px; color: white; font-size: 1.375rem; font-weight: 500;">No Announcements For Now.</div>';
}
?>
</div>

<div class="teacher-notify">
<?php
        require_once "../php/notify/expiry_notify.php";
$sql_notify="SELECT * from teacher_notify";
if($exesql_notify=mysqli_query($con,$sql_notify)){
if(mysqli_num_rows($exesql_notify)>0){
  while($result_notify=mysqli_fetch_assoc($exesql_notify)){
    $dbDate = $result_notify['created_date'];
    $dateObject = date_create($dbDate);
    $formattedDate = date_format($dateObject, 'M d');
    ?>
    
    <div class="notify-show-2">
  <div class="notify-date"><?php if(isset($formattedDate)) echo $formattedDate;?></div>
  <div class="notify-detail"><?php if(isset($result_notify['description'])) echo $result_notify['description']; ?></div>
  <div class="notify-who">- <?php if(isset($result_notify['poster_name'])) echo $result_notify['poster_name']; ?></div>
  </div>
 
 
 
 
 <?php
  }
}
}
?>
</div>



</body>
</html>