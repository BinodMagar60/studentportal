

function assignmentValidation(event){
    var exp = document.getElementById("exp");
    var title = document.getElementById( "title" );
    var description = document.getElementById("description");

    if(exp === ""){
        var e1 = document.querySelector('.error1')[0];
        e1.innerText = "*Required";
        event.preventDefault();
    }
    else
    {
        var e1 = document.querySelector( '.error1' )[0];
        e1.innerText = "";
    }

    if(event.preventDefault){
        return false;

    }


}


















function assignmentPopup(){
    var popupbox = document.getElementById("popup-assignment-submit");
    popupbox.classList.add("popup-assignment-submit-clicked");
    setTimeout(() => {
        removeAssignmentPopup()
    }, 1100);
}

function removeAssignmentPopup(){
    var popupbox = document.getElementById("popup-assignment-submit");
    popupbox.classList.remove("popup-assignment-submit-clicked");
}





