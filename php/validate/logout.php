<?php
session_start();
$_SESSION = array();
session_destroy();
if(isset($_COOKIE['session_id'])){
  $sessionId=$_COOKIE['session_id'];
  setcookie("session_id",$sessionId,time()-60*60*24*60, "/");
  unset($_COOKIE['session_id']);
}
header("Location: ../../index.php");
exit();
?>
