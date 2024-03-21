function studentProfile() {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("container");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "Studentprofile-profile.php");
  xhr.send();
}

function studentProfileSetting() {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("container");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "Studentprofile-setting.php");
  xhr.send();
}

function updatePassword(event) {
  var newpassword = document.getElementById("new-password").value;
  var reenterpassword = document.getElementById("re-enterpassword").value;
  if (newpassword === "") {
    var e1 = document.getElementsByClassName("error")[0];
    e1.innerText = "*New Password required";
    event.preventDefault();
  } else {
    var e1 = document.getElementsByClassName("error")[0];
    e1.innerText = "";
  }
  if (reenterpassword === "" || reenterpassword !== newpassword) {
    var e2 = document.getElementsByClassName("error2")[0];
    e2.innerHTML = "*Passowrd Doesn't Match";
    event.preventDefault();
  } else {
    var e1 = document.getElementsByClassName("error2")[0];
    e1.innerText = "";
  }
  if (!event.defaultPrevented) {
    alert("Your password has been updated successfully");
  }
}
