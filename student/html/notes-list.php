<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/studentCheck.php";
if (isset($_SESSION['userClass'], $_SESSION['userSection'])) {
    require_once "../../php/config/db.php";
    $class = $_SESSION['userClass'];
    $section = $_SESSION['userSection'];
    $subject = isset($_GET['subject']) ? $_GET['subject'] : 'English';
    if (isset($class, $section, $subject)) {
        require_once "../../php/config/db.php";
        $noteShowSql = "SELECT * FROM teacher_upload_notes where class='$class' and (section='everyone' or section='$section') and `subject`='$subject'";
        if ($noteShowExe = mysqli_query($con, $noteShowSql)) {
            if (mysqli_num_rows($noteShowExe) > 0) {
                $i = 1;
?>
                <table class="note-list-here">
                    <tr>
                        <td>S.N</td>
                        <td>Name</td>
                        <td>Uploaded By</td>
                        <td>Uploaded Date</td>
                        <td>Action</td>
                    </tr>
                    <?php
                    while ($noteShowResult = mysqli_fetch_assoc($noteShowExe)) {
                        $uploadDate = date("M d", strtotime($noteShowResult['created_date']));
                        $posterEmail = $noteShowResult['uploader'];
                        $sql = "SELECT * FROM teacher_table where email='$posterEmail'";
                        if ($exesql = mysqli_query($con, $sql)) {
                            if (mysqli_num_rows($exesql) > 0) {
                                if ($result = mysqli_fetch_assoc($exesql)) {
                                    $posterName = $result['name'];
                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php if (isset($noteShowResult['name'])) echo $noteShowResult['name'] ?></td>
                                        <td><?php if (isset($posterName)) echo $posterName ?></td>
                                        <td><?php if (isset($uploadDate)) echo $uploadDate ?></td>
                                        <td>
                                            <a href="../../<?php if (isset($noteShowResult['file_path'])) echo $noteShowResult['file_path'] ?>" download="<?php if (isset($noteShowResult['name'])) echo $noteShowResult['name'] ?>"><button type="button" style="color: blue;"><i class="ri-download-2-fill"></i></button></a>
                                        </td>
                                    </tr>
        <?php
                                }
                            }
                        }
                        $i++;
                    }
                }
                else{
                    echo "<tr><td colspan='5'>No notes available</td></tr>";
                }
            } else {
                echo "query error";
            }
        } else {
            echo "not set class";
        }
        ?>
                </table>


            <?php

        }
            ?>