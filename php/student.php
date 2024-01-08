<?php
include "config/sessionStart.php";
if(isset($_SESSION['userType'])){
echo "student homepage ".$_SESSION['userType'].' '.$_SESSION['userName'];
}else{
  echo 'not set';
}
?>