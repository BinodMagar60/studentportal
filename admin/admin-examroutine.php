<?php
require_once "../php/config/db.php";
$examDateSql="SELECT * FROM exam_routine_date";
$examDateExe=mysqli_query($con,$examDateSql);
if(mysqli_num_rows($examDateExe)>0){
$examDateRow=mysqli_fetch_assoc($examDateExe);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class routine</title>
    <link rel="stylesheet" href="../css/admin-examroutine-style.css">
</head>
<body>
    
    <div class="classroutine">
        <form action="../php/examRoutine/updateExamRoutine.php" method="post" enctype="multipart/form-data" novalidate autocomplete="off">
            <fieldset>
                <legend>Exam Routine</legend>
                <div class="examroutine-select">
                   <div class="examtitles"> <label for="exam-title">Title</label>
                    <input type="text" id="exam-title" name="exam_title" value="<?php if(isset($examDateRow['exam_title'])) echo $examDateRow['exam_title']?>">
                    </div>
                    <table class="exam-table">
                        <tr>
                            <td>Date/Class</td>                           
                            <td><input type="text" name="e_date_1" value="<?php if(isset($examDateRow['date_1'])) echo $examDateRow['date_1'] ?>"></td>
                            <td><input type="text" name="e_date_2" value="<?php if(isset($examDateRow['date_2'])) echo $examDateRow['date_2'] ?>"></td>
                            <td><input type="text" name="e_date_3" value="<?php if(isset($examDateRow['date_3'])) echo $examDateRow['date_3'] ?>"></td>
                            <td><input type="text" name="e_date_4" value="<?php if(isset($examDateRow['date_4'])) echo $examDateRow['date_4'] ?>"></td>
                            <td><input type="text" name="e_date_5" value="<?php if(isset($examDateRow['date_5'])) echo $examDateRow['date_5'] ?>"></td>
                            <td><input type="text" name="e_date_6" value="<?php if(isset($examDateRow['date_6'])) echo $examDateRow['date_6'] ?>"></td>
                            <td><input type="text" name="e_date_7" value="<?php if(isset($examDateRow['date_7'])) echo $examDateRow['date_7'] ?>"></td>
                            <?php
}
?>
                        </tr>
                        <?php
$examSubjectSql="SELECT * FROM exam_routine_subject";
$examSubjectExe=mysqli_query($con,$examSubjectSql);
$i=1;
if(mysqli_num_rows($examSubjectExe)>0){
    while($examSubjectRow=mysqli_fetch_assoc($examSubjectExe)){
        ?>
                        <tr>
                            <td><?php if(isset($examSubjectRow['class'])) echo $examSubjectRow['class'];?></td>
                            <input type="hidden" name="examSubjectClass_<?php echo $i;?>" value="<?php if(isset($examSubjectRow['class'])) echo $examSubjectRow['class'];?>">
                            <td><input type="text" name="examSubject1_<?php echo $i;?>" value="<?php if(isset($examSubjectRow['e_subject_1'])) echo $examSubjectRow['e_subject_1'];?>"></td>
                            <td><input type="text" name="examSubject2_<?php echo $i;?>" value="<?php if(isset($examSubjectRow['e_subject_2'])) echo $examSubjectRow['e_subject_2'];?>"></td>
                            <td><input type="text" name="examSubject3_<?php echo $i;?>" value="<?php if(isset($examSubjectRow['e_subject_3'])) echo $examSubjectRow['e_subject_3'];?>"></td>
                            <td><input type="text" name="examSubject4_<?php echo $i;?>" value="<?php if(isset($examSubjectRow['e_subject_4'])) echo $examSubjectRow['e_subject_4'];?>"></td>
                            <td><input type="text" name="examSubject5_<?php echo $i;?>" value="<?php if(isset($examSubjectRow['e_subject_5'])) echo $examSubjectRow['e_subject_5'];?>"></td>
                            <td><input type="text" name="examSubject6_<?php echo $i;?>" value="<?php if(isset($examSubjectRow['e_subject_6'])) echo $examSubjectRow['e_subject_6'];?>"></td>
                            <td><input type="text" name="examSubject7_<?php echo $i;?>" value="<?php if(isset($examSubjectRow['e_subject_7'])) echo $examSubjectRow['e_subject_7'];?>"></td>
                        </tr>
                        <?php
                        $i++;
    }
}
                            ?>
                        
                    </table>
                    <div class="btn-examroutine">
                        <button>Update</button>
                        <a href="../php/examRoutine/updateStatus.php"><button type="button">Post</button></a>
                        <button>Reset</button>
                    </div>
                </div>
               
            </fieldset>
        </form>
    </div>

    <div class="examroutine-container" id="examroutine-container"></div>

</body>
</html>