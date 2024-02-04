<?php
$currentdate= date("Y-m-d");
// echo $currentdate;
$sql_announcement= "SELECT * FROM announcements ORDER BY exp_date ASC";
$exesql_announcement= mysqli_query($con,$sql_announcement);
if(mysqli_num_rows($exesql_announcement)!=0){
  while($result_announcement=mysqli_fetch_assoc($exesql_announcement)){
    if ($currentdate > $result_announcement['exp_date']) {
      $uid=$result_announcement['id'];
      // echo "<br>".$result_announcement['exp_date']."announcement expired<br>";
      //delete query for deletion of expired announcement.
      $sql_delete="DELETE FROM announcements where id='$uid'";
      mysqli_query($con,$sql_delete);
  }else{
    // echo "<br>".$result_announcement['exp_date']."<br>not expired<br>";
  }
  }}
?>
