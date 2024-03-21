const tableDataClassRoutine = () => {
  $(document).ready(function () {
    function updateStudentList() {
      var selectedClass = $("#classSel").val();
      var selectedSection = $("#sectionSel").val();

      $.ajax({
        type: "GET",
        url: "../php/displayClassRoutine.php",
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
