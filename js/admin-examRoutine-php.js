
    function updateExamroutine(event){

        var formData = new FormData(document.getElementById('classroutine'));
        $.ajax({
            url: '../php/examRoutine/updateExamRoutine.php',
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

            }
            
        });
        event.preventDefault();
    }


    
      function postExamRoutine() {
            $.ajax({
                url: "../php/examRoutine/posted.php",
                type: "POST",
                success: function(response) {
                    
                },
                error: function(xhr, status, error) {
                    console.error("Error:", status, error);
                    console.log("Response Text:", xhr.responseText);
                }
            });
        };
    

        function unpostExamRoutine() {
            $.ajax({
                url: "../php/examRoutine/unposted.php",
                type: "POST",
                success: function(response) {
                    // console.log("UnPost successful");
                    // console.log(response)
                },
                error: function(xhr, status, error) {
                    console.error("Error:", status, error);
                    console.log("Response Text:", xhr.responseText);
                }
            });
        };


function examRoutineListCall(){
    const xhr = new XMLHttpRequest();
    const container = document.getElementById('examroutineList-container');
    
    xhr.onload = function() {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };
    xhr.open('GET', 'admin-examroutineList.php'); 
    xhr.send();
}





function examroutineClick() {
    var showBox = document.getElementById("ShowListsBox1");
    var computedStyle = window.getComputedStyle(showBox);
    var displayProperty = computedStyle.getPropertyValue("display");

    if (displayProperty === "none") {
        showBox.style.display = "block";
    } else {
        showBox.style.display = "none";
    }
}
