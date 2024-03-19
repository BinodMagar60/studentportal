

<?php
require_once "../php/config/db.php";
// Query to get the distinct values of the column you're interested in
$sql = "SELECT DISTINCT result_assigned_id FROM result_marks";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // Loop through each row to retrieve the common value
    while ($row = mysqli_fetch_assoc($result)) {
        $common_value = $row['result_assigned_id'];
?>
<table>
  <tr>
  <td>title</td>
  <td>id</td>
    <td>email</td>
    <td>Science</td>
    <td>math</td>
  </tr>
<?php
        // Now you can query the table to get all rows with this common value
        $sql = "SELECT * FROM result_marks WHERE result_assigned_id = '$common_value'";
        $result_inner = mysqli_query($con, $sql);

        if (mysqli_num_rows($result_inner) > 0) {
            // Output data of each row
            while ($row_inner = mysqli_fetch_assoc($result_inner)) {
              ?>
<tr>
  <td><?php echo $row_inner['exam_title'] ?></td>
  <td><?php echo $row_inner['id'] ?></td>
  <td><?php echo $row_inner['s_email'] ?></td>
  <td><?php echo $row_inner['science'] ?></td>
  <td><?php echo $row_inner['math'] ?></td>
</tr>
              <?php
            }
        } else {
            echo "0 results";
        }
    }
} else {
    echo "0 results";
}

mysqli_close($con);
?>
</table>

