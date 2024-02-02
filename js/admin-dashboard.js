function recentLists() {
    $(document).ready(function () {
      $.ajax({
        url: "../php/dashboard/recentlyAdded.php",
        type: "GET",
        dataType: "html",
        success: function (response) {
          $("#lower-one").html(response);
          
        },
        error: function () {
          alert("Error loading table data.");
        },
      });
    });
  }