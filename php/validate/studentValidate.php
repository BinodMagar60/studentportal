<?php
require_once "../config/folder.php";
// Initialize variables
$name = $address = $gender = $date_of_birth = $contact = $email =$password = $father_name = $mother_name = $parents_contact = $class = $section = $imageFile = "";
$errors = [];
require_once "fileValidate.php";

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
        //gender
        $sgender = test_input($_POST["gender"]);

    // Validate Date of Birth
    if (empty($_POST["s-dob"])) {
        $errors["date_of_birth"] = "Date of Birth is required";
    } else {
        $sdob = test_input($_POST["s-dob"]);
    }

    // Validate Contact
    if (empty($_POST["s-contact"])) {
        $errors["contact"] = "Contact is required";
    } else {
        $scontact = test_input($_POST["s-contact"]);
    }

    // Validate Email
    if (empty($_POST["s-mail"])) {
        $errors["email"] = "Email is required";
    } else {
        $smail = test_input($_POST["s-mail"]);
        if (!filter_var($smail, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Invalid email format";
        }
    }

       

//validate password
    if (empty($_POST["s-password"])) {
      $errors["password"] = "Password is required";
  } else {
      $spassword = $_POST["s-password"];
      $secure_password=password_hash($spassword,PASSWORD_DEFAULT);
  }

    // Validate Father's Name
    if (empty($_POST["s-father"])) {
        $errors["father_name"] = "Father's Name is required";
    } else {
        $sfather = ucwords(test_input($_POST["s-father"]));
    }

    // Validate Mother's Name
    if (empty($_POST["s-mother"])) {
        $errors["mother_name"] = "Mother's Name is required";
    } else {
        $smother = ucwords(test_input($_POST["s-mother"]));
    }

    // Validate Parents Contact
    if (empty($_POST["s-parentcontact"])) {
        $errors["parents_contact"] = "Parents Contact is required";
    } else {
        $sparentcontact = test_input($_POST["s-parentcontact"]);
    }

    // Validate Class
    if (empty($_POST["classes"])) {
        $errors["class"] = "Class is required";
    } else {
        $sclass = test_input($_POST["classes"]);
    }

    // Validate Section
    if (empty($_POST["sections"])) {
        $errors["section"] = "Section is required";
    } else {
        $ssection = test_input($_POST["sections"]);
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