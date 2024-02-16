<?php
// require_once "../../config/db.php";
$class = isset($_GET['classes']) ? $_GET['classes'] : 'one';
$section = isset($_GET['sections']) ? $_GET['sections'] : 'A';
                    $sql = "SELECT * FROM student_table WHERE class='$class' AND section='$section' ORDER BY name ASC";

if ($exesql = mysqli_query($con, $sql)) {
    if (mysqli_num_rows($exesql) > 0) {
        $i = 0;
            while ($searchResult = mysqli_fetch_assoc($exesql)) {
                $i += 1;
        ?>
                    <tr>
                        <td><?php if(isset($i)) echo $i;?></td>
                        <td><?php if(isset($searchResult['name'])) echo $searchResult['name'];?></td>
                        <td><?php if(isset($searchResult['email'])) echo$searchResult['email'];?></td>
                        <td><input type="checkbox"></td>
                    </tr>
                   <?php
            }}}


?>