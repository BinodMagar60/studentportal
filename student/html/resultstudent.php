<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/studentCheck.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="../css/resultstudent.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js" integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js" integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


</head>

<body>
    <div class="overlay99" id="overlay99"></div>

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
                if (isset($_SESSION['userEmail'])) {
                    $targetEmail = $_SESSION['userEmail'];
                    require_once "../../php/config/db.php";
                    $sql = "SELECT DISTINCT result_assigned_id FROM result_marks order by result_assigned_id desc";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $common_value = $row['result_assigned_id'];
                            $sql = "SELECT * FROM result_marks WHERE result_assigned_id = '$common_value' and s_email='$targetEmail' and `status`='Published'";
                            $result_inner = mysqli_query($con, $sql);

                            if (mysqli_num_rows($result_inner) > 0) {
                                while ($row_inner = mysqli_fetch_assoc($result_inner)) {
                                    $publishDate = date("d M Y", strtotime($row_inner['published_date']));
                                    $error = "";
                ?>
                                    <tr>
                                        <td><?php if (isset($i)) echo $i ?></td>
                                        <td onclick="showStudentDownloadPage('<?php if (isset($row_inner['id'])) echo $row_inner['id']; ?>')" style="cursor: pointer;">

                                            <?php if (isset($row_inner['exam_title'])) echo $row_inner['exam_title'] ?></td>
                                        <td><?php if (isset($publishDate)) echo $publishDate . " A.D" ?></td>
                                    </tr>
                <?php
                                    $i++;
                                }
                            } else {
                                $error = "no results";
                            }
                        }
                    }
                    // if(!empty($error)){
                    //     echo "<tr><td colspan='3'>no results</td></tr>";
                    // }
                    mysqli_close($con);
                } else {
                    echo "not set";
                }
                ?>
            </table>
        </fieldset>
    </div>

    <div class="result-show-download" id="result-show-download">

    </div>


    <script src="../js/resultshow.js"></script>
</body>

</html>