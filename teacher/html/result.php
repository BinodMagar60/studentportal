<?php
require_once "../../php/config/sessionStart.php";
if(isset($_SESSION['userEmail'])){
$userEmail=$_SESSION['userEmail'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="../css/result.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>

    <div class="overlay2" id="overlay2"></div>
    <div class="Result-container">
        <fieldset>
            <legend>Result</legend>
            

            <table class="result-teacher-table" id="result-teacher-table">
                <tr>
                    <td>S.N.</td>
                    <td>Title</td>
                    <td>Class</td>
                    <td>Section</td>
                </tr>
                <?php
require_once "../../php/config/db.php";
$check_teacher_sql= "SELECT * FROM result_teacher_assigned where assigned_teacher='$userEmail'";
if($check_teacher_exe=mysqli_query($con,$check_teacher_sql)){
    if(mysqli_num_rows($check_teacher_exe)>0){
        $i=1;
        while($check_teacher_result=mysqli_fetch_assoc($check_teacher_exe)){
?>
<tr>
<td><?php if(isset($i)) echo $i?></td>
<td><?php if(isset($check_teacher_result['exam_title'])) echo $check_teacher_result['exam_title']?></td>
<td><?php if(isset($check_teacher_result['class'])) echo $check_teacher_result['class']?></td>
<td><?php if(isset($check_teacher_result['section'])) echo $check_teacher_result['section']?></td>
        </tr>
<?php
$i++;
        }
    }else{
        echo "<p>not assigned</p>";
    }
}

?>
            </table>


            
        </fieldset>
    </div>


    <div class="container-resultInsert" id="container-resultInsert">

    </div>





</body>

</html>


<?php
}
?>