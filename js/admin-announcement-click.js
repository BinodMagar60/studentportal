function selectWhom() {
  var toSelect = document.getElementById("To");
  var selectClass = document.getElementById("Selectclass");
  var whichSection = document.getElementById("Selectsection");
  selectClass.style.display = toSelect.value === "student" ? "block" : "none";
  whichSection.style.display =
    toSelect.value === "student" && selectClass.value !== "allclass"
      ? "block"
      : "none";
}

function selectWhich() {
  var which = document.getElementById("Selectclass");
  var whichSection = document.getElementById("Selectsection");
  whichSection.style.display = which.value !== "allclass" ? "block" : "none";
}
