<?php
require_once "../php/config/sessionStart.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="../css/admin-studentResultList.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>


    <div class="Result-container-listStudent">
        <fieldset>
            <legend>Result</legend>
            <table>
                <tr>
                    <td>S.N</td>
                    <td>Result</td>
                    <td>Published Date</td>
                </tr>
<?php
if(isset($_SESSION['target_s_email'])){
    $targetEmail=$_SESSION['target_s_email'];
    require_once "../php/config/db.php";
    $sql = "SELECT DISTINCT result_assigned_id FROM result_marks order by result_assigned_id desc";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $i=1;
        while ($row = mysqli_fetch_assoc($result)) {
            $common_value = $row['result_assigned_id'];
            $sql = "SELECT * FROM result_marks WHERE result_assigned_id = '$common_value' and s_email='$targetEmail' and `status`='Published'";
            $result_inner = mysqli_query($con, $sql);
    
            if (mysqli_num_rows($result_inner) > 0) {
                while ($row_inner = mysqli_fetch_assoc($result_inner)) {
                    $publishDate=date("d M Y",strtotime($row_inner['published_date']));
                    ?>
                    <tr>
<td><?php if(isset($i)) echo $i ?></td>
<td><?php if(isset($row_inner['exam_title'])) echo $row_inner['exam_title'] ?></td>
<td><?php if(isset($publishDate)) echo $publishDate." A.D" ?></td>
                    </tr>
                    <?php
                }
            }
            $i++;
        }
    }
    mysqli_close($con);
}
?>
</table>
        </fieldset>
    </div>

</body>

</html>


