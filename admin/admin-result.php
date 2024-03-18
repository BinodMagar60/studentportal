<?php
require_once "../php/config/db.php";
$class = array("One","Two","Three","Four","Five","Six","Seven","Eight","Nine","Ten");
$section= array("A","B","C");
$resultTitle="SELECT distinct exam_title from result_teacher_assigned";
if($resultTitleExe=mysqli_query($con,$resultTitle)){
if(mysqli_num_rows($resultTitleExe)>0){
    $resultTitleResult=mysqli_fetch_assoc($resultTitleExe);
    $resultTitleName=$resultTitleResult['exam_title'];
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="../css/admin-result.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <div class="Result-container">
        <form id="resultForm">
        <fieldset>
            <legend>Result</legend>
            
            <div class="title-result">Assign Teachers</div>

            <div class="input-assign-title" id="input-assign-title">
                Title: <input type="text" name="exam_title" value="<?php if(isset($resultTitleName)) echo $resultTitleName?>">
            </div>


            <div class="result-text-result-table">
            <table  class="assign-teacher" id="assign-teacher" >
                <tr>
                    <td>Class/Section</td>
                    <td>Section A</td>
                    <td>Section B</td>
                    <td>Section C</td>
                </tr>
                <?php 
                $i=0;
                for($i;$i<10;$i++){
                ?>
                <tr>
                    <td><?php if(isset($class[$i])) echo $class[$i]?></td>
                    <?php
                $j=0;
                    for($j;$j<3;$j++){
                    ?>
                    <td><?php include "../php/result/resultTeacherSelect.php"; ?></td>
                    <?php }?>
                </tr>
<?php }?>
                <tr>
                    <td colspan="4" style="border: none">
                        <div class="assign-btn-result">
                        <button type="button" onclick="submitResultForm()">Assign</button>
                        </div>
                    </td>
                </tr>
            </table>
            </div>
<?php if(isset($resultTitleName)){ ?>
            <div class="assigned-list">
                <p>Marks status</p>
                <span>Exam Title: </span><span><?php if(isset($resultTitleName)) echo $resultTitleName ?></span>
            <table>
                <tr>
                <td>Class/Section</td>
                    <td>Section A</td>
                    <td>Section B</td>
                    <td>Section C</td>
                </tr>
                <?php 
                $a=0;
                for($a;$a<10;$a++){
                ?>
                <tr>
                    <td><?php if(isset($class[$a])) echo $class[$a]?></td>
                    <?php
                $b=0;
                    for($b;$b<3;$b++){
                        $checkTeacherSql="SELECT * from result_teacher_assigned where `class`='$class[$a]' and section='$section[$b]'";
                if($checkTeacherExe=mysqli_query($con,$checkTeacherSql)){
                    ?>
                    <td>
                    <?php
                    if(mysqli_num_rows($checkTeacherExe)>0){
                        $checkTeacherResult=mysqli_fetch_assoc($checkTeacherExe);
                        echo $checkTeacherResult['status'];
                    }else{
                        echo "-";
                    }
                    ?>
                    </td>
                    <?php }}?>
                </tr>
<?php }?>
            </table>
            </div>
            <?php }?>
            <a href="../php/result/publish.php?title=<?php if(isset($resultTitleName)) echo $resultTitleName?>"><button type="button">Publish</button></a> 
             <a href=""><button type="button">Delete</button></a>
        </fieldset>
                    </form>
    </div>





    <script src="../js/admin-result.js"></script>
</body>

</html>


