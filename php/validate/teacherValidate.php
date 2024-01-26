<?php
require_once "../config/folder.php";
require_once "fileValidate.php";
// Initialize variables
$name = $address = $gender = $date_of_birth = $contact = $email =$password = $subject = "";
$errors = [];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //use ucwords
    // Validate Name
    if (empty($_POST['t-name'])) {
        $errors["name"] = "Name is required";
    } else {
        $sname = ucwords(test_input($_POST["t-name"]));
    }

    // Validate Address
    if (empty($_POST["t-address"])) {
        $errors["address"] = "Address is required";
    } else {
        $saddress = ucwords(test_input($_POST["t-address"]));
    }

    // Validate Gender
    if (empty($_POST["gender"])) {
        $errors["gender"] = "Gender is required";
    } else {
        $sgender = test_input($_POST["gender"]);
    }

    // Validate Date of Birth
    if (empty($_POST["t-dob"])) {
        $errors["date_of_birth"] = "Date of Birth is required";
    } else {
        $sdob = test_input($_POST["t-dob"]);
    }

    // Validate Contact
    if (empty($_POST["t-contact"])) {
        $errors["contact"] = "Contact is required";
    } else {
        $scontact = test_input($_POST["t-contact"]);
    }

    // Validate Email
    if (empty($_POST["t-mail"])) {
        $errors["email"] = "Email is required";
    } else {
        $smail = test_input($_POST["t-mail"]);
        if (!filter_var($smail, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Invalid email format";
        }
    }

       

//validate password
    if (empty($_POST["t-password"])) {
      $errors["password"] = "Password is required";
  } else {
      $spassword = $_POST["t-password"];
      $secure_password=password_hash($spassword,PASSWORD_DEFAULT);
      $minLength = 5;
      // Check minimum length
      if (strlen($spassword) < $minLength) {
          $errors["password"] = "Password must be at least $minLength characters long";
      }
      
  }

    // Validate Class
    if (empty($_POST["t-subject"])) {
        $errors["subject"] = "Section is required";
    } else {
        $subject = test_input($_POST["t-subject"]);
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