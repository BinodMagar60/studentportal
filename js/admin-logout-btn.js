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
