<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/teacherCheck.php";
require_once "../../php/config/db.php";
$class = isset($_GET['class']) ? $_GET['class'] : 'one';
$section = isset($_GET['section']) ? $_GET['section'] : 'everyone';
$subject = isset($_GET['subject']) ? $_GET['subject'] : 'English';
?>


<table class="assignment-check-table-list">
    <tr>
        <td>S.N.</td>
        <td>Title</td>
        <td>Puslished date</td>
        <td>Submission date</td>
    </tr>
    <!-- and (exp_date > '$current_date') -->
    <?php
    if (isset($_SESSION['userEmail'])) {
        $userEmail = $_SESSION['userEmail'];
        $current_date = date("Y-m-d");
        $sql = "SELECT * FROM assignments WHERE poster_email='$userEmail' AND a_class='$class' AND (`a_section`='everyone' OR `a_section`='$section') AND `a_subject`='$subject' ORDER BY CASE WHEN exp_date < CURDATE() THEN 1 ELSE 0 END, exp_date ASC";

        // $sql = "SELECT * FROM assignments where poster_email='$userEmail' and a_class='$class' and (`a_section`='everyone' or `a_section`='$section') and `a_subject`='$subject' order by exp_date asc";
        // echo $userEmail.$current_date.$class.$section.$subject;
        if ($exesql = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($exesql) > 0) {
                $i = 0;
                while ($search = mysqli_fetch_assoc($exesql)) {
                    $i += 1;
                    $dbDate = $search['created_date'];
                    $dateObject = date_create($dbDate);
                    $formattedDate = date_format($dateObject, 'M d');
                    $expDate = $search['exp_date'];
                    $formattedExpDate = date("M d", strtotime($expDate));

    ?>
                    <tr>
                        <td><?php if (isset($i)) echo $i ?></td>
                        <td onclick="userCheckPopup(<?php if (isset($search['id'])) echo $search['id'] ?>);"><?php if (isset($search['a_title'])) echo $search['a_title'] ?></td>
                        <td><?php if (isset($formattedDate)) echo $formattedDate ?></td>
                        <td><?php if (isset($formattedExpDate)) echo $formattedExpDate ?></td>
                    </tr>
    <?php
                }
            }
            else {
                echo "<tr><td colspan='4'>No Assignment to check</td></tr>";
                
            }
        } else {
            echo "query error";
        }
    } else {
        echo "no session";
    }
    
    ?>

</table>
