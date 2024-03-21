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

function assignmentShow() {
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

  setTimeout(() => {
    assignmentstableData();
    callAssignmentUploads();
  }, 100);
  setTimeout(() => {
    checkStudentAssignmentStatus();
  }, 250);
}

function ResultStudents() {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("container");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "resultstudent.php");
  xhr.send();
}

function notesShow() {
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
