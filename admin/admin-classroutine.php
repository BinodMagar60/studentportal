<?php
require_once "../php/config/sessionStart.php";
require_once "../php/loginCheck/adminCheck.php";
require_once "../php/config/db.php";
$class = isset($_GET['classes']) ? $_GET['classes'] : 'One';
$section = isset($_GET['sections']) ? $_GET['sections'] : 'A';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class routine</title>
    <link rel="stylesheet" href="../css/admin-classroutine-style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>

    <div class="classroutine">
        <fieldset>
            <legend>Class Routine</legend>
            <div class="classroutine-select">
                <div class="sel1">
                    <label for="classSel">Class</label>
                    <select name="" id="classSel" onchange="tableDataClassRoutine();">
                        <option value="One" <?php echo ($class == 'One' ? 'selected' : ''); ?>>One</option>
                        <option value="Two" <?php echo ($class == 'Two' ? 'selected' : ''); ?>>Two</option>
                        <option value="Three" <?php echo ($class == 'Three' ? 'selected' : ''); ?>>Three</option>
                        <option value="Four" <?php echo ($class == 'Four' ? 'selected' : ''); ?>>Four</option>
                        <option value="Five" <?php echo ($class == 'Five' ? 'selected' : ''); ?>>Five</option>
                        <option value="Six" <?php echo ($class == 'Six' ? 'selected' : ''); ?>>Six</option>
                        <option value="Seven" <?php echo ($class == 'Seven' ? 'selected' : ''); ?>>Seven</option>
                        <option value="Eight" <?php echo ($class == 'Eight' ? 'selected' : ''); ?>>Eight</option>
                        <option value="Nine" <?php echo ($class == 'Nine' ? 'selected' : ''); ?>>Nine</option>
                        <option value="Ten" <?php echo ($class == 'Ten' ? 'selected' : ''); ?>>Ten</option>
                    </select>
                </div>
                <div class="sel2">
                    <label for="sectionSel">Section</label>
                    <select name="" id="sectionSel" onchange="tableDataClassRoutine();">
                        <option value="A" <?php echo ($section == 'A' ? 'selected' : ''); ?>>A</option>
                        <option value="B" <?php echo ($section == 'B' ? 'selected' : ''); ?>>B</option>
                        <option value="C" <?php echo ($section == 'C' ? 'selected' : ''); ?>>C</option>
                    </select>
                </div>
            </div>


            <div class="display-classroutine" id="display-classroutine">
                <!-- Display the ClassRoutine here -->
            </div>

        </fieldset>
    </div>



    <script src="../js/admin-classRoutine-php.js"></script>

</body>

</html>