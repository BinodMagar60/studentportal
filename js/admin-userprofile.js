//for user profile detail
//To add the bottom border in the input tag

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

let originalData = {};

// to store the original values when the page loads
document.addEventListener("DOMContentLoaded", function () {
  originalData = {
    name: document.getElementById("input-clicked1"),
    address: document.getElementById("input-clicked2"),
    contact: document.getElementById("input-clicked3"),
    photo: document.getElementById("uploadimage"),
  };
});

// to check for changes in the input fields
function checkChanges() {
  const nameInput = document.getElementById("input-clicked1");
  const addressInput = document.getElementById("input-clicked2");
  const contactInput = document.getElementById("input-clicked3");
  const updateButton = document.getElementById("updateButton");
  const photoInput = document.getElementById("uploadimage");

  //checking
  const changesDetected =
    nameInput !== originalData.name ||
    addressInput !== originalData.address ||
    contactInput !== originalData.contact ||
    photoInput !== originalData.photo;

  updateButton.disabled = !changesDetected;

  if (changesDetected) {
    updateButton.classList.add("changes");
  } else {
    updateButton.classList.remove("changes");
  }
}

// Handle the update button click
function updateForm() {
  alert("Form Updated!");
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
