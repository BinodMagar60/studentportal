function validateForm(event) {
  var emailInput = document.getElementById("email");
  var passwordInput = document.getElementById("password");
  var email = emailInput.value;
  var password = passwordInput.value;

  if (email === "") {
    var emailError = document.getElementsByClassName("email-error")[0];
    emailError.innerText = "*Empty E-mail";
  } else if (!email.match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{3}$/)) {
    var emailError = document.getElementsByClassName("email-error")[0];
    emailError.innerText = "*Invalid Email";
  } else {
    var emailError = document.getElementsByClassName("email-error")[0];
    emailError.innerText = "";
  }

  if (password === "") {
    var passwordError = document.getElementsByClassName("password-error")[0];
    passwordError.innerText = "*Password Requred";
  } else {
    var passwordError = document.getElementsByClassName("password-error")[0];
    passwordError.innerText = "";
  }

  if (
    email === "" ||
    !email.match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{3}$/) ||
    password === ""
  ) {
    event.preventDefault();
  } else {
    return true;
  }
}
