function selectWhom(){
        var toSelect = document.getElementById("To");
        var selectClass = document.getElementById("Selectclass");
        selectClass.style.display = (toSelect.value === "student") ? "block" : "none";
        toSelect.addEventListener("change", function () {
            selectClass.style.display = (toSelect.value === "student") ? "block" : "none";
        });
    
}