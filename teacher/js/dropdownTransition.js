document.addEventListener("DOMContentLoaded", function () {
    const dropdownButtons = document.querySelectorAll(".dropdown-1");

    dropdownButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const currentSubclass = this.nextElementSibling;

            //to hide or display the submenues form box
            dropdownButtons.forEach((otherButton) => {
                const otherSubclass = otherButton.nextElementSibling;
                if (otherSubclass !== currentSubclass) {
                    otherSubclass.classList.remove("active");
                }
            });
            currentSubclass.classList.toggle("active");
        });
    });
});






let activeButton = 1;

function toggleButton(buttonNumber) {
  const clickedButton = document.getElementById(`button${buttonNumber}`);
  const activeButtonElement = document.getElementById(`button${activeButton}`);

  // Check if the clicked button is different from the active button
  if (buttonNumber !== activeButton) {
    // Enable the previously disabled button instantly
    activeButtonElement.disabled = false;
    activeButtonElement.classList.remove('active');

    // Disable the clicked button
    clickedButton.classList.add('active');
    clickedButton.disabled = true;

    
    activeButton = buttonNumber;
  }
}








function logoutPopup() {
    var popupBox = document.getElementById("popup-log");
    var overlay = document.getElementById("overlay");
    popupBox.classList.add("open-popup-log");
    overlay.style.display = 'block'
   
    
  }
  function cancelLogoutPopup() {
    var popupBox = document.getElementById("popup-log");
    var overlay = document.getElementById("overlay");
    popupBox.classList.remove("open-popup-log");
    overlay.style.display = 'none';
  
  }







//ajax calls


function studentDetails(){
  const xhr = new XMLHttpRequest();
  const container = document.getElementById('container');

  xhr.onload = function () {
      if (this.status === 200) {
          container.innerHTML = xhr.responseText;
          hideOldEvents(); 
      } else {
          console.warn("Did not receive 200 OK from response!");
      }
  };
  xhr.open('GET', 'studentdetail.php');
  xhr.send();
  setTimeout(tableData,50);
}


function studentAttandence(){
  const xhr = new XMLHttpRequest();
  const container = document.getElementById('container');

  xhr.onload = function () {
      if (this.status === 200) {
          container.innerHTML = xhr.responseText;
          hideOldEvents(); 
      } else {
          console.warn("Did not receive 200 OK from response!");
      }
  };
  xhr.open('GET', 'attendance.php');
  xhr.send();
  setTimeout(tableData,50);
}












