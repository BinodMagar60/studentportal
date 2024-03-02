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
require_once "../../php/announcement/expiry_announcement.php";
require_once "../../php/config/sessionStart.php";
$userType=$_SESSION['userType'];
$userClass=$_SESSION['userClass'];
$userSection=$_SESSION['userSection'];
$sql_announcement= "SELECT * FROM announcements where (user_whom='everyone' or (user_whom='$userType' and (user_class='allclass' or (user_class='$userClass' and (user_section='allsection' or user_section='$userSection')))))";
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




</body>
</html>