const tableDataAttendance = () => {
  $(document).ready(function () {
    function updateAttendanceList() {
      var selectedClass = $("#classAttendance").val();
      var selectedSection = $("#sectionAttendance").val();

      $.ajax({
        type: "GET",
        url: "../php/attendance/attendanceDetail.php",
        data: {
          class: selectedClass,
          section: selectedSection,
        },
        success: function (response) {
          // console.log(response);
          var searchedBox = document.querySelector(
            "#attendance-list-container"
          );
          if (searchedBox) {
            searchedBox.innerHTML = response;
          } else {
            console.error("Element with ID 'searched-box' not found.");
          }
        },
      });
    }

    updateAttendanceList();
  });
};

function addAttendance() {
  var formData = new FormData(document.getElementById("attendanceForm"));

  $.ajax({
    url: "../php/attendance/addUpdateAttendance.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      // console.log("Response:", response);
    },
    error: function (xhr, status, error) {
      console.error("Error:", status, error);
      console.log("Response Text:", xhr.responseText);
      alert("Error adding student. Please try again.");
    },
  });
}
