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
