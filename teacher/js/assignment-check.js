

const assignmentCheckData = () => {

    $(document).ready(function () {
        function updateAssignmentList() {
            var selectedClass = $("selectClass_assignment").val();
            var selectedSection = $("selectSection_assignment").val();
            var selectedSubject = $('#selectClass_assignment').val();
            

            $.ajax({
                type: 'GET',
                url: 'assignment-check-list.php',
                data: {
                    'class':selectedClass,
                    'section':selectedSection, 
                    'subject':selectedSubject
                    
                },
                success: function (response) {
                    // console.log(response);
                    var searchedBox = document.querySelector('#assignment-check-container');
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
