

//To add the bottom border in the input tag

function addBottomBorder(inputnumber) {
    document.getElementById(`input-clicked${inputnumber}`).classList.add("bottom-border");
  }

  function removeBottomBorder(inputnumber) {
    document.getElementById(`input-clicked${inputnumber}`).classList.remove("bottom-border");
  }







// to see if there is any changes in the input values and if there is then to activate the update button

  let originalData = {};

  // to store the original values when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    originalData = {
      name: document.getElementById('input-clicked1').value,
      address: document.getElementById('input-clicked2').value,
      contact: document.getElementById('input-clicked3').value,
      photo: document.getElementById('uploadimage').value,
    };
  });

  // to check for changes in the input fields
  function checkChanges() {
    const nameInput = document.getElementById('input-clicked1');
    const addressInput = document.getElementById('input-clicked2');
    const contactInput = document.getElementById('input-clicked3');
    const updateButton = document.getElementById('updateButton');
    const photoInput = document.getElementById('uploadimage');


    //checking
    const changesDetected =
      nameInput.value !== originalData.name ||
      addressInput.value !== originalData.address ||
      contactInput.value !== originalData.contact ||
      photoInput.value !== originalData.photo;

    updateButton.disabled = !changesDetected;

    if (changesDetected) {
      updateButton.classList.add('changes');
    } else {
      updateButton.classList.remove('changes');
    }
  }

  // Handle the update button click
  function updateForm() {
    alert('Form Updated!');
    
  }

