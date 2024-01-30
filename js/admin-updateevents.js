function updateEvents() {
  var popupBox = document.getElementById("updatepopup");
  var overlay = document.getElementById("overlay");
  popupBox.classList.add("open-popup-box");
  overlay.style.display = "block";
}

function updateCancel() {
  var popupBox = document.getElementById("updatepopup");
  var overlay = document.getElementById("overlay");
  popupBox.classList.remove("open-popup-box");
  overlay.style.display = "none";
}

function deleteEvents() {
  var popupBox = document.getElementById("deleteevent");
  var overlay = document.getElementById("overlay");
  popupBox.classList.add("open-popup-box");
  overlay.style.display = "block";
}

function deleteCancel() {
  var popupBox = document.getElementById("deleteevent");
  var overlay = document.getElementById("overlay");
  popupBox.classList.remove("open-popup-box");
  overlay.style.display = "none";
}

function eventLists() {
  $(document).ready(function () {
    $.ajax({
      url: "../php/event/eventDetail.php",
      type: "GET",
      dataType: "html",
      success: function (response) {
        $("#eventlist").html(response);
        
      },
      error: function () {
        alert("Error loading table data.");
      },
    });
  });
}

function addPopupEvent(){
  var popup = document.getElementById("successfull-updated");
  popup.classList.add("successfull-updated-pop")
  setTimeout(function(){
    removePopupEvent();
  } ,1100);
}


function removePopupEvent(){
  var popup = document.getElementById("successfull-updated");
  popup.classList.remove("successfull-updated-pop")
}



function deletePopupEvent(){
  var popup1 = document.getElementById("successfull-deleted");
  popup1.classList.add("successfull-deleted-pop")
  setTimeout(function(){
    removedeletePopupEvent();
  } ,1100);
}


function removedeletePopupEvent(){
  var popup1 = document.getElementById("successfull-deleted");
  popup1.classList.remove("successfull-deleted-pop")
}

function deleteEvent(eventId) {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "../php/event/deleteEvent.php?uid=" + eventId, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
    }
  };
  xhr.send();
  deleteCancel();
  setTimeout(eventLists,20);
  setTimeout(deletePopupEvent,20)
}


function submitEvents(event){
  var eventname = document.getElementById("notice").value;
  var n_date = document.getElementById("n_date").value;
  var error1 = document.getElementById("error1");
  var error2= document.getElementById("error2");

  if(eventname === ""){
    error1.style.display = "block";
    event.preventDefault();

  }
  else{
    error1.style.display = "none"
  }

  if(n_date ===""){
    error2.style.display = "block";
    event.preventDefault();

  }
  else{
    error2.style.display = "none";
  }



  
  if(event.defaultPrevented){
    return false;
  }

  var formData = new FormData(document.getElementById("eventForm"));


  $.ajax({
    url: '../php/event/addEvent.php',
    type: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
        document.getElementById('eventForm').reset();
    },
    error: function (xhr, status, error) {
        console.error('Error:', status, error);
        console.log('Response Text:', xhr.responseText);
        alert('Error adding student. Please try again.');
    }
    
});

event.preventDefault();
setTimeout(eventLists,30);
setTimeout(addPopupEvent,30);

}











