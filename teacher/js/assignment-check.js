const assignmentCheckData = () => {
  $(document).ready(function () {
    function updateAssignmentList() {
      var selectedClass = $("#selectClass_assignment").val();
      var selectedSection = $("#selectSection_assignment").val();
      var selectedSubject = $("#selectSubject").val();

      $.ajax({
        type: "GET",
        url: "assignment-check-list.php",
        data: {
          class: selectedClass,
          section: selectedSection,
          subject: selectedSubject,
        },
        success: function (response) {
          // console.log(response);
          var searchedBox = document.querySelector(
            "#assignment-check-container"
          );
          if (searchedBox) {
            searchedBox.innerHTML = response;
          } else {
            console.error("Element with ID 'searched-box' not found.");
          }
        },
      });
    }

    updateAssignmentList();
  });
};

function userCheckPopup(id) {
  var popup = document.getElementById("checkAssignmentsOfUsers");
  var overlay = document.getElementById("overlay1");

  popup.classList.add("checkAssignmentsOfUsers-clicked");
  overlay.style.display = "block";
  setTimeout(callUsersAssignmentsData(id), 50);
  setTimeout(() => {
    checkAssignmentStatus();
  }, 100);
}

function userCheckPopupRemove() {
  var popup = document.getElementById("checkAssignmentsOfUsers");
  var overlay = document.getElementById("overlay1");

  popup.classList.remove("checkAssignmentsOfUsers-clicked");
  overlay.style.display = "none";
}

function callUsersAssignmentsData(id) {
  function updateAssignmentList(id) {
    var selectedClass = $("#selectClass_assignment").val();
    var selectedSection = $("#selectSection_assignment").val();

    $.ajax({
      type: "GET",
      url: "assignment-check-users.php?a_id=" + id,
      data: {
        class: selectedClass,
        section: selectedSection,
      },
      success: function (response) {
        // console.log(response);
        var searchedBox = document.querySelector("#checkAssignmentsOfUsers");
        if (searchedBox) {
          searchedBox.innerHTML = response;
        } else {
          console.error("Element with ID 'searched-box' not found.");
        }
      },
    });
  }

  updateAssignmentList(id);
}

function downloadAll(id) {
  var links = document.querySelectorAll("#download" + id);
  links.forEach(function (link) {
    link.click();
  });
}

function acceptAssignment(sid, aid) {
  setTimeout(callUsersAssignmentsData(aid), 40);
  var xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    "../php/assignmentCheck/assignmentApproved.php?student_email=" +
      sid +
      "&assignmentId=" +
      aid,
    true
  );
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status == 200) {
    }
  };
  xhr.send();

  setTimeout(callUsersAssignmentsData(aid), 40);
  setTimeout(() => {
    checkAssignmentStatus();
  }, 100);
}

function RejectAssignment(sid, aid) {
  setTimeout(callUsersAssignmentsData(aid), 40);
  var xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    "../php/assignmentCheck/assignmentReject.php?student_email=" +
      sid +
      "&assignmentId=" +
      aid,
    true
  );
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status == 200) {
    }
  };
  xhr.send();

  setTimeout(callUsersAssignmentsData(aid), 40);
}

function checkAssignmentStatus() {
  let myTable = document.getElementById("assignmentTableForUsers");
  let tr = myTable.getElementsByTagName("tr");

  for (var i = 1; i < tr.length; i++) {
    var status = document.getElementById("status" + i).innerText;
    var approve = document.getElementById("approve" + i);
    var reject = document.getElementById("reject" + i);
    var approved = document.getElementById("approved" + i);

    if (status == "Approved") {
      approve.style.display = "none";
      reject.style.display = "none";
      approved.style.display = "block";
    }
  }
}
