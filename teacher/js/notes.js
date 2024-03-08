


function uploadFiles(){
    let fileInput = document.getElementById("file-input");
    let fileList = document.getElementById("files-list");
    let numOfFiles = document.getElementById("num-of-files");
    let submitBtn = document.getElementById("submit-btn");

        fileList.innerHTML = "";
        numOfFiles.textContent = `${fileInput.files.length} Files Selected`;

        for (let file of fileInput.files) {
            let reader = new FileReader();
            let listItem = document.createElement("li");
            let fileName = file.name;
            let fileSize = (file.size / 1024).toFixed(1);
            listItem.innerHTML = `<p>${fileName}</p><p>${fileSize}KB</p>`;
            if (fileSize >= 1024) {
                fileSize = (fileSize / 1024).toFixed(1);
                listItem.innerHTML = `<p>${fileName}</p><p>${fileSize}MB</p>`;
            }
            fileList.appendChild(listItem);
        }

}


function submitUploads(){
    let fileInput = document.getElementById("file-input");
    let fileList = document.getElementById("files-list");
    let numOfFiles = document.getElementById("num-of-files");
    let submitBtn = document.getElementById("submit-btn");

    fileInput.value = "";
        fileList.innerHTML = "";
        numOfFiles.textContent = "No Files Chosen";
}


