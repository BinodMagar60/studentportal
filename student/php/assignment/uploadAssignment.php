<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
  if(isset($_FILES['assignment'])){
    if(isset($_SESSION['userEmail'])){
      // $userName=$_SESSION['userName'];
      $userEmail=$_SESSION['userEmail'];
      $sql= "SELECT * FROM student_table where email='$userEmail'";
      if($exesql=mysqli_query($con,$sql)){
        if(mysqli_num_rows($exesql)>0){
          if($result=mysqli_fetch_assoc($exesql)){
            $name=$result['name'];
          }else{
            echo "fetch error";
          }
        }else{
          // echo "no result found";
        }
      }else{
        echo "query error";
      }
    }
      // $uploader=$_SESSION['userName'];
      // $class=$_POST['class_n'];
      // $section=$_POST['section_n'];
      // $subject=$_POST['subject_n'];
      // $savePathNote="StudentPortalFiles/Notes/";
      // $countFiles=count($_FILES['note']['name']);
      // $allowed_types = array(
      //           'image/jpeg',
      //           'image/jpg',
      //           'image/png',
      //           'image/gif',
      //           'application/pdf',
      //           'text/xml',
      //           'application/msword',
      //           'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
      //           'text/plain',
      //           'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
      //           'application/vnd.openxmlformats-officedocument.presentationml.presentation',
      //           'application/vnd.ms-powerpoint'
      //       );
      // for($i=0;$i<$countFiles;$i++){
      //   $filetype=$_FILES['note']['type'][$i];
      //   // echo $filetype."<br>";
      //   if(in_array($filetype,$allowed_types)){
      //     $tempName=$_FILES['note']['tmp_name'][$i];
      //     $fileName=basename($_FILES['note']['name'][$i]);
      //     $ext=pathinfo($fileName,PATHINFO_EXTENSION);
      //   $dest=$savePathNote.uniqid().".".$ext;
      //   if(move_uploaded_file($tempName,"../../../".$dest)){
      //     $insertFile="INSERT into teacher_upload_notes (`name`,`file_path`,`class`,`section`,`subject`,`uploader`) values ('$fileName','$dest','$class','$section','$subject','$uploader')";
      //     if(mysqli_query($con,$insertFile)){
      //       echo "success";
      //     }
      //   }else{
      //     echo "upload error";
      //   }
      //   }else{
      //     echo "invalid format";
      //   }
      // }
    // }else{
    //   echo "no session";
    // }
  }else{
    echo "not set";
  }
}else{
  echo "not submitted";
}

?>