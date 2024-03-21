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

function submitUploads() {
  var formData = new FormData(document.getElementById("uploadNotes"));
  var filesList = document.getElementById("files-list");
  var numOfFiles = document.getElementById("num-of-files");

  $.ajax({
    url: "../php/notes/addNotes.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      // console.log(response);

      filesList.innerHTML = "";
      numOfFiles.innerText = "No Files Chosen";
      setTimeout(() => {
        notetableData();
      }, 100);
    },
    error: function (xhr, status, error) {
      console.error("Error:", status, error);
      console.log("Response Text:", xhr.responseText);
      alert("Error adding student. Please try again.");
    },
  });
}

// function showNotesBox(){
//     const xhr = new XMLHttpRequest();
//     const container = document.getElementById('show-notes');

//     xhr.onload = function () {
//         if (this.status === 200) {
//             container.innerHTML = xhr.responseText;
//             // console.log(xhr.responseText);

//         } else {
//             console.warn("Did not receive 200 OK from response!");
//         }
//     };
//     xhr.open('GET', 'notelist.php');
//     xhr.send();

//   }

function deleteNotes(id, file) {
  // console.log(id);
  // console.log(file);
  var xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    "../php/notes/deleteNotes.php?uid=" + id + "&path=" + file,
    true
  );
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status == 200) {
    }
  };
  xhr.send();

  setTimeout(() => {
    notetableData();
  }, 150);
}

const notetableData = () => {
  $(document).ready(function () {
    function updateNoteList() {
      var selectedClass = $("#class-select").val();
      var selectedSection = $("#Section-select").val();
      var selectedSubject = $("#Subject-select").val();

      $.ajax({
        type: "GET",
        url: "notelist.php",
        data: {
          class: selectedClass,
          section: selectedSection,
          subject: selectedSubject,
        },
        success: function (response) {
          // console.log(response);
          var searchedBox = document.querySelector("#show-notes");
          if (searchedBox) {
            searchedBox.innerHTML = response;
          } else {
            console.error("Element with ID 'searched-box' not found.");
          }
        },
      });
    }

    updateNoteList();
  });
};
