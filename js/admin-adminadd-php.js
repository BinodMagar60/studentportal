



function submitAdminForm(event) {


    function openPopup(){
        popup.classList.add("open-popup");
    
        setTimeout(function() {
            closePopup();
        },2000);
    }
    
    function closePopup() {
        popup.classList.remove("open-popup");
    }
    

    var adminname = document.getElementById("a-name").value;
    var adminaddress = document.getElementById("a-address").value;
    var admindob = document.getElementById("a-dob").value;
    var admincontact = document.getElementById("a-contact").value;
    var adminmail = document.getElementById("a-mail").value;
    var adminphoto = document.getElementById("a-photo").value;
    var adminpassword = document.getElementById("a-password").value;
    

    

    if (adminname === ""){
        var e1 = document.getElementsByClassName("e-name")[0];
        e1.innerText = "*Full Name is Required";
        event.preventDefault();
    }
    else {
        var e1 = document.getElementsByClassName("e-name")[0];
        e1.innerText = "";
    }
    
    if(adminaddress === ""){
        var e2 = document.getElementsByClassName("e-address")[0];
        e2.innerHTML = "*Address is Required.";
        event.preventDefault();
    }
    else
    {
        var e2 = document.getElementsByClassName("e-address")[0];
        e2.innerHTML = "";
    }
    
    if (admindob === ""){
        var e3 = document.getElementsByClassName("e-date")[0];
        e3.innerText ="*D.O.B Required"
        event.preventDefault();
    }
    else{
        var e3 = document.getElementsByClassName("e-date")[0];
        e3.innerText = "";
    }

    if (admincontact === "") {
        var e4 = document.getElementsByClassName("e-contact")[0];
        e4.innerText = "*Contact Number Required";
        event.preventDefault();
    } 
    else if(!admincontact.match(/^(97|98)\d{8}$/)){
        var e4 = document.getElementsByClassName("e-contact")[0];
        e4.innerText = "*Invalid Contact Number";
        event.preventDefault();
    }
    else{
        var e4 = document.getElementsByClassName("e-contact")[0];
        e4.innerText = "";
    }
    
    if (adminmail === "") {
        var e5 = document.getElementsByClassName("e-email")[0];
        e5.innerText = "*Email Required";
        event.preventDefault();
    } else if (!adminmail.match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{3}$/)) {
        var e5 = document.getElementsByClassName("e-email")[0];
        e5.innerText = "*Invalid Email";
        event.preventDefault();
    } else {
        var e5 = document.getElementsByClassName("e-email")[0];
        e5.innerText = "";
    }

    if(adminphoto === ""){
        var e6 = document.getElementsByClassName("e-image")[0];
        e6.innerText = "*Required";
        event.preventDefault();
    }
    else
    {
        var e6 = document.getElementsByClassName("e-image")[0];
        e6.innerText = "";
    }

    if (adminpassword === "")
    {
        var e7 = document.getElementsByClassName("e-password")[0];
        e7.innerText = "*Password Required";
        event.preventDefault();
    }
    else if (adminpassword.includes(' '))
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


    var formData = new FormData(document.getElementById('adminForm'));


    
    $.ajax({
        url: '../php/add/admin_add.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log('Response:', response);
            // alert('Student added successfully!');
            openPopup();
            document.getElementById('adminForm').reset();
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
//     var form = $('#studentForm');
//     if (form.length) {
//         form.submit(submitForm);
//     } else {
//         console.error('Error: Form element not found');
//     }
// });
