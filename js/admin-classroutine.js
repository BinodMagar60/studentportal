function classRoutineTable(){
    const xhr = new XMLHttpRequest();
    const container = document.getElementById('classroutine-container');
    
    xhr.onload = function() {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };
    xhr.open('GET', 'class-exam-routine.php'); 
    xhr.send();
  }