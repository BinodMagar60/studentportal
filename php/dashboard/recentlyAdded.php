<table id="tableRecent">
  <tr>
    <td>S.N</td>
    <td>Name</td>
    <td>Email</td>
    <td>Role</td>
    <td>Action</td>
  </tr>
<?php
require_once "../config/db.php";
$recentlyAdded_sql="SELECT * FROM user_type ORDER BY id DESC";

$i=0;
if($recentlyAdded_exe=mysqli_query($con,$recentlyAdded_sql)){
  if(mysqli_num_rows($recentlyAdded_exe)){
  while($recentlyAdded_row=mysqli_fetch_assoc($recentlyAdded_exe)){
    $i+=1;
?>
<tr>
  <td><?php echo $i?></td>
  <td><?php echo $recentlyAdded_row['name'];?></td>
  <td><?php echo $recentlyAdded_row['email'];?></td>
  <td></td>
  <td><a href="#"><button>Show</button></a></td>
</tr>

    <?php
  }
}else{
  echo "no data";
}
}else{
  echo "sql error";
}
?>
</table>