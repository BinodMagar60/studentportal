<?php
$title= $description = $exp_date = $user_class = $user_section = $user_subject = "";
$errors = [];
if(isset($_POST['id'])){
    $uid=$_POST['id'];
    //use ucwords
    // Validate Name
    if (empty($_POST['assign_title'])) {
      $errors["assign_title"] = "title is required";
  } else {
      $title = test_input($_POST["assign_title"]);
  }
    if (empty($_POST['assign_description'])) {
        $errors["assign_description"] = "description is required";
    } else {
        $description = test_input($_POST["assign_description"]);
    }

    // Validate Date of Birth
    if (empty($_POST["assign_date"])) {
        $errors["assign_date"] = "exp Date is required";
    } else {
        $exp_date = test_input($_POST["assign_date"]);
    }
  if (empty($_POST['assign_class'])) {
    // $errors["a_user_class"] = "user_class is required";
} else {
    $user_class = test_input($_POST["assign_class"]);
}
if (empty($_POST['assign_section'])) {
  // $errors["a_user_section"] = "user_section is required";
} else {
  $user_section = test_input($_POST["assign_section"]);
}
if (empty($_POST['assign_subject'])) {
  // $errors["a_user_subject"] = "user_subject is required";
} else {
  $user_subject = test_input($_POST["assign_subject"]);
}
}else{
  echo "no id";
}
// Function to sanitize and validate input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


var_dump($errors)
?>