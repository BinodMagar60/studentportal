<?php
require_once "../config/db.php";
$recentlyAdded_sql="SELECT * FROM user_type ORDER BY id DESC LIMIT 7";
if($recentlyAdded_exe=mysqli_query($con,$recentlyAdded_sql)){
  if(mysqli_num_rows($recentlyAdded_exe)){
  while($recentlyAdded_row=mysqli_fetch_assoc($recentlyAdded_exe)){
?>
<span><?php echo $recentlyAdded_row['name'];?>  </span><span><?php echo $recentlyAdded_row['email'];?></span><br>
    <?php
  }
}else{
  echo "no data";
}
}else{
  echo "sql error";
}
?>