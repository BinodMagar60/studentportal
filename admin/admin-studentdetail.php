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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Student Details</title>
    <link rel="stylesheet" href="../css/admin-studentdetail-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.0.1/remixicon.css" integrity="sha512-ZH3KB6wI5ADHaLaez5ynrzxR6lAswuNfhlXdcdhxsvOUghvf02zU1dAsOC6JrBTWbkE1WNDNs5Dcfz493fDMhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <div class="lower-content">
        <form>
            <fieldset>
                <legend>Student list</legend>
                <div class="search-student">
                    <div class="select-opt">
                        <div class="class">
                            <label for="classes">Class:</label>
                            <select name="classes" id="classes" onchange="tableData();">
                                <option value="one" <?php echo ($class == 'one' ? 'selected' : ''); ?>>One</option>
                                <option value="two" <?php echo ($class == 'two' ? 'selected' : ''); ?>>Two</option>
                                <option value="three" <?php echo ($class == 'three' ? 'selected' : ''); ?>>Three</option>
                                <option value="four" <?php echo ($class == 'four' ? 'selected' : ''); ?>>Four</option>
                                <option value="five" <?php echo ($class == 'five' ? 'selected' : ''); ?>>Five</option>
                                <option value="six" <?php echo ($class == 'six' ? 'selected' : ''); ?>>Six</option>
                                <option value="seven" <?php echo ($class == 'seven' ? 'selected' : ''); ?>>Seven</option>
                                <option value="eight" <?php echo ($class == 'eight' ? 'selected' : ''); ?>>Eight</option>
                                <option value="nine" <?php echo ($class == 'nine' ? 'selected' : ''); ?>>Nine</option>
                                <option value="ten" <?php echo ($class == 'ten' ? 'selected' : ''); ?>>Ten</option>
                            </select>
                        </div>
                        <div class="section">
                            <label for="sections">Section:</label>
                            <select name="sections" id="sections" onchange="tableData();">
                                <option value="A" <?php echo ($section == 'A' ? 'selected' : ''); ?>>A</option>
                                <option value="B" <?php echo ($section == 'B' ? 'selected' : ''); ?>>B</option>
                                <option value="C" <?php echo ($section == 'C' ? 'selected' : ''); ?>>C</option>
                            </select>
                        </div>
                    </div>
                    <div class="search-student-table">
                        <div class="search">
                            <button><span class="search-here"><i class="ri-search-line"></i></span></button>
                            <input type="text" id="search" placeholder="Search here..." name="search" onkeyup="searchFun();">
                        </div>
                    </div>
                </div>
                <div class="searched-box" id="searched-box">
                    <!-- to display the table -->
                    <div class="toSolve"></div>
                </div>
            </fieldset>
        </form>
    </div>

    <script src="../js/admin-studentdetail-php.js"></script>
    <script>
        document.getElementById('classes').value = '<?php echo $class; ?>';
        tableData(); // Initial call to tableData

        // Set up event listeners for class and section change outside of tableData
        document.getElementById('classes', 'sections').addEventListener('change', function() {
            tableData();
        });
    </script>
</body>

</html>