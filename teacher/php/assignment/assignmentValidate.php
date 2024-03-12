<?php
$description = $exp_date = $title = $user_class = $user_section = $user_subject = "";
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //use ucwords
    // Validate Name
    if (empty($_POST['a_title'])) {
      $errors["a_title"] = "title is required";
  } else {
      $title = test_input($_POST["a_title"]);
  }

    if (empty($_POST['a_description'])) {
        $errors["a_description"] = "description is required";
    } else {
        $description = test_input($_POST["a_description"]);
    }

    // Validate Date of Birth
    if (empty($_POST["a_date"])) {
        $errors["exp_date"] = "exp Date is required";
    } else {
        $exp_date = test_input($_POST["a_date"]);
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
if (empty($_POST['a_user_subject'])) {
  $errors["a_user_subject"] = "subject is required";
} else {
  $user_subject = test_input($_POST["a_user_subject"]);
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