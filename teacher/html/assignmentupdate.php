<form action="">
            <table id="update-assignment-table">
                <tr>
                    <td>Submission Date</td>
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
                    <td>Select Class</td>
                </tr>
                <tr>
                    <td>
                        <select name="" id="selectClassAssignmentUpdate">
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
                        <select name="" id="selectSelectAssignmentUpdate">
                            <option value="everyone">Everyone</option>
                            <option value="A">Section A</option>
                            <option value="B">Section B</option>
                            <option value="C">Section C</option>
                        </select>
                    </td>
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