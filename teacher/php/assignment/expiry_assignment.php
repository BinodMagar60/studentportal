<?php
// $currentdate= date("m-d");
// $expirydate="04-16";
// // echo $currentdate;
// // echo $expirydate;
// if ($currentdate == $expirydate) {
// $sql_assignment= "SELECT * FROM assignments";
// $exesql_assignment= mysqli_query($con,$sql_assignment);
// if(mysqli_num_rows($exesql_assignment)!=0){
//   while($result_assignment=mysqli_fetch_assoc($exesql_assignment)){
//       $uid=$result_assignment['id'];
//       $assignment_check_sql= "SELECT * from student_assignment_upload";
//   if($assignment_check_exe=mysqli_query($con,$assignment_check_sql)){
//     if(mysqli_num_rows($assignment_check_exe)>0){
//       while($assignment_check_res=mysqli_fetch_assoc($assignment_check_exe)){
//         $filePath="../../".$assignment_check_res['file_path'];
//         if (file_exists($filePath)) {
//           if (unlink($filePath)) {
//               // echo "File deleted successfully.";
//           } else {
//               // echo "Unable to delete the file.";
//           }
//       } else {
//           // echo "File does not exist.";
//       }
//       }
//     }}
//       $sql_delete="DELETE FROM assignments where id='$uid'";
//       mysqli_query($con,$sql_delete);
//   }}
// }
?>
