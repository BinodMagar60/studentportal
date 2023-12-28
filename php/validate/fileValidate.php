<?php
// Validate Image File
if (!empty($_FILES["photo"])) {
  if($_FILES['photo']['error']===0){
  $imageFile = $_FILES["photo"];
  $imageName= $_FILES['photo']['name'];
  $imageTmp=$_FILES['photo']['tmp_name'];
  $imageType=$_FILES['photo']['type'];
  $imageSize=$_FILES['photo']['size'];
  $imageError=$_FILES['photo']['error'];

      $imageExt=explode('.',$imageName);
      $ActualImageExt=strtolower(end($imageExt));
      $imageNewName=uniqid().".".$ActualImageExt;
          if($imageError===0){
      if(move_uploaded_file($imageTmp,$imageSavePath."/".$imageNewName)){
          $simage=$image_save.$imageNewName;
      }else{
          echo "error uploading files";
      }
  }
  }
  // $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
  // $maxFileSize = 2 * 1024 * 1024;

  // Check file type
  // if (!in_array($imageFile["type"], $allowedTypes)) {
  //     $errors["imagefile"] = "Invalid file type. Allowed types: JPEG, PNG, GIF";
  // }

  // Check file size
  // if ($imageFile["size"] > $maxFileSize) {
  //     $errors["imagefile"] = "File size exceeds the maximum allowed size (2 MB)";
  // }

  // Check image dimensions (optional)
  // Example: Check if the image is at least 300x300 pixels
  // $imageDimensions = getimagesize($imageFile["tmp_name"]);
  // $minWidth = 300;
  // $minHeight = 300;

  // if ($imageDimensions[0] < $minWidth || $imageDimensions[1] < $minHeight) {
  //     $errors["imagefile"] = "Image dimensions must be at least $minWidth x $minHeight pixels";
  // }
} else {
  $errors["imagefile"] = "Image file is required";
}
?>