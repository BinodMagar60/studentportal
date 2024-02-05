<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class routine</title>
    <link rel="stylesheet" href="../css/admin-examroutine-style.css">
</head>
<body>
    
    <div class="classroutine">
        <form  enctype="multipart/form-data" novalidate autocomplete="off">
            <fieldset>
                <legend>Exam Routine</legend>
                <div class="examroutine-select">
                    <div class="sel1">
                        <label for="classSel">Class</label>
                        <select name="" id="classSel">
                            <option value="one">One</option>
                            <option value="two">Two</option>
                            <option value="three">Three</option>
                            <option value="four">Four</option>
                            <option value="five">Five</option>
                            <option value="six">Six</option>
                            <option value="seven">Seven</option>
                            <option value="eight">Eight</option>
                            <option value="nine">Nine</option>
                            <option value="ten">Ten</option>
                        </select>
                    </div>
                    <div class="sel2">
                        <label for="sectionSel">Section</label>
                        <select name="" id="sectionSel">
                            <option value="a">Section A</option>
                            <option value="b">Section B</option>
                            <option value="c">Section C</option>
                        </select>
                    </div>
                </div>
               
            </fieldset>
        </form>
    </div>

    <div class="examroutine-container" id="examroutine-container"></div>

</body>
</html>