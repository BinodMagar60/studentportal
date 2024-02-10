function updateClassroutine(event){
    event.preventDefault();

    var formData = new FormData(document.getElementById('classroutinedaily'));

    $.ajax({
        url: '../php/classRoutine/updateClassRoutine.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // console.log('Response:', response);
           

            
        },
        error: function (xhr, status, error) {
            console.error('Error:', status, error);
            console.log('Response Text:', xhr.responseText);
        }
        
    });
   


  
}
