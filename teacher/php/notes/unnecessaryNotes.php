<?php
$sql_assignment = "SELECT file_path FROM teacher_upload_notes";
$result = mysqli_query($con, $sql_assignment);

$files_in_db = [];
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $files_in_db[] = $row['file_path'];
    }
}

$directory = '../../StudentPortalFiles/Notes';

$files_in_directory = array_diff(scandir($directory), array('.', '..'));

$files_to_delete = array_diff($files_in_directory, $files_in_db);

foreach ($files_to_delete as $file) {
    $file_path = $directory . '/' . $file;
    if (is_file($file_path)) {
        if (unlink($file_path)) {
            // echo "Deleted $file_path<br>";
        } else {
            // echo "Error deleting $file_path<br>";
        }
    }
}
?>



