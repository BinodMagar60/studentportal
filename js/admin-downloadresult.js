// window.onload = function(){
//     document.getElementById("btn-downloadResult").addEventListener("click", ()=>{
//         const result = this.document.getElementById("inner-resultContainer-Downlaod");
//         console.log(result);
//         console.log(window);
//         html2pdf().form(result).save();
//     });
// }


function downloadTheResult() {
    const result = document.getElementById("inner-resultContainer-Downlaod");
    if (result) {
        const htmlContent = result.innerHTML;
        html2pdf().from(htmlContent).save();
    } else {
        console.error("Element with ID 'inner-resultContainer-Downlaod' not found in the DOM.");
    }
}

