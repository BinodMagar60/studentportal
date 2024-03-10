<?php
if(isset($_GET['uid'],$_GET['path'])){
  require_once "../../../php/config/db.php";
  $uid=$_GET['uid'];
  $file_path= "../../../".$_GET['path'];
  $deleteNoteSql="DELETE from teacher_upload_notes where id =$uid";
if(mysqli_query($con,$deleteNoteSql)){
if (file_exists($file_path)) {
    if (unlink($file_path)) {
        echo "File deleted successfully.";
    } else {
        echo "Unable to delete the file.";
    }
} else {
    echo "File does not exist.";
}
}
}else{
  echo "not set";
}
?>