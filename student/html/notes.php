<?php
require_once "../../php/config/sessionStart.php";
if(isset($_SESSION['userClass'],$_SESSION['userSection'])){
    require_once "../../php/config/db.php";
    $class=$_SESSION['userClass'];
    $section=$_SESSION['userSection'];
$subject= isset($_GET['subject']) ? $_GET['subject'] : 'English';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notes</title>
    <link rel="stylesheet" href="../css/notes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <div class="notes-container">
        <fieldset>
            <legend>Notes</legend>
            <form id="uploadNotes"  enctype="multipart/form-data">
                <table id='noteTable' class="noteTable">
                    <tr>
                        <td>Subject</td>
                        <td>
                            <select name="subject_n" id="Subject-select" onchange="">
                                <option value="English" <?php echo ($subject == 'English' ? 'selected' : ''); ?>>English</option>
                                <option value="Nepali" <?php echo ($subject == 'Nepali' ? 'selected' : ''); ?>>Nepali</option>
                                <option value="Maths" <?php echo ($subject == 'Maths' ? 'selected' : ''); ?>>Maths</option>
                                <option value="Science" <?php echo ($subject == 'Science' ? 'selected' : ''); ?>>Science</option>
                                <option value="Social" <?php echo ($subject == 'Social' ? 'selected' : ''); ?>>Social</option>
                                <option value="Computer" <?php echo ($subject == 'Computer' ? 'selected' : ''); ?>>Computer</option>
                                <option value="Account" <?php echo ($subject == 'Account' ? 'selected' : ''); ?>>Account</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </form>
            <div class="titles-notes">Available Notes</div>
            <div class="show-notes" id="show-notes">
            <?php
if(isset($class,$section,$subject)){
                        require_once "../../php/config/db.php";
                        $noteShowSql="SELECT * FROM teacher_upload_notes where class='$class' and (section='everyone' or section='$section') and `subject`='$subject'";
if($noteShowExe=mysqli_query($con,$noteShowSql)){
    if(mysqli_num_rows($noteShowExe)>0){
        $i=1;
        ?>
                <table class="note-list-here">
                    <tr>
                        <td>S.N</td>
                        <td>Name</td>
                        <td>Uploaded Date</td>
                        <td>Action</td>
                    </tr>
        <?php
        while($noteShowResult=mysqli_fetch_assoc($noteShowExe)){
            $uploadDate=date("Y-m-d",strtotime($noteShowResult['created_date']));
                    ?>
                    <tr>
                        <td><?php echo $i?></td>
                        <td><?php if(isset($noteShowResult['name'])) echo $noteShowResult['name'] ?></td>
                        <td><?php if(isset($uploadDate)) echo $uploadDate ?></td>
                        <td>
                        <a href="../../<?php if(isset($noteShowResult['file_path'])) echo $noteShowResult['file_path'] ?>" download="<?php if(isset($noteShowResult['name'])) echo $noteShowResult['name'] ?>"><button type="button" style="color: blue;"><i class="ri-download-2-fill"></i></button></a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                            }
                        }else{
                            echo "no notes";
                        }
                    }else{
                        echo "query error";
                    }
                    }else{
                        echo "not set class";
                    }
                    ?>
                </table>
            </div>
        </fieldset>
    </div>

</body>

</html>


<?php
}else{
    echo "not set";
}
?>