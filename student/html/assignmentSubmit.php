<?php
require_once "../../php/config/sessionStart.php";
require_once "../../php/loginCheck/studentCheck.php";
if (isset($_GET['id'])) {
    $uid = $_GET['id'];
?>
    <form enctype="multipart/form-data" id="uploadFilesStudent">
        <div class="assignment-container-uploads" id="assignment-container-uploads">
            <h4 style="text-align: center; margin-top: 20px">Upload Files</h4>



            <div class="file-uploads">
                <input type="file" name="assignment[]" id="file-input" multiple accept="image/*,application/pdf,.xml,.doc,.docx,.txt,.xlsx,.pptx,.ppt" onchange="uploadFiles();" />
                <input type="hidden" name="uid" value="<?php if (isset($uid)) echo $uid ?>">
                <label for="file-input">
                    <i class="fa-solid fa-arrow-up-from-bracket"></i>
                    &nbsp; Choose Files To Upload
                </label>
                <div id="num-of-files">No Files Choosen</div>
                <ul id="files-list"></ul>
                <div class="submit-btn" id="submit-btn">
                    <button type="button" onclick="submitUploadsStudent()" style="background-color:rgb(12, 179, 12);">Upload</button>
                    <button type="button" onclick="assignmentUploadHide()" style="background-color:red;">Cancel</button>
                </div>
            </div>






        </div>
    </form>
<?php
}
?>