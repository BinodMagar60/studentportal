
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
                    // console.log("Post successful");
                    // console.log(response)
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