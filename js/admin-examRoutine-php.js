
    function updateExamroutine(event){

        var formData = new FormData(document.getElementById('classroutine'));
        $.ajax({
            url: '../php/examRoutine/addExamRoutine.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log('Response:', response);
                document.getElementById('classroutine').reset();
                
                
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





// function examroutineClick() {
//     var showBox = document.getElementById("ShowListsBox1");
//     var computedStyle = window.getComputedStyle(showBox);
//     var displayProperty = computedStyle.getPropertyValue("display");

//     if (displayProperty === "none") {
//         showBox.style.display = "block";
//     } else {
//         showBox.style.display = "none";
//     }
// }



// document.addEventListener("DOMContentLoaded", function () {
//     const dropdownExam = document.querySelectorAll(".primary-box");

//     dropdownExam.forEach((button) => {
//         button.addEventListener("click", function () {
//             const currentSubclass = this.nextElementSibling;

//             //to hide or display the submenues form box
//             dropdownExam.forEach((otherButton) => {
//                 const otherSubclass = otherButton.nextElementSibling;
//                 if (otherSubclass !== currentSubclass) {
//                     otherSubclass.classList.remove("listdropdown");
//                 }
//             });
//             currentSubclass.classList.toggle("listdropdown");
//         });
//     });
// });



function examroutineClick() {
    const primaryBoxes = document.querySelectorAll(".primary-box");
    const secondaryBoxes = document.querySelectorAll(".secondary-box");

    primaryBoxes.forEach((primaryBox, index) => {
        primaryBox.addEventListener("click", function () {
            const currentSecondaryBox = secondaryBoxes[index];

            // Toggle display of the corresponding secondary box
            if (currentSecondaryBox.style.display === "block") {
                currentSecondaryBox.style.display = "none"; // If currently displayed, hide it
            } else {
                // Hide all secondary boxes
                secondaryBoxes.forEach((secondaryBox) => {
                    secondaryBox.style.display = "none";
                });

                // Display the corresponding secondary box
                currentSecondaryBox.style.display = "block";
            }
        });
    });
}






