
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notes</title>
    <link rel="stylesheet" href="../css/notes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <div class="notes-container">
        <fieldset>
            <legend>Notes</legend>
            <form id="uploadNotes"  enctype="multipart/form-data">
                <table id='noteTable' class="noteTable">
                    <tr>
                        <td>Subject</td>
                        <td>
                            <select name="subject_n" id="Subject-select" onchange="">
                                <option value="English">English</option>
                                <option value="Nepali">Nepali</option>
                                <option value="Maths">Maths</option>
                                <option value="Science">Science</option>
                                <option value="Social">Social</option>
                                <option value="Computer">Computer</option>
                                <option value="Accont">Account</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </form>
            <div class="titles-notes">Available Notes</div>
            <div class="show-notes" id="show-notes">
                
            </div>
        </fieldset>
    </div>

</body>

</html>