<?php
$currentdate= date("Y-m-d");
$sql_assignment= "SELECT * FROM assignments ORDER BY exp_date ASC";
$exesql_assignment= mysqli_query($con,$sql_assignment);
if(mysqli_num_rows($exesql_assignment)!=0){
  while($result_assignment=mysqli_fetch_assoc($exesql_assignment)){
    if ($currentdate > $result_assignment['exp_date']) {
      $uid=$result_assignment['id'];
      $sql_delete="DELETE FROM assignments where id='$uid'";
      mysqli_query($con,$sql_delete);
  }else{
  }
  }}
?>
