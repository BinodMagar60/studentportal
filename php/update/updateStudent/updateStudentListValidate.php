<?php
require_once "../../config/sessionStart.php";
require_once "../../config/folder.php";
require_once "updateStudentListFile.php";
// Initialize variables
$name = $address = $contact = $password = $sfname = $smname = $spcontact = "";
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //use ucwords
    // Validate Name
    if (empty($_POST['s-name'])) {
        $errors["name"] = "Name is required";
    } else {
        $sname = ucwords(test_input($_POST["s-name"]));
    }

    // Validate Address
    if (empty($_POST["s-address"])) {
        $errors["address"] = "Address is required";
    } else {
        $saddress = ucwords(test_input($_POST["s-address"]));
    }
    // Validate Contact
    if (empty($_POST["s-contact"])) {
        $errors["contact"] = "Contact is required";
    } else {
        $scontact = test_input($_POST["s-contact"]);
    }

    //parents contact // additional
    if (empty($_POST['sf-name'])) {
        $errors["name"] = "Name is required";
    } else {
        $sfname = ucwords(test_input($_POST["sf-name"]));
    }
    if (empty($_POST['sm-name'])) {
        $errors["name"] = "Name is required";
    } else {
        $smname = ucwords(test_input($_POST["sm-name"]));
    }
    if (empty($_POST["sp-contact"])) {
        $errors["contact"] = "Contact is required";
    } else {
        $spcontact = test_input($_POST["sp-contact"]);
    }


//validate password
//     if (empty($_POST["a-password"])) {
//       $errors["password"] = "Password is required";
//   } else {
//       $spassword = $_POST["a-password"];
//       $secure_password=password_hash($spassword,PASSWORD_DEFAULT);
//       $minLength = 5;
//       // Check minimum length
//       if (strlen($spassword) < $minLength) {
//           $errors["password"] = "Password must be at least $minLength characters long";
//       }
      
//   }

}

// Function to sanitize and validate input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>