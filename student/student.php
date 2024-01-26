<?php
include "../php/config/sessionStart.php";
if(isset($_SESSION['userType'])){
echo "student homepage ".$_SESSION['userType'].' '.$_SESSION['userName'];
?>
<a href="../php/validate/logout.php">logout</a>
<?php
}else{
  echo 'not set';
}
?>