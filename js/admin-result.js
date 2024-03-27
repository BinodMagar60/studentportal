function submitResultForm() {
  var formData = new FormData(document.getElementById("resultForm"));

  $.ajax({
    url: "../php/result/addAssignedTeacher.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      console.log("Response:", response);
    },
    error: function (xhr, status, error) {
      console.error("Error:", status, error);
      console.log("Response Text:", xhr.responseText);
      alert("Error adding student. Please try again.");
    },
  });

  setTimeout(() => {
    resultStatusTeacher();
  }, 100);
}

function resultStatusTeacher() {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("status-resultTeachers");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
      // console.log("displayed");
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "admin-result-status.php");
  xhr.send();

  setTimeout(() => {
    checkStatusResultAdmin();
  }, 100);
}

function submitPublishResult() {
  var formData = new FormData(document.getElementById("statusResultAdmin"));

  $.ajax({
    url: "../php/result/publish.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      console.log("Response:", response);
    },
    error: function (xhr, status, error) {
      console.error("Error:", status, error);
      console.log("Response Text:", xhr.responseText);
      alert("Error adding student. Please try again.");
    },
  });

  setTimeout(() => {
    resultStatusTeacher();
    resultAdmin();
  }, 100);
}

function checkStatusResultAdmin() {
  var allReceived = true;
  var statusCells = document.querySelectorAll("#status-checker");

  statusCells.forEach(function (cell) {
    if (cell.textContent.trim() !== "Received") {
      allReceived = false;
    }
  });

  // console.log(allReceived);
  var submitButton = document.getElementById("status-submitBtn-result");
  if (allReceived) {
    submitButton.style.display = "block";
  } else {
    submitButton.style.display = "none";
  }
}

function showResultOfStudents(classes, sections, title, number) {
  // console.log(number);
  var tags = document.getElementById("tds" + number).innerHTML;
  // console.log(tags.trim());

  if (tags.trim() === "Received") {
    var popup = document.getElementById("displayMarksInAdmin");
    var overlay = document.getElementById("overlay55");

    popup.classList.add("displayMarksInAdmin-click");
    overlay.style.display = "block";

    setTimeout(resultStudentsClasssAdmin(classes, sections, title), 50);
  }
}

function showResultOfStudentsRemove() {
  var popup = document.getElementById("displayMarksInAdmin");
  var overlay = document.getElementById("overlay55");

  popup.classList.remove("displayMarksInAdmin-click");
  overlay.style.display = "none";
}

function resultStudentsClasssAdmin(classes, sections, title) {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("displayMarksInAdmin");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open(
    "GET",
    "admin-resultShowStudents.php?class=" +
      classes +
      "&section=" +
      sections +
      "&title=" +
      title
  );
  xhr.send();
}

function submitResultStudentAdmin() {
  var formData = new FormData(document.getElementById("resultbox"));

  $.ajax({
    url: "../php/result/updateMarks.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      console.log("Response:", response);
      // setTimeout(() => {
      //     showResultOfStudentsRemove();

      // }, 100);
    },
    error: function (xhr, status, error) {
      console.error("Error:", status, error);
      console.log("Response Text:", xhr.responseText);
      alert("Error adding student. Please try again.");
    },
  });
  setTimeout(() => {
    resultAdmin();
  }, 150);
}

function deletePublishResult(id) {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "../php/result/delete.php?title=" + id, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status == 200) {
    }
  };
  xhr.send();

  setTimeout(() => {
    resultAdmin();
  }, 100);
}
