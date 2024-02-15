<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>
    <link rel="stylesheet" href="../css/assignments.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css"/>
</head>
<body>
    <div class="overlay" id="overlay"></div>
    <div class="assignment-container">
        <fieldset>
            <legend>Assignments</legend>
            <form id="assignment-form">
                <table id="assignment-table">
                    <tr>
                        <td>Expiration Date</td>
                        <td><input id="exp" type="date" style="border: 1px solid black; outline: none; padding: 5px"></td>
                        <td class="error1 error">
                            
                        </td>
            
                    </tr>
                    
                    <tr>
                        <td>Title</td>
                        <td><input id="title" type="text" style="border: 1px solid black; outline: none; padding: 5px"></td>
                        <td>
                            <div class="error2 error"></div></td>
                        </td>
                    </tr>
                   
                    <tr>
                        <td>Description</td>
                        <td><textarea id="description" name="description" id=""  rows="5" style="border: 1px solid black; outline: none; padding: 5px"></textarea></td>
                        <td>
                            <div class="error3 error"></div></td>
                        </td>
                    </tr>
                   
                    <tr>
                        <td></td>
                        <td><div class="assignment-btn-submit"><button type="button" class="assignment-btn" onclick="assignmentValidation();">Submit</button></div></td>
                        <td></td>
                        
                    </tr>
                </table>
            </form>


            <div  id="assignment-table">
                <table class="assignment-table-show">
                    <tr>
                        <td>S.N.</td>
                        <td>Title</td>
                        <td>Action</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Assignment 1</td>
                        <td>
                            <div class="btn-assignments">
                                <button class="btn-assign" style="background-color: green;"  onclick="assignmentUpdate();">Update</button>
                                <button class="btn-assign" style="background-color: red;" onclick="assignmentDelete();">Delete</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>







        </fieldset>
    </div>


    <div class="popup-assignment-submit" id="popup-assignment-submit">
        <div class="title-logo"><i class="ri-checkbox-circle-line"></i></div>
        <div class="title">Assignment Added Successfully</div>
    </div>

    <div class="popup-assignment-update-successfully" id="popup-assignment-update-successfully">
        <div class="title-logo"><i class="ri-checkbox-circle-line"></i></div>
        <div class="title">Assignment updated successfully</div>
    </div>


    <div class="popup-assignment-delete-successfully" id="popup-assignment-delete-successfully">
        <div class="title-logo"><i class="ri-checkbox-circle-line"></i></div>
        <div class="title">Assignment deleted successfully</div>
    </div>




    <div class="assignment-delete" id="assignment-delete">
        <div class="title-logo-delete"><i class="ri-question-line"></i></div>
        <div class="title">Are you sure you want to delete it?</div>
        <div class="btn-delete-assignment">
            <button class="delete-btn-assignment" style="background-color: red;" onclick="assignmentDeletePopup();">Yes</button>
            <button class="delete-btn-assignment" style="background-color: gray;" onclick="assingmentDeleteRemove();">No</button>
        </div>
    </div>

    <div class="update-assignment" id="update-assignment">
        <form action="../../php/teacherPHP/assignment/addAssignment.php">
            <table id="update-assignment-table">
                <tr>
                    <td>Expiration Date</td>
                </tr>
                <tr>
                    <td><input type="date"></td>
                </tr>
                <tr>
                    <td>Title</td>
                </tr>
                <tr>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>Description</td>
                </tr>
                <tr>
                    <td><textarea name="" id="description-textarea"  rows="5"></textarea></td>
                </tr>
                <tr>
                    <td>
                        <div class="btn-update-assignments">
                            <button type="button" class="update-btn-assingments" style="background-color: green" onclick="assignmentUpdatePopup();">Update</button>
                            <button type="button" class="update-btn-assingments" style="background-color: red" onclick="assignmentUpdateRemeove();">Cancel</button>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>




    <script src="../js/assignments.js"></script>
</body>
</html>