let activeButton = 1;

function toggleButton(buttonNumber) {
  const clickedButton = document.getElementById(`button${buttonNumber}`);
  const activeButtonElement = document.getElementById(`button${activeButton}`);

  // Check if the clicked button is different from the active button
  if (buttonNumber !== activeButton) {
    // Enable the previously disabled button instantly
    activeButtonElement.disabled = false;
    activeButtonElement.classList.remove("active");

    // Disable the clicked button
    clickedButton.classList.add("active");
    clickedButton.disabled = true;

    activeButton = buttonNumber;
  }
}
