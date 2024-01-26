<?php
include "../php/config/sessionStart.php";
if(isset($_SESSION['userType'])){
echo "teacher homepage ".$_SESSION['userType'].' '.$_SESSION['userName'];
}else{
  echo 'not set';
}
?>