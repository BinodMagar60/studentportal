// calander

let currentDate = new Date();
let selectedDate = currentDate;

document.addEventListener("DOMContentLoaded", function () {
  renderCalendar();
});
function renderCalendar() {
  const calendarBody = document.querySelector("#calendar tbody");
  const today = new Date();
  const firstDay = new Date(
    selectedDate.getFullYear(),
    selectedDate.getMonth(),
    1
  );
  const lastDay = new Date(
    selectedDate.getFullYear(),
    selectedDate.getMonth() + 1,
    0
  );
  const daysInMonth = lastDay.getDate();
  const startDay = firstDay.getDay();
  let dayCounter = 1;
  const options = { year: "numeric", month: "long", day: "numeric" };
  const formattedCurrentDate = currentDate.toLocaleDateString("en-US", options);
  document.getElementById("currentDate").textContent = formattedCurrentDate;
  calendarBody.innerHTML = "";
  for (let i = 0; i < 6; i++) {
    const row = document.createElement("tr");
    let rowHasDates = false;
    for (let j = 0; j < 7; j++) {
      const cell = document.createElement("td");
      if ((i === 0 && j < startDay) || dayCounter > daysInMonth) {
        cell.textContent = "";
      } else {
        cell.textContent = dayCounter;
        rowHasDates = true;
        const cellDate = new Date(
          selectedDate.getFullYear(),
          selectedDate.getMonth(),
          dayCounter
        );
        if (cellDate.toDateString() === today.toDateString()) {
          cell.classList.add("today");
        }

        if (cellDate.toDateString() === currentDate.toDateString()) {
          cell.classList.add("selected");
        }
        cell.addEventListener("click", function () {
          selectedDate = cellDate;
          renderCalendar();
        });
        dayCounter++;
      }
      row.appendChild(cell);
    }
    if (rowHasDates) {
      calendarBody.appendChild(row);
    }
  }
}
function showPreviousMonth() {
  selectedDate.setMonth(selectedDate.getMonth() - 1);
  renderCalendar();
  updateCurrentDate();
}
function showCurrentMonth() {
  selectedDate = new Date();
  renderCalendar();
  updateCurrentDate();
}
function showNextMonth() {
  selectedDate.setMonth(selectedDate.getMonth() + 1);
  renderCalendar();
  updateCurrentDate();
}

function updateCurrentDate() {
  const options = { year: "numeric", month: "long", day: "numeric" };
  const formattedCurrentDate = selectedDate.toLocaleDateString(
    "en-US",
    options
  );
  document.getElementById("currentDate").textContent = formattedCurrentDate;
}

$(document).ready(function () {
  $(".notif-btn").click(function () {
    $("body").addClass("calender-announcement-notices-active");
    $(".calender-announcement-notices").addClass("active");
    $(".notif-btn").css("visibility", "hidden");
  });

  $(".x-mark").click(function () {
    $("body").removeClass("calender-announcement-notices-active");
    $(".calender-announcement-notices").removeClass("active");
    $(".notif-btn").css("visibility", "visible");
  });
});

function eventNotification() {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("event-show");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
      hideOldEvents();
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "sidenotifications.php");
  xhr.send();
}

function hideOldEvents() {
  const eventElements = document.querySelectorAll(".event-show-2");

  const today = new Date();
  today.setHours(0, 0, 0, 0);
  eventElements.forEach((eventElement) => {
    const dateString = eventElement.querySelector(".event1-date").textContent;
    const monthString = eventElement.querySelector(".event1-month").textContent;

    const eventDate = new Date(
      `${monthString} =${dateString}, ${today.getFullYear()}`
    );

    if (eventDate < today) {
      eventElement.style.display = "none";
    }
  });
}

function announcementNotification() {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("announcement-show");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
      hideOldEvents();
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "sideAnnouncements.php");
  xhr.send();
}
