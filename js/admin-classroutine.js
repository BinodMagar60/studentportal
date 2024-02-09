// function classRoutineTable(){
//     const xhr = new XMLHttpRequest();
//     const container = document.getElementById('classroutine-container');
    
//     xhr.onload = function() {
//       if (this.status === 200) {
//         container.innerHTML = xhr.responseText;
//       } else {
//         console.warn("Did not receive 200 OK from response!");
//       }
//     };
//     xhr.open('GET', 'class-exam-routine.php'); 
//     xhr.send();
//   }



  const classRoutineTable = () => {

    $(document).ready(function () {
        function updateClassRoutine() {
            var selectedClass = $('#classSel').val();
            var selectedSection = $('#sectionSel').val();

            $.ajax({
                type: 'GET',
                url: 'class-exam-routine.php',
                data: {
                    'class': selectedClass,
                    'section': selectedSection
                },
                success: function (response) {
                    // console.log(response);
                    var searchedBox = document.querySelector('#classroutine-container');
                    if (searchedBox) {
                        searchedBox.innerHTML = response;
                    } else {
                        console.error("Element with ID 'searched-box' not found.");
                    }
                }
            });
        }

        updateClassRoutine();
    });

}
