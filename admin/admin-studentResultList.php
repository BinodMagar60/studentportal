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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js" integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    
</head>

<body>
    <div class="overlay99" id="overlay"></div>

    <div class="Result-container-listStudent">
        <fieldset>
            <legend>Result</legend>
            <table id="studentResultListTable" class="studentResultListTable">
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
                    $error="";
                    ?>
                    <tr>
<td><?php if(isset($i)) echo $i ?></td>
<td><a href="admin-studentResultDownload.php?r_id=<?php if(isset($row_inner['id'])) 
echo $row_inner['id'];



?>">

<?php if(isset($row_inner['exam_title'])) echo $row_inner['exam_title'] ?></a></td>
<td><?php if(isset($publishDate)) echo $publishDate." A.D" ?></td>
                    </tr>
                    <?php
                }
            }else{
                $error="no results";
            }
        $i++;
        }
    }
    if(!empty($error)){
        echo "<tr><td colspan='3'>no results</td></tr>";
    }
    mysqli_close($con);
}
?>
</table>
        </fieldset>
    </div>

    <div class="result-show-download" id="result-show-download">

    </div>


<script src="../js/admin-downloadresult.js"></script>
</body>

</html>


