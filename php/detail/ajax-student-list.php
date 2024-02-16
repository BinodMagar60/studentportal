<?php
require_once "../config/db.php";
require_once "../config/sessionStart.php";
unset($_SESSION['target_s_email']);
$class = isset($_GET['class']) ? $_GET['class'] : 'one';
$section = isset($_GET['section']) ? $_GET['section'] : 'A';
$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM student_table WHERE class='$class' AND section='$section' ORDER BY name ASC";

if ($exesql = mysqli_query($con, $sql)) {
    if (mysqli_num_rows($exesql) > 0) {
        $i = 0;
        ?>
        <table id="myTable">
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php
            while ($searchResult = mysqli_fetch_assoc($exesql)) {
                $i += 1;
//../admin/admin-studentprofile-main.php
?>
               <tr>
                    <td><?php if(isset($i)) echo $i; ?></td>
                    <td><?php if(isset($searchResult['name'])) echo $searchResult['name'];?></td>
                    <td><?php if(isset($searchResult['email'])) echo $searchResult['email'];?></td>
                    <!-- <td><form id="<?php //if(isset($i)) echo $i; ?>" action="../admin/admin-studentprofile-main.php" method="post">
                    <button type="submit">Details</button>
                    </form></td> -->
                    <?php
                    if($_SESSION['userType']=="admin"){
                        ?>

                    <td><a href="../admin/admin-studentprofile-main.php?s_email=<?php if(isset($searchResult['email'])) echo $searchResult['email'];?>"><button class="show-student-btn" type="button">Show</button></a></td>

                    <?php
                }else if($_SESSION['userType']=="teacher"){
                    ?>
                    <td><a href="../../teacher/html/Studentprofiles.php?s_email=<?php if(isset($searchResult['email'])) echo $searchResult['email'];?>"><button class="show-student-btn" type="button">Show</button></a></td> 
                </tr>
                <?php
                }}
            ?>
        </table>
    <?php
    } else {
        echo "no result found";
    }
} else {
    echo "query error";
}

?>
