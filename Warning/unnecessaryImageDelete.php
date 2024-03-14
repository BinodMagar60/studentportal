<?php
require_once "../php/config/db.php";
$folderPath = "../StudentPortalFiles/images";
$sqlStudent = "SELECT * FROM student_table";
$sqlAdmin = "SELECT * FROM admin_table";
$sqlTeacher = "SELECT * FROM teacher_table";

$exesql1 = mysqli_query($con, $sqlStudent);
$exesql2 = mysqli_query($con, $sqlAdmin);
$exesql3= mysqli_query($con, $sqlTeacher);

$validStudentFilenames = array();
$validAdminFilenames = array();
$validTeacherFilenames = array();


while ($des1 = mysqli_fetch_assoc($exesql1)) {
    $images1 = $des1['image'];
    $imageName1 = substr($images1, 26);
    
    if (isset($imageName1)) {
        $validStudentFilenames[] = $imageName1;
    }else{
    //   echo "imageName1 not set";
    }
}

while ($des2 = mysqli_fetch_assoc($exesql2)) {
    $images2 = $des2['image'];
    $imageName2 = substr($images2, 26);
    
    if (isset($imageName2)) {
        $validAdminFilenames[] = $imageName2;
    }else{
    //   echo "imageName2 not set";
    }
}

while ($des3 = mysqli_fetch_assoc($exesql3)) {
    $images3 = $des3['image'];
    $imageName3 = substr($images3, 26);
    
    if (isset($imageName1)) {
        $validTeacherFilenames[] = $imageName3;
    }else{
    //   echo "imageName3 not set";
    }
}
$files = scandir($folderPath);
if ($files !== false) {
    foreach ($files as $file) {
        if ($file != "." && $file != "..") {
            if (!in_array($file, $validStudentFilenames)) {
            if (!in_array($file, $validAdminFilenames)) {
            if (!in_array($file, $validTeacherFilenames)) {
                $filePath = $folderPath . '/' . $file;
                
                if (unlink($filePath)) {
                    // echo "File '$file' deleted successfully.<br>";
                } else {
                    // echo "Error deleting file '$file'.<br>";
                }
            }}
            }else{
            //   echo "already done";
            }
        }
    }
}
?>