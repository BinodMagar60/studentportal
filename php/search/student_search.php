<?php
require_once "../config/db.php";
  $class=$_GET['classes'];
  $section=$_GET['sections'];
$sql= "SELECT * FROM student_table WHERE class='$class' AND section='$section'";
if($exesql=mysqli_query($con,$sql)){
  if(mysqli_num_rows($exesql)>0){
  $i=0;
  ?>

<table border="2">
<tr>
  <th>S.N</th>
  <th>Name</th>
  <th>Email</th>
  <th>Action</th>
</tr>
<?php
  while($searchResult= mysqli_fetch_assoc($exesql)){
    $i+=1;
?>
<tr>
  <td><?php echo $i;?></td>
  <td><?php echo $searchResult['name'];?></td>
  <td><?php echo $searchResult['email'];?></td>
  <td><a href="#">View More Details</a></td>
</tr>


<?php
  }
  ?>
  </table>
  <?php
  }else{
    echo "no result found";
  }
}else{
  echo "query error";
}
?>