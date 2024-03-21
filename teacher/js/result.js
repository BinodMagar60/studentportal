function resultStudentListPoupup(id) {
  var popup = document.getElementById("container-resultInsert");
  var overlay = document.getElementById("overlay2");

  popup.classList.add("container-resultInsert-clicked");
  overlay.style.display = "block";

  setTimeout(resultStudentsClass(id), 50);
}

function resultStudentListPoupupRemove() {
  var popup = document.getElementById("container-resultInsert");
  var overlay = document.getElementById("overlay2");

  popup.classList.remove("container-resultInsert-clicked");
  overlay.style.display = "none";
}

function resultStudentsClass(id) {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("container-resultInsert");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "result-insert.php?id=" + id);
  xhr.send();
}

function submitResult() {
  var formData = new FormData(document.getElementById("ResultForm"));

  $.ajax({
    url: "../php/result/addMarks.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      // console.log('Response:', response);
      setTimeout(() => {
        resultStudentListPoupupRemove();
        resultTeacher();
      }, 200);
    },
    error: function (xhr, status, error) {
      console.error("Error:", status, error);
      console.log("Response Text:", xhr.responseText);
      alert("Error adding student. Please try again.");
    },
  });
}
