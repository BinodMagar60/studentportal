function sectionChange() {
  var studentClass = document.getElementById("class-notify").value;
  var studentSection = document.getElementById("section-notify");
  console.log(studentClass);
  if (studentClass == "everyone") {
    studentSection.style.display = "none";
  } else {
    studentSection.style.display = "block";
  }
}

function notifyVerification(event) {
  event.preventDefault();
  var classSel = document.getElementById("section-notify");
  var exp = document.getElementById("exp-notif").value;
  var des = document.getElementById("description-notif").value;

  var e1 = document.querySelector(".error1");
  var e2 = document.querySelector(".error2");

  var valid = 0;

  if (exp === "") {
    e1.innerText = "*Required";
    event.preventDefault();
    valid = valid + 1;
  } else {
    e1.innerText = "";
  }

  if (des === "") {
    e2.innerText = "*Required";
    event.preventDefault();
    valid = valid + 1;
  } else {
    e2.innerText = "";
  }

  if (valid === 0) {
    var formData = new FormData(document.getElementById("notification-form"));

    $.ajax({
      url: "../php/notify/addNotify.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        setTimeout(notificationPopupShow, 50);
        setTimeout(document.getElementById("notification-form").reset(), 100);
        classSel.style.display = "none";
        notifyList();
      },
      error: function (xhr, status, error) {
        console.error("Error:", status, error);
        console.log("Response Text:", xhr.responseText);
        alert("Error adding student. Please try again.");
      },
    });
  }
}

function notificationPopupShow() {
  var popup = document.getElementById("popup-Notice-submit");
  popup.classList.add("popup-Notice-submit-clicked");
  setTimeout(() => {
    popup.classList.remove("popup-Notice-submit-clicked");
  }, 1500);
}

function notifyDelete(id) {
  var popup = document.getElementById("notify-delete-" + id);
  var overlay = document.getElementById("overlay");
  popup.classList.add("notify-delete-popup");
  overlay.style.display = "block";
}

function notifyDeleteRemove(id) {
  var popup = document.getElementById("notify-delete-" + id);
  var overlay = document.getElementById("overlay");
  popup.classList.remove("notify-delete-popup");
  overlay.style.display = "none";
}

function notifyDeletePopup() {
  var popup = document.getElementById("popup-notice-delete-successfully");
  popup.classList.add("popup-Notice-submit-clicked");
  setTimeout(() => {
    popup.classList.remove("popup-Notice-submit-clicked");
  }, 1500);
}

function notifyUpdate(notifyId) {
  var popup = document.getElementById("update-notice");
  var overlay = document.getElementById("overlay");
  popup.classList.add("update-notice-show");
  overlay.style.display = "block";
  setTimeout(callDataNotify(notifyId), 20);
}

function callDataNotify(notifyId) {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("update-notice");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "notify-update.php?id=" + notifyId);
  xhr.send();
}

function notifyUpdateRemove() {
  var popup = document.getElementById("update-notice");
  var overlay = document.getElementById("overlay");
  popup.classList.remove("update-notice-show");
  overlay.style.display = "none";
}

function notifyUpdatePopup() {
  var id = $("#update-notice input[name='id']").val();
  var exp_date = $("#update-notice input[name='e_date']").val();
  var description = $("#update-notice textarea[name='description']").val();
  var class_selected = $("#update-notice select[name='class']").val();
  var section = $("#update-notice select[name='section']").val();

  $.ajax({
    type: "POST",
    url: "../php/notify/updateNotify.php",
    data: {
      id: id,
      e_date: exp_date,
      description: description,
      class: class_selected,
      section: section,
    },
    success: function (response) {
      console.log(response);
    },
    error: function (error) {
      console.log(error);
    },
  });

  notifyUpdateRemove();
  var popup = document.getElementById("popup-notice-update-successfully");
  popup.classList.add("popup-Notice-submit-clicked");
  setTimeout(() => {
    popup.classList.remove("popup-Notice-submit-clicked");
    notifyList();
  }, 1500);
}

function confirmDelete(notifyId) {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "../php/notify/deleteNotify.php?uid=" + notifyId, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status == 200) {
    }
  };
  xhr.send();

  setTimeout(() => {
    notifyDeleteRemove(notifyId);
  }, 30);

  setTimeout(() => {
    notifyDeletePopup();
    notifyList();
  }, 30);
}
