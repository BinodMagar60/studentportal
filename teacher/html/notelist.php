<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/teacherCheck.php";
$class = isset($_GET['class']) ? $_GET['class'] : 'one';
$section = isset($_GET['section']) ? $_GET['section'] : 'everyone';
$subject = isset($_GET['subject']) ? $_GET['subject'] : 'English';
if (isset($class, $section, $subject)) {
    if (isset($_SESSION['userName'])) {
        require_once "../../php/config/db.php";
        $userEmail = $_SESSION['userEmail'];
        $noteShowSql = "SELECT * FROM teacher_upload_notes where uploader='$userEmail' and class='$class' and section='$section' and subject='$subject'";
        if ($noteShowExe = mysqli_query($con, $noteShowSql)) {
            if (mysqli_num_rows($noteShowExe) > 0) {
                $i = 1;
?>
                <table class="note-list-here">
                    <tr>
                        <td>S.N</td>
                        <td>Name</td>
                        <td>Uploaded Date</td>
                        <td>Action</td>
                    </tr>
                    <?php
                    while ($noteShowResult = mysqli_fetch_assoc($noteShowExe)) {
                        $uploadDate = date("M d", strtotime($noteShowResult['created_date']));
                    ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php if (isset($noteShowResult['name'])) echo $noteShowResult['name'] ?></td>
                            <td><?php if (isset($uploadDate)) echo $uploadDate ?></td>
                            <td>
                                <a href="../../<?php if (isset($noteShowResult['file_path'])) echo $noteShowResult['file_path'] ?>" download="<?php if (isset($noteShowResult['name'])) echo $noteShowResult['name'] ?>"><button type="button" style="color: blue;"><i class="ri-download-2-fill"></i></button></a>

                                <button type="button" style="color: red;" onclick="deleteNotes(<?php if (isset($noteShowResult['id'])) echo $noteShowResult['id'] ?>,'<?php if (isset($noteShowResult['file_path'])) echo $noteShowResult['file_path'] ?>')"><i class="ri-delete-bin-6-line"></i></button>
                            </td>
                        </tr>
    <?php
                        $i++;
                    }
                }else{
                    echo "<tr><td colspan='4'><div style='font-weight: 400; font-size: 22px; width: 100%; text-align: center; margin-top: 20px'>No Notes Available</div></td></tr>";
                    
                }
            }
        }
    }
    ?>
                </table>