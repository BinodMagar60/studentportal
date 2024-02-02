// function recentLists(limit) {
//     $(document).ready(function () {
//       $.ajax({
//         url: "../php/dashboard/recentlyAdded.php",
//         type: "GET",
//         dataType: "html",
//         success: function (response) {
//           $("#lower-one").html(response);
          
//         },
//         error: function () {
//           alert("Error loading table data.");
//         },
//       });
//     });

//   }



// function recentLists() {
//     $(document).ready(function () {
//         $.ajax({
//             url: "../php/dashboard/recentlyAdded.php",
//             type: "GET",
//             dataType: "html",
//             success: function (response) {
//                 $("#lower-one").html(response);

//                 // Hide all rows except the initial 11 rows
//                 $("#tableRecent tr:gt(10)").hide();

//                 // Add a button to show more rows
//                 $("#lower-one").append('<button id="showMoreRows">Show More</button>');

//                 // Attach click event to the button to show more rows
//                 $("#showMoreRows").on("click", function () {
//                     $("#tableRecent tr:gt(10)").toggle();
//                 });
//             },
//             error: function () {
//                 alert("Error loading table data.");
//             },
//         });
//     });
// }




function recentLists() {
    $(document).ready(function () {
        $.ajax({
            url: "../php/dashboard/recentlyAdded.php",
            type: "GET",
            dataType: "html",
            success: function (response) {
                $("#lower-one").html(response);
                var currentRows = 11;
                $("#tableRecent tr:gt(" + (currentRows - 1) + ")").hide();
                $("#lower-one").append('<div style="width:100%; display:flex; justify-content: center; padding: 20px;"><button style="font-size: 1.125rem; padding: 10px; font-weight: 300; border: 1px solid black;" id="showMoreRows">Load More</button></div>');

                // Attach click event to the button to show more rows
                $("#showMoreRows").on("click", function () {
                    currentRows += 10;
                    $("#tableRecent tr:lt(" + currentRows + ")").show();

                    // If there are no more hidden rows, disable the button
                    if ($("#tableRecent tr:hidden").length == 0) {
                        $("#showMoreRows").prop("disabled", true);
                    }
                });
            },
            error: function () {
                alert("Error loading table data.");
            },
        });
    });
}
