<?php
require_once "../config/db.php";
$userType="teacher";
// ORDER BY created_date ASC
$sql_announcement= "SELECT * FROM announcements where (user_whom='everyone' or user_whom='$userType')";
$exesql_announcement= mysqli_query($con,$sql_announcement);
if(mysqli_num_rows($exesql_announcement)!=0){
  while($result_announcement=mysqli_fetch_assoc($exesql_announcement)){
  $expDate = $result_announcement['exp_date'];
  $a_exp_dateObject = date_create($expDate);
  $a_exp_formattedDate = date_format($a_exp_dateObject, 'M d');

  $createdDate=$result_announcement['created_date'];
  $a_created_dateObject = date_create($createdDate);
  $a_created_formattedDate = date_format($a_created_dateObject, 'M d');
  ?>
  <span><?php if(isset($a_created_formattedDate)) echo $a_created_formattedDate;?></span><br>
  <span><?php if(isset($result_announcement['a_description'])) echo $result_announcement['a_description']; ?></span><br>
  <span><?php if(isset($a_exp_formattedDate)) echo $a_exp_formattedDate;?></span><br>
  <?php
}
}else{
  echo "no data";
}
?>