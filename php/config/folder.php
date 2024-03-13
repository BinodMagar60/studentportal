<?php
$image_save= "StudentPortalFiles/images/";
$filepath="../../StudentPortalFiles";
$imageSavePath=$filepath."/images";
$assignmentSavePath=$filepath."/Assignments";
$uploadNotesSavePath=$filepath."/Notes";
if(!is_dir($filepath)){
  if(mkdir($filepath,0755,true)){
  }else{
    // echo "error";
  }
}else{
  // echo "folder already exists";
}
if(!is_dir($imageSavePath)){
  if(mkdir($imageSavePath,0755,true)){
  }else{
    // echo "error";
  }
}else{
  // echo "folder already exists";
}
if(!is_dir($assignmentSavePath)){
  if(mkdir($assignmentSavePath,0755,true)){
  }else{
    // echo "error";
  }
}
if(!is_dir($assignmentSavePath)){
  if(mkdir($assignmentSavePath,0755,true)){
  }else{
    // echo "error";
  }
}
if(!is_dir($uploadNotesSavePath)){
  if(mkdir($uploadNotesSavePath,0755,true)){
    }
  }else{
    // echo "error";
  }
?>