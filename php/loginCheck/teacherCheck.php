<?php
if($_SESSION['loggedIn']!= true){
  header("location: ../../");
  exit();
  }else
?>