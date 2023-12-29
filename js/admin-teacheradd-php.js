



function submitTeacherForm(event) {


    function openPopup(){
        popup.classList.add("open-popup");
    
        setTimeout(function() {
            closePopup();
        },2000);
    }
    
    function closePopup() {
        popup.classList.remove("open-popup");
    }
    
   
    var teachername = document.getElementById("t-name").value;
    var teacheraddress = document.getElementById("t-address").value;
    var teacherdob = document.getElementById("t-dob").value;
    var teachercontact = document.getElementById("t-contact").value;
    var teachermail = document.getElementById("t-mail").value;
    var teacherphoto = document.getElementById("t-photo").value;
    var teacherpassword = document.getElementById("t-password").value;
    

    

    if (teachername === ""){
        var e1 = document.getElementsByClassName("e-name")[0];
        e1.innerText = "*Full Name is Required";
        event.preventDefault();
    }
    else {
        var e1 = document.getElementsByClassName("e-name")[0];
        e1.innerText = "";
    }
    
    if(teacheraddress === ""){
        var e2 = document.getElementsByClassName("e-address")[0];
        e2.innerHTML = "*Address is Required.";
        event.preventDefault();
    }
    else
    {
        var e2 = document.getElementsByClassName("e-address")[0];
        e2.innerHTML = "";
    }
    
    if (teacherdob === ""){
        var e3 = document.getElementsByClassName("e-date")[0];
        e3.innerText ="*D.O.B Required"
        event.preventDefault();
    }
    else{
        var e3 = document.getElementsByClassName("e-date")[0];
        e3.innerText = "";
    }

    if (teachercontact === "") {
        var e4 = document.getElementsByClassName("e-contact")[0];
        e4.innerText = "*Contact Number Required";
        event.preventDefault();
    } 
    else if(!teachercontact.match(/^(97|98)\d{8}$/)){
        var e4 = document.getElementsByClassName("e-contact")[0];
        e4.innerText = "*Invalid Contact Number";
        event.preventDefault();
    }
    else {
        var e4 = document.getElementsByClassName("e-contact")[0];
        e4.innerText = "";
    }
    
    if (teachermail === "") {
        var e5 = document.getElementsByClassName("e-email")[0];
        e5.innerText = "*Email Required";
        event.preventDefault();
    } else if (!teachermail.match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{3}$/)) {
        var e5 = document.getElementsByClassName("e-email")[0];
        e5.innerText = "*Invalid Email";
        event.preventDefault();
    } else {
        var e5 = document.getElementsByClassName("e-email")[0];
        e5.innerText = "";
    }

    if(teacherphoto === ""){
        var e6 = document.getElementsByClassName("e-image")[0];
        e6.innerText = "*Required";
        event.preventDefault();
    }
    else
    {
        var e6 = document.getElementsByClassName("e-image")[0];
        e6.innerText = "";
    }

    if (teacherpassword === "")
    {
        var e7 = document.getElementsByClassName("e-password")[0];
        e7.innerText = "*Password Required";
        event.preventDefault();
    }
    else if (teacherpassword.includes(' '))
    {
        var e7 = document.getElementsByClassName("e-password")[0];
        e7.innerText = "*Space is invalid";
        event.preventDefault();
    }
    else{
        var e7 = document.getElementsByClassName("e-password")[0];
        e7.innerText = "";
    }

   
    if (event.defaultPrevented){
        return false;
    }


    var formData = new FormData(document.getElementById('teacherForm'));


    
    $.ajax({
        url: '../php/add/teacher_add.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log('Response:', response);
            // alert('Student added successfully!');
            openPopup();
            document.getElementById('teacherForm').reset();
        },
        error: function (xhr, status, error) {
            console.error('Error:', status, error);
            console.log('Response Text:', xhr.responseText);
            alert('Error adding student. Please try again.');
        }
        
    });
    event.preventDefault();
}

// Attach the submitForm function to the form's submit event using jQuery
// $(document).ready(function () {
//     var form = $('#teacherForm');
//     if (form.length) {
//         form.submit(submitForm);
//     } else {
//         console.error('Error: Form element not found');
//     }
// });
