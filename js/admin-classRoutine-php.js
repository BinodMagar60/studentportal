function updateClassroutine(event) {
  event.preventDefault();

  var formData = new FormData(document.getElementById("classroutinedaily"));

  $.ajax({
    url: "../php/classRoutine/updateClassRoutine.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      // console.log('Response:', response);
    },
    error: function (xhr, status, error) {
      console.error("Error:", status, error);
      console.log("Response Text:", xhr.responseText);
    },
  });
}

const tableDataClassRoutine = () => {
  $(document).ready(function () {
    function updateStudentList() {
      var selectedClass = $("#classSel").val();
      var selectedSection = $("#sectionSel").val();

      $.ajax({
        type: "GET",
        url: "../php/classRoutine/displayClassRoutine.php",
        data: {
          class: selectedClass,
          section: selectedSection,
        },
        success: function (response) {
          // console.log(response);
          var searchedBox = document.querySelector("#display-classroutine");
          if (searchedBox) {
            searchedBox.innerHTML = response;
          } else {
            console.error("Element with ID 'searched-box' not found.");
          }
        },
      });
    }

    updateStudentList();
  });
};
