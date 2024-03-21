function assignmentValidation() {
  var expInput = document.getElementById("exp");
  var titleInput = document.getElementById("title");
  var descriptionInput = document.getElementById("description");

  var exp = expInput.value;
  var title = titleInput.value;
  var description = descriptionInput.value;

  var e1 = document.querySelector(".error1");
  var e2 = document.querySelector(".error2");
  var e3 = document.querySelector(".error3");
  var valid = 0;

  if (exp === "") {
    e1.innerText = "*Expiration Date is required";
    valid = valid + 1;
  } else {
    e1.innerText = "";
  }

  if (title === "") {
    e2.innerText = "*Title is required";
    valid = valid + 1;
  } else {
    e2.innerText = "";
  }

  if (description === "") {
    e3.innerText = "*Description is required";
    valid = valid + 1;
  } else {
    e3.innerText = "";
  }

  if (valid === 0) {
    var formData = new FormData(document.getElementById("assignment-form"));

    $.ajax({
      url: "../php/assignment/addAssignment.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        assignmentPopup();

        setTimeout(() => {
          document.getElementById("assignment-form").reset();
        }, 800);
        tableDataAssignment();

        console.log(description);
      },
      error: function (xhr, status, error) {
        console.error("Error:", status, error);
        console.log("Response Text:", xhr.responseText);
        alert("Error adding student. Please try again.");
      },
    });
  }
}

const tableDataAssignment = () => {
  $(document).ready(function () {
    function updateAssignmentLists() {
      $.ajax({
        type: "GET",
        url: "../php/assignment/assignment-list.php",
        data: {},
        success: function (response) {
          // console.log(response);
          var searchedBox = document.querySelector(
            "#assignment-list-show-container"
          );
          if (searchedBox) {
            searchedBox.innerHTML = response;
          } else {
            console.error("Element with ID 'searched-box' not found.");
          }
        },
      });
    }
    updateAssignmentLists();
  });
};

function callDataAssignment(assignmentId) {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("update-assignment");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "assignmentupdate.php?id=" + assignmentId);
  xhr.send();
}

function assignmentPopup() {
  var popupbox = document.getElementById("popup-assignment-submit");
  popupbox.classList.add("popup-assignment-submit-clicked");
  setTimeout(() => {
    removeAssignmentPopup();
    document.getElementById("assignment-form").reset();
  }, 1500);
}

function removeAssignmentPopup() {
  var popupbox = document.getElementById("popup-assignment-submit");
  popupbox.classList.remove("popup-assignment-submit-clicked");
}

function assignmentDelete(aid) {
  var deleteBox = document.getElementById("assignment-delete-" + aid);
  var overlay = document.getElementById("overlay");
  deleteBox.classList.add("assignment-delete-popup");
  overlay.style.display = "block";
}

function assingmentDeleteRemove(aid) {
  var deleteBox = document.getElementById("assignment-delete-" + aid);
  var overlay = document.getElementById("overlay");
  deleteBox.classList.remove("assignment-delete-popup");
  overlay.style.display = "none";
}

function assignmentUpdate(assignmentId) {
  var updateBox = document.getElementById("update-assignment");
  var overlay = document.getElementById("overlay");
  updateBox.classList.add("update-assignment-show");
  overlay.style.display = "block";
  setTimeout(callDataAssignment(assignmentId), 30);
}

function assignmentUpdateRemeove() {
  var updateBox = document.getElementById("update-assignment");
  var overlay = document.getElementById("overlay");
  updateBox.classList.remove("update-assignment-show");
  overlay.style.display = "none";
}

function assignmentDeletePopup() {
  var popup = document.getElementById("popup-assignment-delete-successfully");
  popup.classList.add("popup-assignment-submit-clicked");
  setTimeout(() => {
    popup.classList.remove("popup-assignment-submit-clicked");
  }, 1500);
}

function confirmDeleteAssignment(aId) {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "../php/assignment/deleteAssignment.php?uid=" + aId, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status == 200) {
    }
  };
  xhr.send();

  assingmentDeleteRemove(aId);
  setTimeout(() => {
    assignmentDeletePopup();
    tableDataAssignment();
  }, 100);
}

function assignmentUpdatePopup() {
  var id = $("#assignmentDetails input[name='id']").val();
  var exp_date = $("#assignmentDetails input[name='assign_date']").val();
  var a_title = $("#assignmentDetails input[name='assign_title']").val();
  var a_description = $(
    "#assignmentDetails textarea[name='assign_description']"
  ).val();
  var a_class = $("#assignmentDetails select[name='assign_class']").val();
  var a_section = $("#assignmentDetails select[name='assign_section']").val();
  var a_subject = $("#assignmentDetails select[name='assign_subject']").val();

  $.ajax({
    type: "POST",
    url: "../php/assignment/updateAssignment.php",
    data: {
      id: id,
      assign_date: exp_date,
      assign_title: a_title,
      assign_description: a_description,
      assign_class: a_class,
      assign_section: a_section,
      assign_subject: a_subject,
    },
    success: function (response) {
      // console.log(response);
      // console.log(exp_date);
      // console.log(a_title);
      // console.log(a_description);
      // console.log(a_class);
      // console.log(a_section);

      assignmentUpdateRemeove();
      var popup = document.getElementById(
        "popup-assignment-update-successfully"
      );
      popup.classList.add("popup-assignment-submit-clicked");
      setTimeout(() => {
        popup.classList.remove("popup-assignment-submit-clicked");
      }, 1500);
    },
    error: function (error) {
      console.log(error);
    },
  });

  setTimeout(() => {
    tableDataAssignment();
  }, 100);
}

// assignmentDeletePopup();
