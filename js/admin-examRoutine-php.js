function updateExamroutine(event) {
  var inputs = document.querySelectorAll('input[type="text"]');
  for (var i = 0; i < inputs.length; i++) {
    if (inputs[i].value.trim() === "") {
      alert("All fields are required");
      return false;
    }
  }

  var formData = new FormData(document.getElementById("classroutine"));
  $.ajax({
    url: "../php/examRoutine/addExamRoutine.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      // console.log('Response:', response);
      setTimeout(() => {
        showSuccessfulPopup();
        document.getElementById("classroutine").reset();
      }, 100);
    },
    error: function (xhr, status, error) {
      console.error("Error:", status, error);
      console.log("Response Text:", xhr.responseText);
    },
  });

  setTimeout(() => {
    examRoutineListCall();
  }, 100);
}

function deleteExamRoutine(id) {
  $.ajax({
    url: "../php/examRoutine/deleteExamRoutine.php?id=" + id,
    type: "POST",
    success: function (response) {},
    error: function (xhr, status, error) {
      console.error("Error:", status, error);
      console.log("Response Text:", xhr.responseText);
    },
  });
  setTimeout(() => {
    showDeletedPopup();
    examRoutineListCall();
  }, 100);
}

function postExamRoutine(Pid) {
  $.ajax({
    url: "../php/examRoutine/posted.php?id=" + Pid,
    type: "POST",
    success: function (response) {},
    error: function (xhr, status, error) {
      console.error("Error:", status, error);
      console.log("Response Text:", xhr.responseText);
    },
  });
}

function unpostExamRoutine(Uid) {
  $.ajax({
    url: "../php/examRoutine/unposted.php?id=" + Uid,
    type: "POST",
    success: function (response) {
      // console.log("UnPost successful");
      // console.log(response)
    },
    error: function (xhr, status, error) {
      console.error("Error:", status, error);
      console.log("Response Text:", xhr.responseText);
    },
  });
}

function examRoutineListCall() {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("examroutineList-container");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "admin-examroutineList.php");
  xhr.send();
}

function examroutineClick() {
  const primaryBoxes = document.querySelectorAll(".primary-box");
  const secondaryBoxes = document.querySelectorAll(".secondary-box");
  var post = document.getElementById("postBtn");
  var unpost = document.getElementById("UnpostBtn");

  primaryBoxes.forEach((primaryBox, index) => {
    primaryBox.addEventListener("click", function () {
      const currentSecondaryBox = secondaryBoxes[index];

      // Toggle display of the corresponding secondary box
      if (currentSecondaryBox.style.display === "block") {
        currentSecondaryBox.style.display = "none"; // If currently displayed, hide it
      } else {
        // Hide all secondary boxes
        secondaryBoxes.forEach((secondaryBox) => {
          secondaryBox.style.display = "none";
        });

        // Display the corresponding secondary box
        currentSecondaryBox.style.display = "block";
      }

      if (index === 0) {
        post.style.display = "block";
        unpost.style.display = "block";
      } else {
        post.style.display = "none";
        unpost.style.display = "none";
      }
    });
  });
}

function showSuccessfulPopup() {
  var popup = document.getElementById("created-routine");
  popup.classList.add("created-routine-show");

  setTimeout(() => {
    popup.classList.remove("created-routine-show");
  }, 1100);
}

function showDeletedPopup() {
  var popup = document.getElementById("deleted-routine");
  popup.classList.add("deleted-routine-show");

  setTimeout(() => {
    popup.classList.remove("deleted-routine-show");
  }, 1100);
}
