<?php
require_once "../php/config/sessionStart.php";
require_once "../php/loginCheck/adminCheck.php";
require_once "../php/config/db.php";
$class = isset($_GET['classes']) ? $_GET['classes'] : 'one';
$section = isset($_GET['sections']) ? $_GET['sections'] : 'A';
$search = isset($_GET['search']) ? $_GET['search'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Details</title>
    <link rel="stylesheet" href="../css/admin-teacherdetail-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.0.1/remixicon.css" integrity="sha512-ZH3KB6wI5ADHaLaez5ynrzxR6lAswuNfhlXdcdhxsvOUghvf02zU1dAsOC6JrBTWbkE1WNDNs5Dcfz493fDMhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <div class="lower-content">
        <form>
            <fieldset>
                <legend>Teacher list</legend>
                <div class="search-student">
                    <div class="search-student-table">
                        <div class="search">
                            <button><span class="search-here"><i class="ri-search-line"></i></span></button>
                            <input type="text" id="search" placeholder="Search here..." name="search" onkeyup="searchFun1();">
                        </div>
                    </div>
                </div>
                <div class="searched-box" id="searched-box">
                    <!-- to display the table -->
                </div>
            </fieldset>
        </form>
    </div>

    <script src="../js/admin-teacherdetail-php.js"></script>
    <script>
        teacherList();
    </script>
</body>

</html>