


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
}



