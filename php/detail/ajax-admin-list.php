<?php
require_once "../config/db.php";
unset($_SESSION['target_a_email']);
$sql = "SELECT * FROM admin_table ORDER BY name ASC";

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
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $searchResult['name']; ?></td>
                    <td><?php echo $searchResult['email']; ?></td>
                    <td><a href="../admin/admin-adminprofile-main.php?a_email=<?php if(isset($searchResult['email'])) echo $searchResult['email'];?>"><button class="show-admin-btn" type="button">Show</button></a></td>
                </tr>
            <?php
            }
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
