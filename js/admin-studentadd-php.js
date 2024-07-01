function checkDate(inputtedDate){
  var yearOnly = inputtedDate.split("-");
  var today = new Date();
  var year = today.getFullYear();
  var age = year - yearOnly[0];
  return age;
}

function checkFileType() {

  var input = document.getElementById('s-photo');
  var file = input.files[0];
  if (file) {
      var fileType = file.type;
      if (fileType !== 'image/jpeg' && fileType !== 'image/png') {
          // alert('Please select a JPEG or PNG file.');
          var e6 = document.getElementsByClassName("e-image")[0];
          e6.innerText = "Please select a JPEG or PNG file.";
          input.value = ''; // Clear the input
      }
  }
}






function submitForm(event) {
  function openPopup() {
    var popup = document.getElementById("popupbox");
    popup.classList.add("successfull-added-pop");
    setTimeout(function () {
      closePopup();
    }, 1100);
  }

  function closePopup() {
    var popup = document.getElementById("popupbox");
    popup.classList.remove("successfull-added-pop");
  }

  var studentname = document.getElementById("s-name").value;
  var studentaddress = document.getElementById("s-address").value;
  var studentdob = document.getElementById("s-dob").value;
  var studentcontact = document.getElementById("s-contact").value;
  var studentmail = document.getElementById("s-mail").value;
  var studentphoto = document.getElementById("s-photo").value;
  var fathername = document.getElementById("s-father").value;
  var mothername = document.getElementById("s-mother").value;
  var parentcontact = document.getElementById("s-parentcontact").value;
  var studentpassword = document.getElementById("s-password").value;
  var regex = /^[A-Za-z]/;

  

// console.log(studentphoto);

  // checkDate(studentdob)
  
  if (studentname === "") {
    var e1 = document.getElementsByClassName("e-name")[0];
    e1.innerText = "*Full Name is Required";
    event.preventDefault();
  } else if (!regex.test(studentname)){
    var e1 = document.getElementsByClassName("e-name")[0];
    e1.innerText = "*Only Alphabets are allowed in FullName.";
    event.preventDefault();
  } else {
    var e1 = document.getElementsByClassName("e-name")[0];
    e1.innerText = "";
  }

  if (studentaddress === "") {
    var e2 = document.getElementsByClassName("e-address")[0];
    e2.innerHTML = "*Address is Required.";
    event.preventDefault();
  } else {
    var e2 = document.getElementsByClassName("e-address")[0];
    e2.innerHTML = "";
  }

  if (studentdob === "") {
    var e3 = document.getElementsByClassName("e-date")[0];
    e3.innerText = "*D.O.B Required";
    event.preventDefault();
  } else if(checkDate(studentdob) < 4){
    var e3 = document.getElementsByClassName("e-date")[0];
    e3.innerText = "*Age cannot be less than 4 Year old";
    event.preventDefault();
  } else {
    var e3 = document.getElementsByClassName("e-date")[0];
    e3.innerText = "";
  }

  if (studentcontact === "") {
    var e4 = document.getElementsByClassName("e-contact")[0];
    e4.innerText = "*Contact Number Required";
    event.preventDefault();
  } else if (!studentcontact.match(/^(97|98)\d{8}$/)) {
    var e4 = document.getElementsByClassName("e-contact")[0];
    e4.innerText = "*Invalid Contact Number";
    event.preventDefault();
  } else {
    var e4 = document.getElementsByClassName("e-contact")[0];
    e4.innerText = "";
  }

  if (studentmail === "") {
    var e5 = document.getElementsByClassName("e-email")[0];
    e5.innerText = "*Email Required";
    event.preventDefault();
  } else if (
    !studentmail.match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{3}$/)
  ) {
    var e5 = document.getElementsByClassName("e-email")[0];
    e5.innerText = "*Invalid Email";
    event.preventDefault();
  } else {
    var e5 = document.getElementsByClassName("e-email")[0];
    e5.innerText = "";
  }

  if (studentphoto === "") {
    var e6 = document.getElementsByClassName("e-image")[0];
    e6.innerText = "*Required";
    event.preventDefault();
  } else {
    var e6 = document.getElementsByClassName("e-image")[0];
    e6.innerText = "";
  }

  if (fathername === "") {
    var e7 = document.getElementsByClassName("e-fname")[0];
    e7.innerText = "*Required";
    event.preventDefault();
  } else if (!regex.test(fathername)){
    var e7=document.getElementsByClassName('e-fname')[0]
    e7.innerText='*Only Alphabets are allowed in Father Name.'
    event.preventDefault()
  } else {
    var e7 = document.getElementsByClassName("e-fname")[0];
    e7.innerText = "";
  }

  if (mothername === "") {
    var e8 = document.getElementsByClassName("e-mname")[0];
    e8.innerText = "*Required";
    event.preventDefault();
  } else if (!regex.test(mothername)){
    var e8=document.getElementsByClassName('e-mname') [0]
    e8.innerText="*Only Alphabets are allowed in Mother Name."
    event.preventDefault()
  } else {
    var e8 = document.getElementsByClassName("e-mname")[0];
    e8.innerText = "";
  }

  if (parentcontact === "") {
    var e9 = document.getElementsByClassName("e-pcontact")[0];
    e9.innerText = "*Contact Number Required";
    event.preventDefault();
  } else if (!parentcontact.match(/^(97|98)\d{8}$/)) {
    var e9 = document.getElementsByClassName("e-pcontact")[0];
    e9.innerText = "*Invalid Contact Number";
    event.preventDefault();
  } else {
    var e9 = document.getElementsByClassName("e-pcontact")[0];
    e9.innerText = "";
  }

  if (studentpassword === "") {
    var e10 = document.getElementsByClassName("e-password")[0];
    e10.innerText = "*Password Required";
    event.preventDefault();
  } else if (studentpassword.includes(" ")) {
    var e10 = document.getElementsByClassName("e-password")[0];
    e10.innerText = "*Space is invalid";
    event.preventDefault();
  } else {
    var e10 = document.getElementsByClassName("e-password")[0];
    e10.innerText = "";
  }

  if (event.defaultPrevented) {
    return false;
  }

  var formData = new FormData(document.getElementById("studentForm"));

  $.ajax({
    url: "../php/add/student_add.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      // console.log('Response:', response);
      if (response) {
        var e5 = document.getElementsByClassName("e-email")[0];
        e5.innerText = "*Email Already Exist";
        event.preventDefault();
      } else {
        var e5 = document.getElementsByClassName("e-email")[0];
        e5.innerText = "";
        openPopup();
        document.getElementById("studentForm").reset();
      }
    },
    error: function (xhr, status, error) {
      console.error("Error:", status, error);
      console.log("Response Text:", xhr.responseText);
      alert("Error adding student. Please try again.");
    },
  });
  event.preventDefault();
}

// Attach the submitForm function to the form's submit event using jQuery
// $(document).ready(function () {
//     var form = $('#studentForm');
//     if (form.length) {
//         form.submit(submitForm);
//     } else {
//         console.error('Error: Form element not found');
//     }
// });
