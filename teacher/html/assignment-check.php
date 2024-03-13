<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/config/db.php";
$class = isset($_GET['class']) ? $_GET['class'] : 'one';
$section = isset($_GET['section']) ? $_GET['section'] : 'everyone';
$subject= isset($_GET['subject']) ? $_GET['subject'] : 'English';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>
    <link rel="stylesheet" href="../css/assignment-check.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <div class="assignment-container">
        <fieldset>
            <legend>Assignments Check</legend>

            <div class="select-classes">
                <table class="assignment-check-table">
                    <tr>
                        <td>Class</td>
                        <td><select name="ac_class" id="selectClass_assignment">
                        <option value="one"  <?php echo ($class == 'one' ? 'selected' : ''); ?>>One</option>
                                <option value="two" <?php echo ($class == 'two' ? 'selected' : ''); ?>>Two</option>
                                <option value="three" <?php echo ($class == 'three' ? 'selected' : ''); ?>>Three</option>
                                <option value="four" <?php echo ($class == 'four' ? 'selected' : ''); ?>>Four</option>
                                <option value="five" <?php echo ($class == 'five' ? 'selected' : ''); ?>>Five</option>
                                <option value="six" <?php echo ($class == 'six' ? 'selected' : ''); ?>>Six</option>
                                <option value="seven" <?php echo ($class == 'seven' ? 'selected' : ''); ?>>Seven</option>
                                <option value="eight" <?php echo ($class == 'eight' ? 'selected' : ''); ?>>Eight</option>
                                <option value="nine" <?php echo ($class == 'nine' ? 'selected' : ''); ?>>Nine</option>
                                <option value="ten" <?php echo ($class == 'ten' ? 'selected' : ''); ?>>Ten</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Section</td>
                        <td>
                            <select name="ac_section" id="selectSection_assignment">
                                <option value="A" <?php echo ($section == 'A' ? 'selected' : ''); ?>>A</option>
                                <option value="B" <?php echo ($section == 'B' ? 'selected' : ''); ?>>B</option>
                                <option value="C" <?php echo ($section == 'C' ? 'selected' : ''); ?>>C</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Subject</td>
                        <td>
                            <select name="ac_subject" id="selectSubject">
                                <option value="English">English</option>
                                <option value="Nepali">Nepali</option>
                                <option value="Maths">Maths</option>
                                <option value="Science">Science</option>
                                <option value="Social">Social</option>
                                <option value="Computer">Computer</option>
                                <option value="Account">Account</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="title-assignment-check">Assignment Lists</div>
            <table class="assignment-table-show">
        <tr>
            <td>S.N.</td>
            <td>Title</td>
            <td>Submission date</td>
        </tr>
        <?php
        if(isset($_SESSION['userEmail'])){
        $userEmail=$_SESSION['userEmail'];
        $current_date = date("Y-m-d");
        $sql = "SELECT * FROM assignments where poster_email='$userEmail' and (exp_date > '$current_date') and a_class='$class' and (a_section='everyone' or a_section='$section') and `a_subject`='$subject'";
        if ($exesql = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($exesql) > 0) {
                $i = 0;
                while ($search = mysqli_fetch_assoc($exesql)) {
                    $i += 1;
                    
        ?>
                    <tr>
                        <td><?php if (isset($i)) echo $i ?></td>
                        <td><?php if (isset($search['a_title'])) echo $search['a_title'] ?></td>
                        <td><?php if (isset($search['exp_date'])) echo $search['exp_date'] ?></td>
                    </tr>
        <?php
                }
            } else {
                echo "no data";
            }
        } else {
            echo "query error";
        }
    }else{
        echo "no session";
    }
        ?>

    </table>

        </fieldset>
    </div>






</body>

</html>