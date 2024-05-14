function updateEventsPopup(noticeId) {
  var popupBox = document.getElementById("updatepopup-change");
  var overlay = document.getElementById("overlay");
  popupBox.classList.add("updatepopup-change-down");
  overlay.style.display = "block";
  setTimeout(callData(noticeId), 50);
}

function updateEventsPopupCancel() {
  var popupBox = document.getElementById("updatepopup-change");
  var overlay = document.getElementById("overlay");
  popupBox.classList.remove("updatepopup-change-down");
  overlay.style.display = "none";
}

function callData(noticeId) {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("updatepopup-change");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "admin-eventupdate.php?id=" + noticeId);
  xhr.send();
}




function deleteEvents(id){
  var popupBox = document.getElementById("eventsDelete");
  var overlay = document.getElementById("overlay");
  popupBox.classList.add("eventsDelete-down");
  overlay.style.display = "block";
  setTimeout(callDataDelete(id), 50);
}



function deleteCancel() {
  var popupBox = document.getElementById("deleteevent");
  var overlay = document.getElementById("overlay");
  popupBox.classList.remove("open-popup-box");
  overlay.style.display = "none";
}



function callDataDelete(id) {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("eventsDelete");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "admin-deleteEvents.php?id=" + id);
  xhr.send();
}






function eventLists() {
  $(document).ready(function () {
    $.ajax({
      url: "../php/event/eventDetail.php",
      type: "GET",
      dataType: "html",
      success: function (response) {
        $("#eventlist").html(response);
      },
      error: function () {
        alert("Error loading table data.");
      },
    });
  });
}

function addPopupEvent() {
  var popup = document.getElementById("successfull-updated");
  popup.classList.add("successfull-updated-pop");
  setTimeout(function () {
    removePopupEvent();
  }, 1100);
}

function removePopupEvent() {
  var popup = document.getElementById("successfull-updated");
  popup.classList.remove("successfull-updated-pop");
}

function deletePopupEvent() {
  var popup1 = document.getElementById("successfull-deleted");
  popup1.classList.add("successfull-deleted-pop");
  setTimeout(function () {
    removedeletePopupEvent();
  }, 1100);
}

function removedeletePopupEvent() {
  var popup1 = document.getElementById("successfull-deleted");
  popup1.classList.remove("successfull-deleted-pop");
}

function addUpdatePopupEvent() {
  var popup = document.getElementById("successfull-updated-update");
  popup.classList.add("successfull-updated-pop");
  setTimeout(function () {
    removeUpdatePopupEvent();
  }, 1100);
}

function removeUpdatePopupEvent() {
  var popup = document.getElementById("successfull-updated-update");
  popup.classList.remove("successfull-updated-pop");
}

function deleteEvent(eventId) {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "../php/event/deleteEvent.php?uid=" + eventId, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
    }
  };
  xhr.send();
  
  setTimeout(eventLists, 50);
  setTimeout(deletePopupEvent, 20);
}

function submitEvents(event) {
  var eventname = document.getElementById("notice").value;
  var n_date = document.getElementById("n_date").value;
  var error1 = document.getElementById("error1");
  var error2 = document.getElementById("error2");

  if (eventname === "") {
    error1.style.display = "block";
    event.preventDefault();
  } else {
    error1.style.display = "none";
  }

  if (n_date === "") {
    error2.style.display = "block";
    event.preventDefault();
  } else {
    error2.style.display = "none";
  }

  if (event.defaultPrevented) {
    return false;
  }

  var formData = new FormData(document.getElementById("eventForm"));

  $.ajax({
    url: "../php/event/addEvent.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      document.getElementById("eventForm").reset();
    },
    error: function (xhr, status, error) {
      console.error("Error:", status, error);
      console.log("Response Text:", xhr.responseText);
      alert("Error adding student. Please try again.");
    },
  });

  event.preventDefault();
  setTimeout(eventLists, 40);
  setTimeout(addPopupEvent, 30);
}

function eventUpdateLists() {
  var id = $("#updatepopup input[name='id']").val();
  var notice = $("#updatepopup input[name='notice']").val();
  var n_date = $("#updatepopup input[name='n_date']").val();

  $.ajax({
    type: "POST",
    url: "../php/event/updateEvent.php",
    data: {
      id: id,
      notice: notice,
      n_date: n_date,
    },
    success: function (response) {
      console.log("successfully updated");
      console.log(n_date);
      console.log(notice);
      console.log(id);
    },
    error: function (error) {
      console.log(error);
    },
  });

  updateEventsPopupCancel();
  setTimeout(eventLists, 50);
  setTimeout(function () {
    addUpdatePopupEvent();
  }, 100);
}
