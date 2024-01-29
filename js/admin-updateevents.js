function updateEvents() {
  var popupBox = document.getElementById("updatepopup");
  var overlay = document.getElementById("overlay");
  popupBox.classList.add("open-popup-box");
  overlay.style.display = "block";
}

function updateCancel() {
  var popupBox = document.getElementById("updatepopup");
  var overlay = document.getElementById("overlay");
  popupBox.classList.remove("open-popup-box");
  overlay.style.display = "none";
}


function deleteEvents(){
    var popupBox = document.getElementById("deleteevent");
    var overlay = document.getElementById("overlay");
    popupBox.classList.add("open-popup-box");
    overlay.style.display = "block";  
}

function deleteCancel(){
    var popupBox = document.getElementById("deleteevent");
    var overlay = document.getElementById("overlay");
    popupBox.classList.remove("open-popup-box");
    overlay.style.display = "none"; 
}