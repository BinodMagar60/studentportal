document.addEventListener("DOMContentLoaded", function () {
  const dropdownButtons = document.querySelectorAll(".dropdown-1");

  dropdownButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const currentSubclass = this.nextElementSibling;

      //to hide or display the submenues form box
      dropdownButtons.forEach((otherButton) => {
        const otherSubclass = otherButton.nextElementSibling;
        if (otherSubclass !== currentSubclass) {
          otherSubclass.classList.remove("active");
        }
      });
      currentSubclass.classList.toggle("active");
    });
  });
});

let activeButton = 1;

function toggleButton(buttonNumber) {
  const clickedButton = document.getElementById(`button${buttonNumber}`);
  const activeButtonElement = document.getElementById(`button${activeButton}`);

  // Check if the clicked button is different from the active button
  if (buttonNumber !== activeButton) {
    // Enable the previously disabled button instantly
    activeButtonElement.disabled = false;
    activeButtonElement.classList.remove("active");

    // Disable the clicked button
    clickedButton.classList.add("active");
    clickedButton.disabled = true;

    activeButton = buttonNumber;
  }
}

function logoutPopup() {
  var popupBox = document.getElementById("popup-log");
  var overlay = document.getElementById("overlay");
  popupBox.classList.add("open-popup-log");
  overlay.style.display = "block";
}
function cancelLogoutPopup() {
  var popupBox = document.getElementById("popup-log");
  var overlay = document.getElementById("overlay");
  popupBox.classList.remove("open-popup-log");
  overlay.style.display = "none";
}

//ajax calls

function notes() {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("container");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "notes.php");
  xhr.send();

  setTimeout(() => {
    notetableData();
  }, 100);
}

function classRoutineShow() {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("container");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "classroutine.php");
  xhr.send();

  setTimeout(() => {
    tableDataClassRoutine();
  }, 100);
}

function examRoutineShow() {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("container");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "examroutine.php");
  xhr.send();
}

function resultTeacher() {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("container");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "result.php");
  xhr.send();
}

function notifyList() {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("notify-table");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "notify-list.php");
  xhr.send();
}

function studentDetails() {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("container");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
      hideOldEvents();
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "studentdetail.php");
  xhr.send();
  setTimeout(tableData, 50);
}

function studentAttandence() {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("container");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "attendance.php");
  xhr.send();

  setTimeout(tableDataAttendance, 50);
}

function studentAssignment() {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("container");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "assignments.php");
  xhr.send();

  setTimeout(tableDataAssignment, 50);
}

function studentAssignmentCheck() {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("container");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "assignment-check.php");
  xhr.send();

  setTimeout(() => {
    assignmentCheckData();
  }, 100);
}

function studentNotify() {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("container");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "notify.php");
  xhr.send();
  setTimeout(notifyList, 50);
}
