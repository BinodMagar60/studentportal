<?php
$description = $exp_date = $user_class = $user_section = "";
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['id'])){
    $uid=$_POST['id'];
    //use ucwords
    // Validate Name
    if (empty($_POST['description'])) {
        $errors["description"] = "description is required";
    } else {
        $description = test_input($_POST["description"]);
    }

    // Validate Date of Birth
    if (empty($_POST["e_date"])) {
        $errors["e_date"] = "exp Date is required";
    } else {
        $exp_date = test_input($_POST["e_date"]);
    }
  if (empty($_POST['class'])) {
    // $errors["class"] =class is required";
} else {
    $class = test_input($_POST["class"]);
}
if (empty($_POST['section'])) {
  // $errors["section"] =section is required";
} else {
  $section = test_input($_POST["section"]);
}
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