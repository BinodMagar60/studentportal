<?php
$currentdate= date("Y-m-d");
$sql_notify= "SELECT * FROM teacher_notify ORDER BY exp_date ASC";
$exesql_notify= mysqli_query($con,$sql_notify);
if(mysqli_num_rows($exesql_notify)!=0){
  while($result_notify=mysqli_fetch_assoc($exesql_notify)){
    if ($currentdate > $result_notify['exp_date']) {
      $uid=$result_notify['id'];
      $sql_delete="DELETE FROM teacher_notify where id='$uid'";
      mysqli_query($con,$sql_delete);
  }else{
  }
  }}
?>
