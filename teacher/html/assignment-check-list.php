<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/config/db.php";
$class = isset($_GET['class']) ? $_GET['class'] : 'one';
$section = isset($_GET['section']) ? $_GET['section'] : 'everyone';
$subject= isset($_GET['subject']) ? $_GET['subject'] : 'English';
?>


<table class="assignment-check-table-list">
        <tr>
            <td>S.N.</td>
            <td>Title</td>
            <td>Puslished date</td>
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
            } 
            else {
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