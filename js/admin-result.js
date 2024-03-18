


function submitResultForm(){


var formData = new FormData(document.getElementById('resultForm'));

$.ajax({
    url: '../php/result/addAssignedTeacher.php',
    type: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
        console.log('Response:', response);
        
        
    },
    error: function (xhr, status, error) {
        console.error('Error:', status, error);
        console.log('Response Text:', xhr.responseText);
        alert('Error adding student. Please try again.');
    }
    
});

setTimeout(() => {

    checkStatusResult();
}, 100);


}






function resultStatusTeacher() {
    const xhr = new XMLHttpRequest();
    const container = document.getElementById('status-resultTeachers');
  
    xhr.onload = function () {
        if (this.status === 200) {
            container.innerHTML = xhr.responseText;
            // console.log("displayed");
        } else {
            console.warn("Did not receive 200 OK from response!");
        }
    };
    xhr.open('GET', 'admin-result-status.php');
    xhr.send();

    setTimeout(() => {
        checkStatusResultAdmin();
    }, 100);
  }




  function submitPublishResult(id) {
    $.ajax({
      url: "../php/result/publish.php?title=" + id,
      type: "POST",
      success: function (response) {
        console.log(response);
      },
      error: function (xhr, status, error) {
        console.error("Error:", status, error);
        console.log("Response Text:", xhr.responseText);
      },
    });
    setTimeout(() => {
        resultStatusTeacher();
    }, 100);
  }




  function checkStatusResultAdmin(){
   
        var allReceived = true;
        var statusCells = document.querySelectorAll('#status-checker');
        
        statusCells.forEach(function(cell) {
            if (cell.textContent.trim() !== 'Received') {
                allReceived = false;
            }
        });
        
        console.log(allReceived);
        var submitButton = document.getElementById('status-submitBtn-result');
        if (allReceived) {
            submitButton.style.display = 'block';
        } else {
            submitButton.style.display = 'none';
        }
    }
  







