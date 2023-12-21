

let activeButton = 1;

 function toggleButton(buttonNumber){
    //deactive 
    document.getElementById(`button${activeButton}`).classList.remove('active');

    //active
    document.getElementById(`button${buttonNumber}`).classList.add('active');

    activeButton = buttonNumber;
 }


