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
                    <td><textarea name="" id="description-notice-textarea" rows="5"></textarea></td>
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