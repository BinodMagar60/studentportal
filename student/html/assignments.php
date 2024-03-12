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
    <link rel="stylesheet" href="../css/assignments.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <div class="notes-container">
        <fieldset>
            <legend>Notes</legend>
            <form id="uploadAssignments"  enctype="multipart/form-data">
                <table id='assignmentTable' class="assignmentTable">
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
            <div class="titles-notes">Available Assignments</div>
            <div class="show-assignments" id="show-assignments">
            <?php
            if(isset($class,$section,$subject)){
                        require_once "../../php/config/db.php";
                        $sql = "SELECT * FROM assignments where a_class='$class' and (a_section='everyone' or a_section='$section') and `a_subject`='$subject'";
        if ($exesql = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($exesql) > 0) {
                $i = 0;
                ?>
                <table class="note-list-here">
                    <tr>
                        <td>S.N</td>
                        <td>Title</td>
                        <td>Assigned by</td>
                        <td>Submission Date</td>
                        <td>Action</td>
                    </tr>
                <?php
                while ($search = mysqli_fetch_assoc($exesql)) {
                    $i += 1;
                    ?>
                   <tr>
                        <td><?php if(isset($i)) echo $i ?></td>
                        <td><?php if(isset($search['a_title'])) echo $search['a_title'] ?></td>
                        <td><?php if(isset($search['poster_name'])) echo $search['poster_name'] ?></td>
                        <td><?php if(isset($search['exp_date'])) echo $search['exp_date'] ?></td>
                        <td>
                            <div class="btn-assignments">
                                <button class="btn-assign" style="background-color: green;" onclick="assignmentUpdate('<?php if (isset($search['id'])) echo $search['id'] ?>');">Update</button>
                            </div>
                        </td>
                    </tr>
                    <?php
                            }
                        }else{
                            echo "no assignments";
                        }
                    }else{
                        echo "query error";
                    }
                    }else{
                        echo "not set class";
                    }
                    ?>
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