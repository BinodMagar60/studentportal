const assignmentstableData = () => {

    $(document).ready(function () {
        function updateAssignmentList() {
            var selectedSubject = $('#Subject-select').val();

            $.ajax({
                type: 'GET',
                url: 'assignmentList.php',
                data: {
                    'subject':selectedSubject
                    
                },
                success: function (response) {
                    // console.log(response);
                    var searchedBox = document.querySelector('#show-assignments');
                    if (searchedBox) {
                        searchedBox.innerHTML = response;
                    } else {
                        console.error("Element with ID 'searched-box' not found.");
                    }
                }
            });
        }

        updateAssignmentList();
    });

}













function assignmentDetailsShow() {
    var popup = document.getElementById("assignment-details");
    var overlays = document.getElementById("overlays");
    popup.classList.add("assignment-details-clicked");
    overlays.style.display = "block";
    setTimeout(callDataDescription(), 20);
  }
  

  function assignmentDetailsHide(){
    var popup = document.getElementById("assignment-details");
    var overlays = document.getElementById("overlays");
    popup.classList.remove("assignment-details-clicked");
    overlays.style.display = "none";
  }




function callDataDescription() {
    const xhr = new XMLHttpRequest();
    const container = document.getElementById("assignment-details");
  
    xhr.onload = function () {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };
    xhr.open("GET", "assignmentDetails.php");
    xhr.send();
  }











  function assignmentUploadShow() {
    var popup = document.getElementById("assignment-student-upload");
    var overlays = document.getElementById("overlays");
    popup.classList.add("assignment-student-upload-clicked");
    overlays.style.display = "block";
    setTimeout(callAssignmentUploads(), 20);
  }
  

  function assignmentUploadHide(){
    var popup = document.getElementById("assignment-student-upload");
    var overlays = document.getElementById("overlays");
    popup.classList.remove("assignment-student-upload-clicked");
    overlays.style.display = "none";
  }







  function callAssignmentUploads() {
    const xhr = new XMLHttpRequest();
    const container = document.getElementById("assignment-student-upload");
  
    xhr.onload = function () {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };
    xhr.open("GET", "assignmentSubmit.php");
    xhr.send();
  }




  
  function uploadFiles(){
    let fileInput = document.getElementById("file-input");
    let fileList = document.getElementById("files-list");
    let numOfFiles = document.getElementById("num-of-files");
    let submitBtn = document.getElementById("submit-btn");

        fileList.innerHTML = "";
        numOfFiles.textContent = `${fileInput.files.length} Files Selected`;

        for (let file of fileInput.files) {
            let reader = new FileReader();
            let listItem = document.createElement("li");
            let fileName = file.name;
            let fileSize = (file.size / 1024).toFixed(1);
            listItem.innerHTML = `<p>${fileName}</p><p>${fileSize}KB</p>`;
            if (fileSize >= 1024) {
                fileSize = (fileSize / 1024).toFixed(1);
                listItem.innerHTML = `<p>${fileName}</p><p>${fileSize}MB</p>`;
            }
            fileList.appendChild(listItem);
        }

}