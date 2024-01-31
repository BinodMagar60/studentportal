


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




