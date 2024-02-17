



const tableDataAttendance = () => {

    $(document).ready(function () {
        function updateAttendanceList() {
            var selectedClass = $('#classAttendance').val();
            var selectedSection = $('#sectionAttendance').val();

            $.ajax({
                type: 'GET',
                url: '../php/attendance/attendanceDetail.php',
                data: {
                    'class': selectedClass,
                    'section': selectedSection
                },
                success: function (response) {
                    // console.log(response);
                    var searchedBox = document.querySelector('#attendance-list-container');
                    if (searchedBox) {
                        searchedBox.innerHTML = response;
                    } else {
                        console.error("Element with ID 'searched-box' not found.");
                    }

                }
            });
        }

        updateAttendanceList();
    });

}
