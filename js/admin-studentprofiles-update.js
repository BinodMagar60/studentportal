function addBottomBorder(inputnumber) {
  document
    .getElementById(`input-clicked${inputnumber}`)
    .classList.add("bottom-border");
}

function removeBottomBorder(inputnumber) {
  document
    .getElementById(`input-clicked${inputnumber}`)
    .classList.remove("bottom-border");
}
// to see if there is any changes in the input values and if there is then to activate the update button

let soriginalData = {};

// to store the original values when the page loads
document.addEventListener("DOMContentLoaded", function () {
  soriginalData = {
    name: document.getElementById("input-clicked1"),
    address: document.getElementById("input-clicked2"),
    contact: document.getElementById("input-clicked3"),
    photo: document.getElementById("uploadimage"),
    fname: document.getElementById("input-clicked4"),
    mname: document.getElementById("input-clicked5"),
    pcontact: document.getElementById("input-clicked6"),
  };
});

// to check for changes in the input fields
function checkChanges() {
  const nameInput = document.getElementById("input-clicked1");
  const addressInput = document.getElementById("input-clicked2");
  const contactInput = document.getElementById("input-clicked3");
  const updateButton = document.getElementById("updateButton");
  const photoInput = document.getElementById("uploadimage");
  const fnameInput = document.getElementById("input-clicked4");
  const mnameInput = document.getElementById("input-clicked5");
  const pcontactInput = document.getElementById("input-clicked6");

  //checking
  const changesDetected =
    nameInput !== soriginalData.name ||
    addressInput !== soriginalData.address ||
    contactInput !== soriginalData.contact ||
    photoInput !== soriginalData.photo ||
    fnameInput !== soriginalData.fname ||
    mnameInput !== soriginalData.mname ||
    pcontactInput !== soriginalData.pcontact;
  updateButton.disabled = !changesDetected;

  if (changesDetected) {
    updateButton.classList.add("changes");
  } else {
    updateButton.classList.remove("changes");
  }
}

// Handle the update button click
function updateStudentForm() {
  alert("Student Information Up");
}

function displayImage(input, location) {
  const imageContainer = document.getElementById("imageContainer");
  const uploadedImage = document.getElementById("uploadedImage");

  const file = input.files[0];

  if (file) {
    const reader = new FileReader();

    reader.onload = function (e) {
      uploadedImage.src = e.target.result;
    };

    reader.readAsDataURL(file);
  } else {
    uploadedImage.src = "../" + location;
  }
}
