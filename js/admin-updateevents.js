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


function deleteEvents(){
    var popupBox = document.getElementById("deleteevent");
    var overlay = document.getElementById("overlay");
    popupBox.classList.add("open-popup-box");
    overlay.style.display = "block";  
}

function deleteCancel(){
    var popupBox = document.getElementById("deleteevent");
    var overlay = document.getElementById("overlay");
    popupBox.classList.remove("open-popup-box");
    overlay.style.display = "none"; 
}




function eventLists(){
  $(document).ready(function () {
    

      $.ajax({
        url: '../php/event/eventDetail.php', 
        type: 'GET',
        dataType: 'html',
        success: function (response) {
          $('#eventlist').html(response); 
          console.log(response);
        },
        error: function () {
          alert('Error loading table data.');
        }
      });
    
})

}