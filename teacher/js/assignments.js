

    function assignmentValidation(){
        var expInput = document.getElementById("exp");
        var titleInput = document.getElementById("title");
        var descriptionInput = document.getElementById("description");

        var exp = expInput.value;
        var title = titleInput.value;
        var description = descriptionInput.value;

        var e1 = document.querySelector('.error1');
        var e2 = document.querySelector('.error2');
        var e3 = document.querySelector('.error3');
        var valid = 0;

        if(exp === ""){
            e1.innerText = "*Expiration Date is required";
            valid = valid + 1;
        } else {
            e1.innerText = "";
        }

        if(title === ""){
            e2.innerText = "*Title is required";
            valid = valid + 1;
        } else {
            e2.innerText = "";
        }

        if(description === ""){
            e3.innerText = "*Description is required";
            valid = valid + 1;
        } else {
            e3.innerText = "";
        }

        if(valid === 0)
        {
            assignmentPopup();
            
        }
       


    }



    


















function assignmentPopup(){
    var popupbox = document.getElementById("popup-assignment-submit");
    popupbox.classList.add("popup-assignment-submit-clicked");
    setTimeout(() => {
        removeAssignmentPopup()
        document.getElementById("assignment-form").reset();
    }, 1100);
}

function removeAssignmentPopup(){
    var popupbox = document.getElementById("popup-assignment-submit");
    popupbox.classList.remove("popup-assignment-submit-clicked");
}





