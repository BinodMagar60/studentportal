<?php
// Initialize variables
$name = $address = $gender = $date_of_birth = $contact = $email =$password = $father_name = $mother_name = $parents_contact = $class = $section = $imageFile = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Name
    if (empty($_POST['s-name'])) {
        $errors["name"] = "Name is required";
    } else {
        $sname = test_input($_POST["s-name"]);
    }

    // Validate Address
    if (empty($_POST["s-address"])) {
        $errors["address"] = "Address is required";
    } else {
        $saddress = test_input($_POST["s-address"]);
    }

    // Validate Gender
    if (empty($_POST["gender"])) {
        $errors["gender"] = "Gender is required";
    } else {
        $sgender = test_input($_POST["gender"]);
    }

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

        // Validate Image File
        // if (!empty($_FILES["s-image"]["name"])) {
        //     $imageFile = $_FILES["s-image"];
        //     $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        //     $maxFileSize = 2 * 1024 * 1024; // 2 MB
    
        //     // Check file type
        //     if (!in_array($imageFile["type"], $allowedTypes)) {
        //         $errors["imagefile"] = "Invalid file type. Allowed types: JPEG, PNG, GIF";
        //     }
    
        //     // Check file size
        //     if ($imageFile["size"] > $maxFileSize) {
        //         $errors["imagefile"] = "File size exceeds the maximum allowed size (2 MB)";
        //     }
    
        //     // Check image dimensions (optional)
        //     // Example: Check if the image is at least 300x300 pixels
        //     // $imageDimensions = getimagesize($imageFile["tmp_name"]);
        //     // $minWidth = 300;
        //     // $minHeight = 300;
    
        //     // if ($imageDimensions[0] < $minWidth || $imageDimensions[1] < $minHeight) {
        //     //     $errors["imagefile"] = "Image dimensions must be at least $minWidth x $minHeight pixels";
        //     // }
        // } else {
        //     $errors["imagefile"] = "Image file is required";
        // }

//validate password
    if (empty($_POST["s-password"])) {
      $errors["password"] = "Password is required";
  } else {
      $spassword = $_POST["s-password"];
      $minLength = 5;
      // Check minimum length
      if (strlen($spassword) < $minLength) {
          $errors["password"] = "Password must be at least $minLength characters long";
      }
      
  }

    // Validate Father's Name
    if (empty($_POST["s-father"])) {
        $errors["father_name"] = "Father's Name is required";
    } else {
        $sfather = test_input($_POST["s-father"]);
    }

    // Validate Mother's Name
    if (empty($_POST["s-mother"])) {
        $errors["mother_name"] = "Mother's Name is required";
    } else {
        $smother = test_input($_POST["s-mother"]);
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