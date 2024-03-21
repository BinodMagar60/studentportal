function deletePopup() {
  var popupBox = document.getElementById("popup_box");
  var overlay = document.getElementById("overlay");
  popupBox.classList.add("open-popup_box");
  overlay.style.display = "block";
}
function cancelPopup() {
  var popupBox = document.getElementById("popup_box");
  var overlay = document.getElementById("overlay");
  popupBox.classList.remove("open-popup_box");
  overlay.style.display = "none";
}
