<?php
$image_save= "StudentPortalFiles/images/";
$filepath="../../../StudentPortalFiles";
$imageSavePath=$filepath."/images";
if(!is_dir($filepath)){
  if(mkdir($filepath,0755,true)){
    if(!is_dir($imageSavePath)){
      if(mkdir($imageSavePath,0755,true)){
      }else{
        // echo "error";
      }
    }else{
      // echo "folder already exists";
    }
  }else{
    // echo "error";
  }
}else{
  // echo "folder already exists";
}

?>