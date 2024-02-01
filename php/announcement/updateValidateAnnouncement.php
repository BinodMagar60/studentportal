<?php
$description = $exp_date = $user_whom = $user_class = $user_section = "";
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['id'])){
    $uid=$_POST['id'];
    //use ucwords
    // Validate Name
    if (empty($_POST['a_description'])) {
        $errors["a_description"] = "description is required";
    } else {
        $description = test_input($_POST["a_description"]);
    }

    // Validate Date of Birth
    if (empty($_POST["a_date"])) {
        $errors["a_date"] = "exp Date is required";
    } else {
        $exp_date = test_input($_POST["a_date"]);
    }
    if (empty($_POST['a_user_whom'])) {
      $errors["a_user_whom"] = "user_whom is required";
  } else {
      $user_whom = test_input($_POST["a_user_whom"]);
  }
  if (empty($_POST['a_user_class'])) {
    // $errors["a_user_class"] = "user_class is required";
} else {
    $user_class = test_input($_POST["a_user_class"]);
}
if (empty($_POST['a_user_section'])) {
  // $errors["a_user_section"] = "user_section is required";
} else {
  $user_section = test_input($_POST["a_user_section"]);
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