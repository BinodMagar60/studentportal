<?php
if (isset($_GET['r_id'])) {
    $resultId = $_GET['r_id'];
    require_once "../php/config/db.php";
    $studentResultSql = "SELECT * FROM result_marks where `id`=$resultId";
    if ($studentResultExe = mysqli_query($con, $studentResultSql)) {
        if (mysqli_num_rows($studentResultExe) > 0) {
            $studentResult = mysqli_fetch_assoc($studentResultExe);
            $studentEmail = $studentResult['s_email'];
            $newPublishDate = date("Y/m/d", strtotime($studentResult['published_date']));

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
                <div class="resultContainer-Download">

                    <button class="btn-closeDaDownloadBtn" onclick="removeStudentDownloadPage()"><i class="ri-close-circle-line"></i></button>
                    <div class="inner-resultContainer-Downlaod" id="inner-resultContainer-Downlaod">
                        <div class="top-part-result">
                            <div class="schoolname">Chitwan Higher Secondary School</div>
                            <div class="schooladdress">Bharatpur-10, Chitwan</div>
                            <div class="contactinfo">056-676767, 9877777777</div>
                            <div class="whichResult"><?php if (isset($studentResult['exam_title'])) echo $studentResult['exam_title'] ?></div>
                            <div class="marksheet">Marksheet</div>
                        </div>

                        <div class="middle-resultContainer-Downlaod">
                            <table class="middle-part-download-table">
                                <tr>
                                    <?php
                                    $studentShowSql = "SELECT * FROM student_table where email='$studentEmail'";
                                    $studentShowExe = mysqli_query($con, $studentShowSql);
                                    if (mysqli_num_rows($studentShowExe) > 0) {
                                        $studentShowResult = mysqli_fetch_assoc($studentShowExe);
                                        $dob = date("d M, Y", strtotime($studentShowResult['date_of_birth']));
                                    }
                                    ?>
                                    <td>Name</td>
                                    <td><?php if (isset($studentShowResult['name'])) echo $studentShowResult['name'] ?></td>
                                    <td rowspan="6">
                                        <div style="display: flex; justify-content: right;">
                                            <div class="img-container-student">
                                                <img src="../<?php if (isset($studentShowResult['image'])) echo $studentShowResult['image'] ?>" alt="picture">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Class</td>
                                    <td><?php if (isset($studentShowResult['class'])) echo ucwords($studentShowResult['class']) ?></td>

                                </tr>
                                <tr>
                                    <td>Section</td>
                                    <td><?php if (isset($studentShowResult['section'])) echo $studentShowResult['section'] ?></td>
                                </tr>
                                <tr>
                                    <td>D.O.B</td>
                                    <td><?php if (isset($dob)) echo $dob . " A.D" ?></td>
                                </tr>
                                <tr>
                                    <td>Father's Name</td>
                                    <td><?php if (isset($studentShowResult['father_name'])) echo $studentShowResult['father_name'] ?></td>
                                </tr>
                                <tr>
                                    <td>Contact No.</td>
                                    <td><?php if (isset($studentShowResult['contact'])) echo $studentShowResult['contact'] ?></td>
                                </tr>

                            </table>
                        </div>


                        <div class="result-marks">
                            <table class="marks-box">
                                <?php
                                require_once "../php/result/logicForStudentResult.php";
                                ?>
                                <tr>
                                    <td>S.N</td>
                                    <td>Subject</td>
                                    <td>Marks Obtained</td>
                                    <td>GPA Obtained</td>
                                    <td>Grade</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>English</td>
                                    <td><?php if (isset($studentResult['english'])) echo $studentResult['english'] ?></td>
                                    <td><?php if (isset($english)) echo grade($english)[1] ?></td>
                                    <td><?php if (isset($english)) echo grade($english)[0] ?></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Nepali</td>
                                    <td><?php if (isset($studentResult['nepali'])) echo $studentResult['nepali'] ?></td>
                                    <td><?php if (isset($nepali)) echo grade($nepali)[1] ?></td>
                                    <td><?php if (isset($nepali)) echo grade($nepali)[0] ?></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Maths</td>
                                    <td><?php if (isset($studentResult['math'])) echo $studentResult['math'] ?></td>
                                    <td><?php if (isset($math)) echo grade($math)[1] ?></td>
                                    <td><?php if (isset($math)) echo grade($math)[0] ?></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Science</td>
                                    <td><?php if (isset($studentResult['science'])) echo $studentResult['science'] ?></td>
                                    <td><?php if (isset($science)) echo grade($science)[1] ?></td>
                                    <td><?php if (isset($science)) echo grade($science)[0] ?></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Social</td>
                                    <td><?php if (isset($studentResult['social'])) echo $studentResult['social'] ?></td>
                                    <td><?php if (isset($social)) echo grade($social)[1] ?></td>
                                    <td><?php if (isset($social)) echo grade($social)[0] ?></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Computer</td>
                                    <td><?php if (isset($studentResult['computer'])) echo $studentResult['computer'] ?></td>
                                    <td><?php if (isset($computer)) echo grade($computer)[1] ?></td>
                                    <td><?php if (isset($computer)) echo grade($computer)[0] ?></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Account</td>
                                    <td><?php if (isset($studentResult['account'])) echo $studentResult['account'] ?></td>
                                    <td><?php if (isset($account)) echo grade($account)[1] ?></td>
                                    <td><?php if (isset($account)) echo grade($account)[0] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Total</td>
                                    <td><?php if (isset($totalMark)) echo $totalMark ?></td>
                                    <td><?php if (isset($totalGradePoint)) echo $totalGradePoint ?></td>
                                    <td><?php if (isset($totalGradePointAvg)) echo $totalGradePointAvg ?></td>
                                </tr>
                            </table>
                        </div>



                        <div class="bottom-part">
                            <div class="publish-date">
                                Published Date: <?php if (isset($newPublishDate)) echo $newPublishDate ?>
                            </div>
                            <div class="signature">
                                Principal: Signed
                            </div>
                        </div>





                    </div>

                    <div class="download-btn-result">
                        <button class="btn-downloadResult" id="btn-downloadResult" onclick="downloadResult('<?php if (isset($studentShowResult['name'])) echo $studentShowResult['name'] ?>')">Downlaod</button>
                    </div>
                </div>

                <script src="../js/admin-downloadresult.js"></script>

            </body>

            </html>


<?php
        }
    }
} else {
    echo "hello world";
}
?>