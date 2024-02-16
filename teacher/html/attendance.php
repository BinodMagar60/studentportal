<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link rel="stylesheet" href="../css/attendance.css">
</head>
<body>

    <div class="attendance-container">
        <fieldset>
            <legend>Student Attendance</legend>

           
                <div class="attendance-select-class">
                <span class="class-attendance">
                    <label for="classAttendance">Class</label>
                    <select name="classAttendance" id="classAttendance">
                        <option value="one">One</option>
                        <option value="two">Two</option>
                        <option value="three">Three</option>
                        <option value="four">Four</option>
                        <option value="fiiv">Five</option>
                        <option value="six">Six</option>
                        <option value="seven">Seven</option>
                        <option value="eight">Eight</option>
                        <option value="nine">Nine</option>
                        <option value="ten">Ten</option>
                    </select>
                </span>
                <span class="section-attendance">
                    <label for="sectionAttendance">Section</label>
                    <select name="sectionAttendance" id="sectoinAttendance">
                        <option value="A">Section A</option>
                        <option value="B">Section B</option>
                        <option value="C">Section C</option>
                    </select>
                </span>
                </div>
            


                <div class="attendance-list-container" id="attendance-list-container"></div>

            <form >
                <div class="today-attendance"><span><input type="checkbox" id="today-atten"></span><label for="today-atten">Todays Attendance</label> </div>

                <table id="attendanceTable">
                    <tr>
                        <td>S.N.</td>
                        <td>Name</td>
                        <td>E-mail</td>
                        <td>Attendance</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Binod</td>
                        <td>binodkaucha88@gmail.com</td>
                        <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Thaman</td>
                        <td>thamangurung88@gmail.com</td>
                        <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="border: none;">
                            <div class="attendance-btn-div">
                                <button type="button" class="attendanceSubmit">Submit</button>
                            </div>
                        </td>
                    </tr>
                </table>
                
            </form>


        </fieldset>
    </div>
    
</body>
</html>