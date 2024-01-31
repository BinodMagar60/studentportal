<?php
$notice =$n_date= "";
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$uid=$_POST['id'];
    //use ucwords
    // Validate Name
    if (empty($_POST['notice'])) {
        $errors["notice"] = "notice is required";
    } else {
        $notice = ucwords(test_input($_POST["notice"]));
    }

    // Validate Date of Birth
    if (empty($_POST["n_date"])) {
        $errors["date_of_birth"] = "Date of Birth is required";
    } else {
        $n_date = test_input($_POST["n_date"]);
    }
  }
// Function to sanitize and validate input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>