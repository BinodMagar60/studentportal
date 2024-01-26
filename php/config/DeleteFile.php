<?php
$realFilePath="../../$filePath";
if (file_exists($realFilePath)) {
    if (unlink($realFilePath)) {
        // echo 'File deleted successfully.';
    } else {
        echo 'Unable to delete the file.';
    }
} else {
    echo 'File does not exist.';
}
?>
