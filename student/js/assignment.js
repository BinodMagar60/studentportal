const assignmentstableData = () => {
  $(document).ready(function () {
    function updateAssignmentList() {
      var selectedSubject = $("#Subject-select").val();

      $.ajax({
        type: "GET",
        url: "assignmentList.php",
        data: {
          subject: selectedSubject,
        },
        success: function (response) {
          // console.log(response);
          var searchedBox = document.querySelector("#show-assignments");
          if (searchedBox) {
            searchedBox.innerHTML = response;
          } else {
            console.error("Element with ID 'searched-box' not found.");
          }
        },
      });
    }

    updateAssignmentList();
    setTimeout(() => {
      checkStudentAssignmentStatus();
    }, 50);
  });
  
};

function assignmentDetailsShow(id) {
  var popup = document.getElementById("assignment-details");
  var overlays = document.getElementById("overlays");
  popup.classList.add("assignment-details-clicked");
  overlays.style.display = "block";
  setTimeout(callDataDescription(id), 20);
}

function assignmentDetailsHide() {
  var popup = document.getElementById("assignment-details");
  var overlays = document.getElementById("overlays");
  popup.classList.remove("assignment-details-clicked");
  overlays.style.display = "none";
}

function callDataDescription(id) {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("assignment-details");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "assignmentDetails.php?id=" + id);
  xhr.send();
}

function assignmentUploadShow(id) {
  var popup = document.getElementById("assignment-student-upload");
  var overlays = document.getElementById("overlays");
  popup.classList.add("assignment-student-upload-clicked");
  overlays.style.display = "block";

  setTimeout(callAssignmentUploads(id), 20);
}

function assignmentUploadHide() {
  var popup = document.getElementById("assignment-student-upload");
  var overlays = document.getElementById("overlays");
  popup.classList.remove("assignment-student-upload-clicked");
  overlays.style.display = "none";
}

function callAssignmentUploads(id) {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("assignment-student-upload");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "assignmentSubmit.php?id=" + id);
  xhr.send();
}

function uploadFiles() {
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

function submitUploadsStudent() {
  var formData = new FormData(document.getElementById("uploadFilesStudent"));
  var filesList = document.getElementById("files-list");
  var numOfFiles = document.getElementById("num-of-files");

  $.ajax({
    url: "../php/assignment/uploadAssignment.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      // console.log(response);

      filesList.innerHTML = "";
      numOfFiles.innerText = "No Files Chosen";
      setTimeout(() => {
        assignmentUploadHide();
        assignmentstableData();
      }, 100);

      setTimeout(() => {
        checkStudentAssignmentStatus();
      }, 250);
    },
    error: function (xhr, status, error) {
      console.error("Error:", status, error);
      console.log("Response Text:", xhr.responseText);
      alert("Error adding student. Please try again.");
    },
  });
}

function checkStudentAssignmentStatus() {
  let myTable = document.getElementById("note-list-here");
  let tr = myTable.getElementsByTagName("tr");

  for (var i = 1; i < tr.length; i++) {
    var status = document.getElementById("status" + i).innerText;
    var upload = document.getElementById("upload" + i);
    var checked = document.getElementById("checked" + i);

    if (status == "Approved") {
      upload.style.display = "none";
      checked.style.display = "block";
      checked.innerText = "Checked";
    } else if (status == "Pending") {
      upload.style.display = "none";
      checked.style.display = "block";
      checked.innerText = "In Progress";
    } else {
      upload.style.display = "block";
      checked.style.display = "none";
      checked.innerText = "Checked";
    }
  }
}
