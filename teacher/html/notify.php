<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>
    <link rel="stylesheet" href="../css/notify.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css"/>
</head>
<body>
    <div class="overlay" id="overlay"></div>
    <div class="notification-container">
        <fieldset>
            <legend>Notification</legend>
            <form id="notification-form">
                <table id="notification-table">
                    <tr>
                        <td>Expiration Date</td>
                        <td><input id="exp-notif" type="date" style="border: 1px solid black; outline: none; padding: 5px"></td>
                        <td class="error1 error">
                            
                        </td>
            
                    </tr>
                    
                    <tr>
                        <td>Description</td>
                        <td><textarea id="description-notif" name="description" id=""  rows="5" style="border: 1px solid black; outline: none; padding: 5px"></textarea></td>
                        <td>
                            <div class="error2 error"></div></td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Select Class
                        </td>
                        <td>
                            <select name="" id="class-notify" onchange="sectionChange();">
                                <option value="everyone">Everyone</option>
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
                        </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <select name="" id="section-notify">
                                <option value="everyone">Everyone</option>
                                <option value="A">Section A</option>
                                <option value="B">Section B</option>
                                <option value="C">Section C</option>
                            </select>
                        </td>
                        <td></td>
                    </tr>

                   
                    <tr>
                        <td></td>
                        <td><div class="notify-btn-submit"><button type="button" class="notify-btn" onclick="notifyVerification();">Submit</button></div></td>
                        <td></td>
                        
                    </tr>
                </table>
            </form>


            <div  id="notify-table">
                <table class="notify-table-show">
                    <tr>
                        <td>S.N.</td>
                        <td>Title</td>
                        <td>Action</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Assignment 1</td>
                        <td>
                            <div class="btn-notify">
                                <button class="btn-notify" style="background-color: green;"  onclick="notifyUpdate();">Update</button>
                                <button class="btn-notify" style="background-color: red;" onclick="notifyDelete();">Delete</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>







        </fieldset>
    </div>


    <div class="popup-Notice-submit" id="popup-Notice-submit">
        <div class="title-logo"><i class="ri-checkbox-circle-line"></i></div>
        <div class="title">Notice Added Successfully</div>
    </div>

    <div class="popup-notice-update-successfully" id="popup-notice-update-successfully">
        <div class="title-logo"><i class="ri-checkbox-circle-line"></i></div>
        <div class="title">Assignment updated successfully</div>
    </div>


    <div class="popup-notice-delete-successfully" id="popup-notice-delete-successfully">
        <div class="title-logo"><i class="ri-checkbox-circle-line"></i></div>
        <div class="title">Assignment deleted successfully</div>
    </div>




    <div class="notify-delete" id="notify-delete">
        <div class="title-logo-delete"><i class="ri-question-line"></i></div>
        <div class="title">Are you sure you want to delete it?</div>
        <div class="btn-delete-notify">
            <button class="delete-btn-notify" style="background-color: red;" onclick="notifyDeletePopup();">Yes</button>
            <button class="delete-btn-notify" style="background-color: gray;" onclick="notifyDeleteRemove();">No</button>
        </div>
    </div>



    <div class="update-notice" id="update-notice">
        <form>
            <table id="update-notice-table">
                <tr>
                    <td>Expiration Date</td>
                </tr>
                <tr>
                    <td><input type="date"></td>
                </tr>
                <tr>
                    <td>Description</td>
                </tr>
                <tr>
                    <td><textarea name="" id="description-notice-textarea"  rows="5"></textarea></td>
                </tr>
                <tr>
                    <td>To</td>
                </tr>
                <tr>
                    <td>
                        <select name="" id="update-selectClass">
                            <option value="everyone">Everyone</option>
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
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="" id="update-selectSection">
                            <option value="-">-</option>
                            <option value="everyone">Everyone</option>
                            <option value="A">Section A</option>
                            <option value="B">Section B</option>
                            <option value="C">Section C</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="btn-update-notice">
                            <button type="button" class="update-btn-notice" style="background-color: green" onclick="notifyUpdatePopup();">Update</button>
                            <button type="button" class="update-btn-notice" style="background-color: red" onclick="notifyUpdateRemove();">Cancel</button>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>



    <script src="../js/notify.js"></script>
    
</body>
</html>