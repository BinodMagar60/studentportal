const tableData = () => {
  $(document).ready(function () {
    function updateStudentList() {
      var selectedClass = $("#classes").val();
      var selectedSection = $("#sections").val();
      var searchData = $("#search").val();

      $.ajax({
        type: "GET",
        url: "../../php/detail/ajax-student-list.php",
        data: {
          class: selectedClass,
          section: selectedSection,
          search: searchData,
        },
        success: function (response) {
          // console.log(response);
          var searchedBox = document.querySelector("#searched-box");
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

const searchFun = () => {
  let filter = document.getElementById("search").value.toUpperCase();
  let myTable = document.getElementById("myTable");
  let tr = myTable.getElementsByTagName("tr");

  for (var i = 0; i < tr.length; i++) {
    let td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      let textvalue = td.textContent || td.innerHTML;
      if (textvalue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
};
