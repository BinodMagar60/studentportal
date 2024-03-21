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
