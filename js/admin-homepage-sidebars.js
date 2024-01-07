


//student
function studentDetail(){
    const xhr = new XMLHttpRequest();
    const container = document.getElementById('container');
    
    xhr.onload = function() {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };
    xhr.open('GET', 'admin-studentdetail.html'); 
    xhr.send();
  }



  function studentAttendance(){
    const xhr = new XMLHttpRequest();
    const container = document.getElementById('container');
    
    xhr.onload = function() {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };
    xhr.open('GET', 'admin-studentattendance.html');
    xhr.send();
  }





function studentAdd(){
    const xhr = new XMLHttpRequest();
    const container = document.getElementById('container');
    
    xhr.onload = function() {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };
    xhr.open('GET', 'admin-studentadd.html'); 
    xhr.send();
  }



//teacher

  
function teacherDetail(){
    const xhr = new XMLHttpRequest();
    const container = document.getElementById('container');
    
    xhr.onload = function() {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };
    xhr.open('GET', 'admin-teacherdetail.html'); 
    xhr.send();
  }



  function teacherAdd(){
    const xhr = new XMLHttpRequest();
    const container = document.getElementById('container');
    
    xhr.onload = function() {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };
    xhr.open('GET', 'admin-teacheradd.html'); 
    xhr.send();
  }


//admin
  function adminDetail(){
    const xhr = new XMLHttpRequest();
    const container = document.getElementById('container');
    
    xhr.onload = function() {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };
    xhr.open('GET', 'admin-admindetail.html'); 
    xhr.send();
  }


  function adminAdd(){
    const xhr = new XMLHttpRequest();
    const container = document.getElementById('container');
    
    xhr.onload = function() {
      if (this.status === 200) {
        container.innerHTML = xhr.responseText;
      } else {
        console.warn("Did not receive 200 OK from response!");
      }
    };
    xhr.open('GET', 'admin-adminadd.html'); 
    xhr.send();
  }
