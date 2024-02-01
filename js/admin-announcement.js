


function announcementLists() {
    $(document).ready(function () {
      $.ajax({
        url: "../php/announcement/announcementDetail.php",
        type: "GET",
        dataType: "html",
        success: function (response) {
          $("#announcementlist").html(response);
          
        },
        error: function () {
          alert("Error loading table data.");
        },
      });
    });
  }



  function announcementUpdateLists(event) {
 
    var eventname = document.getElementById("a_description").value;
    var n_date = document.getElementById("a_date").value;
    var error1 = document.getElementById("e-date");
    var error2= document.getElementById("e-des");
  
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
  
    var formData = new FormData(document.getElementById("announcementForm"));
  
  
    $.ajax({
      url: '../php/announcement/add_announcement.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
          document.getElementById('announcementForm').reset();
      },
      error: function (xhr, status, error) {
          console.error('Error:', status, error);
          console.log('Response Text:', xhr.responseText);
          alert('Error adding student. Please try again.');
      }
      
  });
  
  event.preventDefault();
setTimeout(announcementLists,30)
setTimeout(addPopupEvent,30);
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

  function deletePopupAnnouncement(){
    var popup1 = document.getElementById("successfull-deleted-announcement");
  popup1.classList.add("successfull-deleted-announcement-pop")
  setTimeout(function(){
    removedeletePopupAnnouncement();
  } ,1100);
  }

  function removedeletePopupAnnouncement(){
    var popup1 = document.getElementById("successfull-deleted-announcement");
    popup1.classList.remove("successfull-deleted-announcement-pop")
  }


function deleteAnnouncement(announcementId){
  var xhr = new XMLHttpRequest();
  xhr.open("GET","../php/announcement/deleteAnnouncement.php?uid="+announcementId, true);
  xhr.onreadystatechange = function () {
    if(xhr.readyState ===4 && xhr.status == 200){

    }
  };
  xhr.send();
  deleteAnnouncementCancel();
  setTimeout(announcementLists,20);
  setTimeout(deletePopupAnnouncement,20)

}


function deleteAnnouncements(){
  var popupBox = document.getElementById("deleteannouncement");
  var overlay = document.getElementById("overlay");
  popupBox.classList.add("open-popup-box");
  overlay.style.display = "block";
}

function deleteAnnouncementCancel(){
  var popupBox = document.getElementById("deleteannouncement");
  var overlay = document.getElementById("overlay");
  popupBox.classList.remove("open-popup-box");
  overlay.style.display = "none";
}


function updateAnnouncementPopup(announcementId){
  var popupBox = document.getElementById("updatepopup-change-announcement");
  var overlay = document.getElementById("overlay");
  popupBox.classList.add("updatepopup-change-announcement-down");
  overlay.style.display = "block"
  setTimeout(callDataAnnouncement(announcementId),20);

}

function updateAnnouncementPopupCancel(){
  var popupBox = document.getElementById("updatepopup-change-announcement");
  var overlay = document.getElementById("overlay");
  popupBox.classList.remove("updatepopup-change-announcement-down")
  overlay.style.display = "none";
}




function callDataAnnouncement(announcementId){
  const xhr = new XMLHttpRequest();
    const container = document.getElementById('updatepopup-change-announcement');
    
    xhr.onload = function() {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };
    xhr.open('GET', 'admin-announcementupdate.php?id='+announcementId);
    xhr.send();
}






















