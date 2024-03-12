const assignmentstableData = () => {

    $(document).ready(function () {
        function updateAssignmentList() {
            var selectedSubject = $('#Subject-select').val();

            $.ajax({
                type: 'GET',
                url: 'assignmentList.php',
                data: {
                    'subject':selectedSubject
                    
                },
                success: function (response) {
                    // console.log(response);
                    var searchedBox = document.querySelector('#show-assignments');
                    if (searchedBox) {
                        searchedBox.innerHTML = response;
                    } else {
                        console.error("Element with ID 'searched-box' not found.");
                    }
                }
            });
        }

        updateAssignmentList();
    });

}













function assignmentDetailsShow() {
    var popup = document.getElementById("assignment-details");
    var overlays = document.getElementById("overlays");
    popup.classList.add("assignment-details-clicked");
    overlays.style.display = "block";
    setTimeout(callDataDescription(), 20);
  }
  

  function assignmentDetailsHide(){
    var popup = document.getElementById("assignment-details");
    var overlays = document.getElementById("overlays");
    popup.classList.remove("assignment-details-clicked");
    overlays.style.display = "none";
  }




function callDataDescription() {
    const xhr = new XMLHttpRequest();
    const container = document.getElementById("assignment-details");
  
    xhr.onload = function () {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };
    xhr.open("GET", "assignmentDetails.php");
    xhr.send();
  }




