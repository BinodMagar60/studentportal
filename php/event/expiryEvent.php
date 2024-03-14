<?php
$currentdate= date("m-d");
$expirydate="04-16";
if ($currentdate == $expirydate) {
$sql_notice= "SELECT * FROM notice";
$exesql_notice= mysqli_query($con,$sql_notice);
if(mysqli_num_rows($exesql_notice)!=0){
  while($result_notice=mysqli_fetch_assoc($exesql_notice)){
      $uid=$result_notice['id'];
      $sql_delete="DELETE FROM notice where id='$uid'";
      mysqli_query($con,$sql_delete);
  }
}
}
?>
