function admin1UserProfile() {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("container");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "admin-adminprofile-personalinfo.php");
  xhr.send();
}

function admin1UserSetting() {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("container");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "admin-adminprofile-setting.php");
  xhr.send();
}

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
  xhr.open("GET", "admin-sidenotifications.php");
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
      `${monthString} ${dateString}, ${today.getFullYear()}`
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
  xhr.open("GET", "admin-sideAnnouncements.php");
  xhr.send();
}
