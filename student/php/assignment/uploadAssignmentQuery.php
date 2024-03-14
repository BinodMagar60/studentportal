<?php
 $savePathAssignment="StudentPortalFiles/Assignments/";
 $countFiles=count($_FILES['assignment']['name']);
 $allowed_types = array(
           'image/jpeg',
           'image/jpg',
           'image/png',
           'image/gif',
           'application/pdf',
           'text/xml',
           'application/msword',
           'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
           'text/plain',
           'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
           'application/vnd.openxmlformats-officedocument.presentationml.presentation',
           'application/vnd.ms-powerpoint'
       );
 for($i=0;$i<$countFiles;$i++){
   $filetype=$_FILES['assignment']['type'][$i];
   // echo $filetype."<br>";
   if(in_array($filetype,$allowed_types)){
     $tempName=$_FILES['assignment']['tmp_name'][$i];
     $fileName=basename($_FILES['assignment']['name'][$i]);
     $ext=pathinfo($fileName,PATHINFO_EXTENSION);
   $dest=$savePathAssignment.uniqid().".".$ext;
   if(move_uploaded_file($tempName,"../../../".$dest)){
$insertFile="INSERT into student_assignment_upload (`email`,`assignment_id`,`file_name`,`file_path`,`status`) values ('$userEmail',$uid,'$fileName','$dest','Pending')";
     if(mysqli_query($con,$insertFile)){
       echo "success";
     }
   }else{
     echo "upload error";
   }
   }else{
     echo "invalid format";
   }
    }  
 ?>