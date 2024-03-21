const notetableData = () => {
  $(document).ready(function () {
    function updateNoteList() {
      var selectedSubject = $("#Subject-select").val();

      $.ajax({
        type: "GET",
        url: "notes-list.php",
        data: {
          subject: selectedSubject,
        },
        success: function (response) {
          // console.log(response);
          var searchedBox = document.querySelector("#show-notes");
          if (searchedBox) {
            searchedBox.innerHTML = response;
          } else {
            console.error("Element with ID 'searched-box' not found.");
          }
        },
      });
    }

    updateNoteList();
  });
};
