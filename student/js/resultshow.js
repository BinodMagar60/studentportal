function downloadResult(name) {
  const element = document.getElementById("inner-resultContainer-Downlaod");
  html2pdf(element, {
    margin: 1,
    filename: name + "_result.pdf",
    image: { type: "png", quality: 1 },
    html2canvas: { scale: 2 },
    jsPDF: { unit: "in", format: "letter", orientation: "portrait" },
  });
}

function showStudentDownloadPage(id) {
  var popup = document.getElementById("result-show-download");
  var overlay = document.getElementById("overlay99");

  popup.classList.add("result-show-download-click");
  overlay.style.display = "block";
  setTimeout(() => {
    StudentResultDownloadPage(id);
  }, 200);
}

function removeStudentDownloadPage() {
  var popup = document.getElementById("result-show-download");
  var overlay = document.getElementById("overlay99");
  popup.classList.remove("result-show-download-click");
  overlay.style.display = "none";
}

function StudentResultDownloadPage(id) {
  const xhr = new XMLHttpRequest();
  const container = document.getElementById("result-show-download");

  xhr.onload = function () {
    if (this.status === 200) {
      container.innerHTML = xhr.responseText;
    } else {
      console.warn("Did not receive 200 OK from response!");
    }
  };
  xhr.open("GET", "studentResultDownload.php?r_id=" + id);
  xhr.send();
}
